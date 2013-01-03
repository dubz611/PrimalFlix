<?php
/* main "hub" for include/require files 
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 * 
 * NOTE: Have error reporting on for testing purposes.
 */
ob_start(); // fix session header warning
session_start();
//error_reporting(0); //remove error reporting to user.

require 'database/connect.php';
require 'functions/general_functions.php';
require 'functions/users_functions.php';

//require 'database/pdo_connect.php';
//require 'functions/pdo_users_functions.php';

// Stores all error messages
$errors = array();

// Provide user information throughout website if user is logged in
if (logged_in() === true) {
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'accountno', 'initialdate' , 'username', 'password', 'email', 'userdetailno','firstname', 'lastname', 'phone', 'phone2', 'fax', 
            'addressno', 'street', 'street2', 'city', 'state', 'zipcode', 'country');
    
    // Log off user if account is deactivated/ban
    if (user_active($user_data['username']) === false) {
        session_destroy();
        header('Location:signin.php');
        exit();
    }
}

?>
