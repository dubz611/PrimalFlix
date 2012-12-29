<?php

/* Process/Validate POST data from signIn.php 
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 */

include 'core/init.php';

// Provide login session and error messages ($errors[]); functions are implemented from 'functions/users.php'
if (empty($_POST) === false) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) === true) {
        $errors[] = 'You need to enter an username.';
    } else if (empty($password) === true) {
        $errors[] = 'You need to enter a password.';
    } else if (user_exists($username) === false) {
        $errors[] = 'Username does not exist.';
    } else if (user_active($username) === false) {
        $errors[] = 'You have not activated your account.';
    } else {
        $login = login($username, $password); // pass accountNo to $login
        if ($login === false) {
            $errors[] = 'Username/password combination is incorrect.';
        } else {
            // set the user session
            // redirect user to home
            $_SESSION['user_id'] = $login; // pass accountNo to _SESSION['user_id']
            header('Location: index.php');
            exit(); // Login successful
        }
    }
} else {
    $errors[] = "No data received.";
}

// IF any errors occurs...handled in 'functions/general.php'
include 'includes/overall/header.php';
if (empty($errors) === false) {
    echo output_errors($errors);
    include 'includes/loginForm.php';
}
include 'includes/overall/footer.php';
?>
