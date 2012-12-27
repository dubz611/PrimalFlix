<?php

/* Process the user for log-in 
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 */

include 'core/init.php';

// Provide login session and error messages ($errors[]); functions are implemented from 'functions/users.php'
if (empty($_POST) === false) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) === true || empty($password) === true) {
        $errors[] = 'You need to enter an username and password';
    } else if (user_exists($username) === false) {
        $errors[] = 'Username does not exist.';
    } else if (user_active($username) === false) {
        $errors[] = "You have not activated your account.";
    } else {
        $login = login($username, $password); // Create var 'login'
        if($login === false) {
            $errors[] = 'That username/password combination is incorrect';
        } else {
            // set the user session
            // redirect user to home
            $_SESSION['user_id'] = $login;
            header('Location: index.php');
            exit();
        }
    }
 print_r($login);
}
?>
