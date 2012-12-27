<?php

/* main hub for required files 
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 */
session_start();
error_reporting(0); //remove error reporting to user.

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';

if (logged_in() === true) {
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'accountno', 'username');
    
    // Log off user if account is inactive
    if(user_active($user_data['username']) === false){
        session_destroy();
        header('Location:signin.php');
        exit();
    }
}

$errors = array();
?>
