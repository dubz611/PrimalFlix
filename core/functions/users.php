<?php

/* Log-in functions for login.php 
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 * 
 * NOTE: user_id ~ Account.AccountNo
 */

// Check if username exists
function user_exists($username) {
    $username = sanitize($username);
    $query = mysql_query("SELECT COUNT(`UserName`) FROM `AccountDetail` WHERE `UserName` = '$username'");

    return(mysql_result($query, 0) == 1) ? true : false;
}

// Check if email exists
function email_exists($email) {
    $username = sanitize($email);
    $query = mysql_query("SELECT COUNT(`UserName`) FROM `AccountDetail` WHERE `Email` = '$email'");

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

// Validate un/pw combination
function login($username, $password) {
    $user_id = user_id_from_username($username);
    $username = sanitize($username);
    $password = md5($password); // md5 hash to pw 
    $query = mysql_query("SELECT COUNT(`UserName`) FROM `AccountDetail` WHERE `UserName` = '$username' AND `Password` = '$password'");

    return(mysql_result($query, 0) == 1) ? $user_id : false; // will return AccountNo 
}

// Obtained AccountNo from session
function logged_in() {
    return(isset($_SESSION['user_id'])) ? true : false;
}

// Obtained user information after login
function user_data($user_id) {
    $data = array();
    $user_id = (int) $user_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();

    if ($func_num_args > 1) {
        unset($func_get_args[0]);

        $fields = '`' . implode('`, `', $func_get_args) . '`';
        $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `Account` WHERE `AccountNo` = '$user_id'"));

        return $data;
    }
}

function user_count() {
    $query = mysql_query("SELECT COUNT(`UserName`) FROM `AccountDetail` WHERE `Active` = 1");
    return mysql_result($query, 0);
}

?>
