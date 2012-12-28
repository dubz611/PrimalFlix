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
    foreach ($required_fields as $key) {
        if (empty($_POST["$key"]) === true) {
            $errors[] = 'Required fields are marked with an asterisk.';
            break 1;
        }
    }

    // Continue validation
    if (empty($errors) === true) {
        if (user_exists($_POST['username']) === true) {
            $errors[] = "Sorry, username: " . $_POST['username'] . " is already taken. Please choose another username.";
        }
        if (preg_match("/\\s/", $_POST['username']) == true) {
            $errors[] = "Your username must not have any spaces.";
        }
        if (strlen($_POST['password']) < 6) {
            $errors[] = "Your password must be at least six characters long.";
        }
        if (strlen($_POST['password']) > 15) {
            $errors[] = "Your password must not exceed 15 characters long.";
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
                if (isset($_GET['success']) && empty($_GET['success'])) {
                    echo 'You have been registered successfully!';
                } else {
                    if (empty($_POST) === false && empty($errors) === true) {
                        // Register user
                        $register_data = array(
                            'username' => $_POST['username'],
                            'password' => $_POST['password'],
                            'email' => $_POST['email'],
                        );
                        register_user($register_data);
                        header('Location: index.php');
                        exit();
                    } else if (empty($errors) === false) {
                        // Echo error messages to user
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
                                    Password (Must be 6-15 characters long)* :<br/>
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
                <?php
                } 
                include 'includes/footer.php';
            ?>
        </div>
    </body>
</html>