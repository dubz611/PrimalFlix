<?php
/* Registration page 
 * 
 * Created:     12/27/12
 * Author:      Wayne Fields
 * 
 */

include 'core/init.php';

// Validate if user input fill out form completely
if (empty($_POST) === false) {
    $required_fields = array('username', 'password', 'password_again', 'email');
    foreach ($_POST as $key => $value) {
        if (empty($value) && in_array($key, $required_fields) === true) {
            $errors[] = "Fields marked with an asterisk are required.";
            break 1;
        }
    }
    // Registration validation
    if (empty($errors) === true) {
        if (user_exists($_POST['username']) === true) {
            $errors[] = "Sorry, username: " . $_POST['username'] . " is already taken. Please choose another username.";
        }
        if (preg_match("/\\s/", $_POST['username']) == true) {
            $errors[] = "Your username must not have any spaces.";
        }
        if (strlen($_POST['password']) < 6) {
            $errors[] = "Your password must be at least six characters.";
        }
        if ($_POST['password'] !== $_POST['password_again']) {
            $errors[] = "Both passwords does not match.";
        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = "A valid email address is required.";
        }
        if (email_exists($_POST['email']) === true) {
            $errors[] = "Sorry, email: " . $_POST['email'] . " is already taken. Please choose another email.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <?php include 'includes/head.php'; ?>
    <body> 
        <div id="loginContent">
            <?php include 'includes/header.php'; ?>     
            <?php include 'includes/naviBar.php'; ?>
            <br />
            <div id="signBanner">
                <?php
                if (empty($_POST) === true && empty($errors) === true) {
                    // Register user
                } else {
                    echo output_errors($errors);
                }
                ?>
                <form action="" method="POST">
                    <fieldset>
                        <legend>Create an Account</legend>
                        <ul>
                            <li>
                                Username* :<br />
                                <input type="text" name="username">
                            </li>
                            <li>
                                Password* :<br/>
                                <input type="password" name="password">
                            </li>
                            <li>
                                Retype Password* :<br />
                                <input type="password" name="password_again">
                            </li>
                            <li>
                                Email* :<br/>
                                <input type="text" name="email">
                            </li>
                            <li>
                                <input type="submit" value="Register">     
                            </li>
                        </ul>
                    </fieldset>
                </form> 
            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>