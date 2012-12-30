<?php

/* Change Password form
 * 
 * Created:     12/28/12
 * Author:      Wayne Fields
 * 
 */

include 'core/init.php';
echo 
protect_page();

if (empty($_POST) === false) {
    $required_fields = array('current_password', 'password', 'password_again');
    foreach ($required_fields as $key) {
        if (empty($_POST["$key"]) === true) {
            $errors[] = 'Required fields are marked with an asterisk.';
            break 1;
        }
    }
    // pw validation
    if (md5($_POST['current_password']) === $user_data['password']) {
        if (trim($_POST['password']) !== trim($_POST['password_again'])) {
            $errors[] = "New passwords does not match.";
        } else if (strlen($_POST['password']) < 6) {
            $errors[] = "Your new password must be at least six characters.";
        } else if (strlen($_POST['password']) > 15) {
            $errors[] = "Your new password must not exceed 15 characters.";
        }
    } else {
        $errors[] = "Your current password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
    <?php include 'includes/head.php'; ?>
    <body> 
        <div id="loginContent">
            <?php
            include 'includes/header.php';
            include 'includes/naviBar.php';
            ?>
            <br />
            <div id="signBanner">
                <?php
                if (isset($_GET['success']) && empty($_GET['success'])) {
                    echo "Your password has been changed successfully!";
                } else {
                    if (empty($_POST) === false && empty($errors) === true) {
                        change_password($user_data['username'], $_POST['password']);
                        header('Location: changePassword.php?success');
                    } else if (empty($errors) === false) {
                        echo output_errors($errors);
                    }
                    ?>
                    <form action="" method="POST">
                        <fieldset>
                            <legend>Change Password</legend>
                            <ul>
                                <li>
                                    Current password* : <br />
                                    <input type="password" name="current_password">
                                </li>
                                <li>
                                    New password (Must be 6-15 characters long)* :<br/>
                                    <input type="password" name="password">
                                </li>
                                <li>
                                    Retype New password* : <br />
                                    <input type="password" name="password_again">
                                </li>
                                <li>
                                    <input type="submit" value="Change Password">
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
