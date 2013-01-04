<?php

/* Login/Register functions - PDO VERSION
 * 
 * Created:     1/3/13
 * Author:      Wayne Fields
 * 
 * NOTE:    user_id ~ Account.AccountNo
 *          Do not delete register_user1/2/3
 */

// Checks if username exists
function user_exists($username) {
    $username = sanitize($username);

    $sql = "SELECT COUNT(`username`) FROM `accountdetail` WHERE `username` = '$username'";
    $s = $dbh->prepare($sql);
    $s->execute();
    $row = $s->fetchColumn();

    return $row == 1 ? true : false;
}

// Checks if email exists
function email_exists($email) {
    //$email = sanitize($email);

    $sql = "SELECT COUNT(`email`) FROM `accountdetail` WHERE `email` = '$email'";
    $s = $dbh->prepare($sql);
    $s->execute();
    $row = $s->fetchColumn();

    return $row == 1 ? true : false;
}

// Checks if account is active
function user_active($username) {
    $username = sanitize($username);

    $sql = "SELECT COUNT(`username`) FROM `accountdetail` WHERE `username` = '$username' AND `active` = 1";
    $s = $dbh->prepare($sql);
    $s->execute();
    $row = $s->fetchColumn();

    return $row == 1 ? true : false;
}

// Retrieve accountNo from userName logging in
function user_id_from_username($username) {
    $username = sanitize($username);

    $sql = "SELECT `accountno` FROM `account` WHERE `username` = '$username'";
    $s = $dbh->prepare($sql);
    $s->execute();
    $row = $s->fetchColumn();

    return $row;
}

function user_id_from_email($email) {
    //$email = sanitize($email);

    $sql = "SELECT `accountno` FROM `account` NATURAL JOIN `accountdetail` WHERE `email` = '$email'";
    $s = $dbh->prepare($sql);
    $s->execute();
    $row = $s->fetchColumn();

    return $row;
}

// Validate un/pw combination
function login($username, $password) {
    $user_id = user_id_from_username($username);
    $username = sanitize($username);
    $password = md5($password); // md5 hash to pw 

    $sql = "SELECT COUNT(`username`) FROM `accountdetail` WHERE `username` = '$username' AND `Password` = '$password'";
    $s = $dbh->prepare($sql);
    $s->execute();
    $row = $s->fetchColumn();

    return $row == 1 ? $user_id : false;
    //return(mysql_result($query, 0) == 1) ? $user_id : false; // will return AccountNo 
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
        $sql = "SELECT $fields FROM `accountdetail` NATURAL JOIN `account` NATURAL JOIN `userdetail` NATURAL JOIN `address`
                                WHERE `accountno` = '$user_id'";
        $s = $dbh->prepare($sql);
        $s->execute();
        
        $row = $s->fetch();

        return $row;
    }
}

function verify_phone($phone, $email) {
    $phone = sanitize($phone);
    //$email = sanitize($email);

    $sql = "SELECT COUNT(`phone`) FROM `userdetail` NATURAL JOIN `account` NATURAL JOIN `accountdetail` WHERE `email` = '$email' AND `phone` = '$phone'";
    $s = $dbh->prepare($sql);
    $s->execute();
    $row = $s->fetchColumn();

    return $row == 1 ? true : false;
}

// Obtain # of members active
function user_count() {

    $sql = "SELECT COUNT(`username`) FROM `accountdetail` WHERE `active` = 1";
    $s = $dbh->prepare($sql);
    $s->execute();
    $row = $s->fetchColumn();

    return $row;
}

// Register_user1/2/3 Fetch POST data from register form & create new user
// 1. Update Address table
function register_user1($register_data1) {
    array_walk($register_data1, 'array_sanitize');

    $fields = '`' . implode('`, `', array_keys($register_data1)) . '`';
    $data = '\'' . implode('\',\'', $register_data1) . '\'';

    $sql = "INSERT INTO `address` ($fields) VALUES ($data)";
    $s = $dbh->prepare($sql);
    $s->execute();
}

// 2. Update UserDetail table
function register_user2($register_data2) {
    array_walk($register_data2, 'array_sanitize');

    $fields = '`' . implode('`, `', array_keys($register_data2)) . '`';
    $data = '\'' . implode('\',\'', $register_data2) . '\'';

    $last_insert = $dbh->lastInsertId();

    $sql = "INSERT INTO `userdetail` ($fields, `addressno`) VALUES ($data, '$last_insert')";
    $s = $dbh->prepare($sql);
    $s->execute();
}

// 3. Update AccountDetail table
function register_user3($register_data3) {
    array_walk($register_data3, 'array_sanitize');
    $register_data3['password'] = md5($register_data3['password']);

    $fields = '`' . implode('`, `', array_keys($register_data3)) . '`';
    $data = '\'' . implode('\',\'', $register_data3) . '\'';
    $active = 1;

    $sql = "INSERT INTO `accountdetail` ($fields, `active`) VALUES ($data, $active)";
    $s = $dbh->prepare($sql);
    $s->execute();
}

// Begin input db info for registration
function register_account_begin($register_data1, $register_data2, $register_data3) {

    try {
        $dbh->beginTransaction();

        register_user1($register_data1);
        register_user2($register_data2);
        register_user3($register_data3);

        $dbh->commit();
    } catch (PDOException $e) {

        $dbh->rollback();
    }
}

// Finalize input db info for registration
function register_account_end($data) {
    $data = sanitize($data);

    $sql = "SELECT MAX(`userdetailno`) from `userdetail`";
    $s = $dbh->prepare($sql);
    $s->execute();
    $row = $s->fetchColumn();

    $sql2 = "INSERT INTO `account` (`userdetailno`, `username`) VALUES ($row, '$data')";
    $s = $dbh->prepare($sql2);
    $s->execute();
}

// ...
function change_password($username, $password) {
    $username = sanitize($username);
    $password = md5($password);

    $sql = "UPDATE `accountdetail` SET `password` = '$password' WHERE `username` = '$username'";
    $s = $dbh->prepare($sql);
    $s->execute();
}

function update_user1($update_data1, $userDetailNo) {
    $update = array();
    array_walk($update_data1, 'array_sanitize');

    foreach ($update_data1 as $field => $data) {
        $update[] = '`' . $field . '`=\'' . $data . '\'';
    }

    $sql = "UPDATE `userdetail` SET " . implode(', ', $update) . " WHERE `userdetailno` = $userDetailNo";
    $s = $dbh->prepare($sql);
    $s->execute();
}

function update_user2($update_data2, $userAddressNo) {
    $update = array();
    array_walk($update_data2, 'array_sanitize');

    foreach ($update_data2 as $field => $data) {
        $update[] = '`' . $field . '`=\'' . $data . '\'';
    }

    $sql = "UPDATE `address` SET " . implode(', ', $update) . " WHERE `addressno` = $userAddressNo";
    $s = $dbh->prepare($sql);
    $s->execute();
}

function update_user_complete($update_data1, $update_data2, $update_data3, $userDetailNo, $userAddressNo, $userEmail) {
    $update_data3 = sanitize($update_data3);

    try {
        $dbh->beginTransaction();

        update_user1($update_data1, $userDetailNo);
        update_user2($update_data2, $userAddressNo);
        $sql = "UPDATE `accountdetail` SET `email` = '$update_data3' WHERE `email` = '$userEmail'";
        $s = $dbh->prepare($sql);
        $s->execute();

        $dbh->commit();
    } catch (PDOException $e) {

        $dbh->rollback();
    }
}

function email($to, $subject, $body) {
    mail($to, $subject, $body, 'From: Hello from admin@primalflix.com');
}

function recover($mode, $email) {
    $mode = sanitize($mode);
    //$email = sanitize($email);

    $user_data = user_data(user_id_from_email($email), 'firstname', 'username');

    if ($mode == 'username') {
        // Recover username
        email($email, 'Your Primalflix username', "Hello " . $user_data['firstname'] . ", your PrimalFlix's username is: " . $user_data['username'] . ".");
    } else if ($mode == 'password') {
        // Recover password
        $generated_password = substr(md5(rand(999, 999999)), 0, 8);
        change_password($user_data['username'], $generated_password);
        email($email, 'Your Primalflix password recovery', "Hello " . $user_data['firstname'] . ", your new temporary PrimalFlix's password is: " . $generated_password . ".");
    }
}
?>

