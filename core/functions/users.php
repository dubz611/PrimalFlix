<?php

/* Log-in functions for login.php 
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
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

?>
