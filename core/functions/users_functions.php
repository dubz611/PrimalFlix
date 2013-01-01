<?php

/* Login/Register functions
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 * 
 * NOTE:    user_id ~ Account.AccountNo
 *          Do not delete register_user1/2/3
 */

// Checks if username exists
function user_exists($username) {
    $username = sanitize($username);
    $query = mysql_query("SELECT COUNT(`UserName`) FROM `AccountDetail` WHERE `UserName` = '$username'");

    return(mysql_result($query, 0) == 1) ? true : false;
}

// Checks if email exists
function email_exists($email) {
    $email = sanitize($email);
    $query = mysql_query("SELECT COUNT(`Email`) FROM `AccountDetail` WHERE `Email` = '$email'");

    return(mysql_result($query, 0) == 1) ? true : false;
}

// Checks if account is active
function user_active($username) {
    $username = sanitize($username);
    $query = mysql_query("SELECT COUNT(`UserName`) FROM `AccountDetail` WHERE `UserName` = '$username' AND `Active` = 1");

    return(mysql_result($query, 0) == 1) ? true : false;
}

// Retrieve accountNo from userName logging in
function user_id_from_username($username) {
    $username = sanitize($username);
    $query = mysql_query("SELECT `AccountNo` FROM `Account` WHERE `UserName` = '$username'");

    return mysql_result($query, 0, 'AccountNo');
}

function user_id_from_email($email) {
    $email = sanitize($email);
    $query = mysql_query("SELECT `AccountNo` FROM `Account` NATURAL JOIN `AccountDetail` WHERE `Email` = '$email'");

    return mysql_result($query, 0, 'AccountNo');
}

// Validate un/pw combination
function login($username, $password) {
    $user_id = user_id_from_username($username);
    $username = sanitize($username);
    $password = md5($password); // md5 hash to pw 
    $query = mysql_query("SELECT COUNT(`UserName`) FROM `AccountDetail` WHERE `UserName` = '$username' AND `Password` = '$password'");

    return(mysql_result($query, 0) == 1) ? $user_id : false; // will return AccountNo 
}

// Mark user as logged in
function logged_in() {
    return(isset($_SESSION['user_id'])) ? true : false;
}

// Obtain user information after login
function user_data($user_id) {
    $data = array();
    $user_id = (int) $user_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();

    if ($func_num_args > 1) {
        unset($func_get_args[0]); // Destroys first array

        $fields = '`' . implode('`, `', $func_get_args) . '`';       
        $query = mysql_query("SELECT $fields FROM `AccountDetail` NATURAL JOIN `Account` NATURAL JOIN `UserDetail` NATURAL JOIN `Address`
                                WHERE `AccountNo` = '$user_id'");
        $data = mysql_fetch_assoc($query);

        return $data;
    }
}

// Obtain # of members active
function user_count() {
    $query = mysql_query("SELECT COUNT(`UserName`) FROM `AccountDetail` WHERE `Active` = 1");
    return mysql_result($query, 0);
}

// Register_user1/2/3 Fetch POST data from register form & create new user
// 1. Update Address table
function register_user1($register_data1) {
    array_walk($register_data1, 'array_sanitize');

    $fields = '`' . implode('`, `', array_keys($register_data1)) . '`';
    $data = '\'' . implode('\',\'', $register_data1) . '\'';

    $query = mysql_query("INSERT INTO `Address` ($fields) VALUES ($data)");
    return $query;
}

// 2. Update UserDetail table
function register_user2($register_data2) {
    array_walk($register_data2, 'array_sanitize');

    $fields = '`' . implode('`, `', array_keys($register_data2)) . '`';
    $data = '\'' . implode('\',\'', $register_data2) . '\'';

    $last_insert = mysql_result(mysql_query("SELECT LAST_INSERT_ID()"), 0);
    $query = mysql_query("INSERT INTO `UserDetail` ($fields, `AddressNo`) VALUES ($data, '$last_insert')");
    return $query;
}

// 3. Update AccountDetail table
function register_user3($register_data3) {
    array_walk($register_data3, 'array_sanitize');
    $register_data3['password'] = md5($register_data3['password']);


    $fields = '`' . implode('`, `', array_keys($register_data3)) . '`';
    $data = '\'' . implode('\',\'', $register_data3) . '\'';
    $active = 1;

    $query = mysql_query("INSERT INTO `AccountDetail` ($fields, `Active`) VALUES ($data, $active)");
    return $query;
}

// Begin input db info for registration
function register_account_begin($register_data1, $register_data2, $register_data3) {
    mysql_query("START TRANSACTION");

    $ru1 = register_user1($register_data1);
    $ru2 = register_user2($register_data2);
    $ru3 = register_user3($register_data3);

    if (($ru1 && $ru2 && $ru3) == true) {
        mysql_query("COMMIT");
    } else {
        mysql_query("ROLLBACK");
    }
}

// Finalize input db info for registration
function register_account_end($data) {

    $user = mysql_result(mysql_query("SELECT MAX(`UserDetailNo`) from `UserDetail`"), 0);
    $username = sanitize($data);

    mysql_query("INSERT INTO `Account` (`UserDetailNo`, `Username`) VALUES ($user, '$username')");
}

// ...
function change_password($username, $password) {
    $username = sanitize($username);
    $password = md5($password);

    mysql_query("UPDATE `AccountDetail` SET `password` = '$password' WHERE `username` = '$username'");
}

function update_user1($update_data1, $userDetailNo) {
    $update = array();
    array_walk($update_data1, 'array_sanitize');

    foreach ($update_data1 as $field => $data) {
        $update[] = '`' . $field . '`=\'' . $data . '\'';
    }

    $query = mysql_query("UPDATE `UserDetail` SET " . implode(', ', $update) . " WHERE `UserDetailNo` = $userDetailNo");
    return $query;
}

function update_user2($update_data2, $userAddressNo) {
    $update = array();
    array_walk($update_data2, 'array_sanitize');

    foreach ($update_data2 as $field => $data) {
        $update[] = '`' . $field . '`=\'' . $data . '\'';
    }

    $query = mysql_query("UPDATE `Address` SET " . implode(', ', $update) . " WHERE `AddressNo` = $userAddressNo");
    return $query;
}

function update_user_complete($update_data1, $update_data2, $update_data3, $userDetailNo, $userAddressNo, $userEmail) {
    $update_data3 = sanitize($update_data3);
    mysql_query("START TRANSACTION");    

    $up1 = update_user1($update_data1, $userDetailNo);
    $up2 = update_user2($update_data2, $userAddressNo);
    $up3 = mysql_query("UPDATE `AccountDetail` SET `Email` = '$update_data3' WHERE `Email` = '$userEmail'");

    if (($up1 && $up2 && $up3) == true) {
        mysql_query("COMMIT");
    } else {
        mysql_query("ROLLBACK");
    }
}

// Will need to get POSTFIX to work
function recover($mode, $email) {
    $mode = sanitize($mode);
    $email = sanitize($email);
    
    $user_data = user_data(user_id_from_email($email), 'firstname', 'username');
    
    if ($mode == 'username') {
        // Recover username
        email($email, 'Your Primalflix username', "Hello " . $user_data['firstname']. ", your PrimalFlix's username is: " . $user_data['username'] . ".");
    } else if ($mode == 'password') {
        // Recover password
        $generated_password = substr(md5(rand(999,999999)), 0, 8);
        change_password($user_data['username'], $generated_password);
        email($email, 'Your Primalflix password recovery', "Hello " . $user_data['firstname']. ", your new temporary PrimalFlix's password is: " . $generated_password . ".");
    }
}

?>
