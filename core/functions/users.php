<?php

/* Log-in functions for login.php 
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 * 
 * NOTE: user_id ~ Account.AccountNo
 */

function user_exists($username) {
    $username = sanitize($username);
    $query = mysql_query("SELECT COUNT(`UserName`) FROM `AccountDetail` WHERE `UserName` = '$username'");
    
    return(mysql_result($query,0) == 1) ? true : false;
}

function user_active($username) {
    $username = sanitize($username);
    $query = mysql_query("SELECT COUNT(`UserName`) FROM `AccountDetail` WHERE `UserName` = '$username' AND `Active` = 1");
    
    return(mysql_result($query,0) == 1) ? true : false;
}

// Retrieve accountNo from userName logging in
function user_id_from_username($username) {
    $username = sanitize($username);
    $query = mysql_query("SELECT `AccountNo` FROM `Account` WHERE `UserName` = '$username'");
    return mysql_result($query, 0, 'AccountNo');
}

function login($username, $password) {
    $user_id = user_id_from_username($username);
    
    $username = sanitize($username);
    $password = md5($password); // md5 hash to pw 
    $query = mysql_query("SELECT COUNT(`UserName`) FROM `AccountDetail` WHERE `UserName` = '$username' AND `Password` = '$password'");
    
    return(mysql_result($query,0) == 1) ? $user_id : false; // will return AccountNo 
}

function logged_in() {
    return(isset($_SESSION['user_id'])) ? true : false; 
}
?>
