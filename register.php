<?php
/* Registration page 
 * 
 * Created:     12/27/12
 * Author:      Wayne Fields
 * 
 */
include 'core/init.php';
logged_in_redirect();

// Validate if user input fill out form completely
if (empty($_POST) === false) {
    $required_fields = array('username', 'password', 'password_again', 'email', 'firstname', 'lastname', 'phone', 'street', 'city', 'state',
        'zipcode', 'country');
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
        if (strlen($_POST['username']) < 6) {
            $errors[] = "Your username must be at least six characters.";
        }
        if (strlen($_POST['username']) > 15) {
            $errors[] = "Your username must not exceed 15 characters.";
        }
        if (preg_match("/\\s/", $_POST['username']) == true) {
            $errors[] = "Your username must not have any spaces.";
        }
        if (strlen($_POST['password']) < 6) {
            $errors[] = "Your password must be at least six characters.";
        }
        if (strlen($_POST['password']) > 15) {
            $errors[] = "Your password must not exceed 15 characters.";
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
                if (isset($_GET['success']) && empty ($_GET['success'])) {
                    echo "You've been registered successfully!";
                } else {
                if (empty($_POST) === false && empty($errors) === true) {                
                    $register_data1 = array(
                        'street'    => $_POST['street'],
                        'street2'   => $_POST['street2'],
                        'city'      => $_POST['city'],
                        'state'     => $_POST['state'],
                        'zipcode'   => $_POST['zipcode'],
                        'country'   => $_POST['country'],
                    );              
                    $register_data2 = array(
                        'firstname' => $_POST['firstname'],
                        'lastname'  => $_POST['lastname'],
                        'phone'     => $_POST['phone'],
                        'phone2'    => $_POST['phone2'],
                        'fax'       => $_POST['fax2'],
                    );
                    $register_data3 = array(
                        'username'  => $_POST['username'],
                        'password'  => $_POST['password'],
                        'email'     => $_POST['email'],
                    );
                    register_account_begin($register_data1, $register_data2, $register_data3);
                    register_account_end($_POST['username']);
                    header('Location: register.php?success');
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
                                Username (Must be 6-15 characters long)* :<br />
                                <input type="text" name="username">
                            </li>
                            <li>
                                Password (Must be 6-15 characters long)* : <br/>
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
                        </ul>
                    </fieldset>
                    <fieldset>
                        <legend>Contact Information</legend>
                        <ul>
                            <li>First Name* :<br />
                                <input type="text" name="firstname">
                            </li>
                            <li>Last Name* :<br />
                                <input type="text" name="lastname">
                            </li>                               
                            <li>Phone* :<br />
                                <input type="text" name="phone">
                            </li>
                            <li>
                                Phone2 :<br />
                                <input type="text" name="phone2">
                            </li>
                            <li>
                                Fax :<br />
                                <input type="text" name="fax">
                            </li>                               
                        </ul>
                    </fieldset>
                    <fieldset>
                        <legend>Personal Information</legend>
                        <ul>
                            <li>
                                Street* :<br />
                                <input type="text" name="street">
                            </li>
                            <li>
                                Street2 :<br />
                                <input type="text" name="street2">
                            </li>
                            <li>
                                City* :<br />
                                <input type="text" name="city">
                            </li>
                            <li>
                                State* :<br />
                                <input type="text" name="state">
                            </li>
                            <li>
                                Zip Code* :<br />
                                <input type="text" name="zipcode">
                            </li>
                            <li>
                                Country* :<br />
                                <input type="text" name="country">
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