<?php

/* User profile page
 * 
 * Created:     12/30/12
 * Author:      Wayne Fields
 * 
 */

include 'core/init.php';
protect_page();

if (empty($_POST) === false) {
    $required_fields = array('firstname', 'lastname', 'phone', 'street', 'city', 'state', 'zipcode', 'country');
    foreach ($required_fields as $key) {
        if (empty($_POST["$key"]) === true) {
            $errors[] = 'Required fields are marked with an asterisk.';
            break 1;
        }
    }

    if (empty($errors) === true) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = "A valid email address is required.";
        } else if (email_exists($_POST['email']) === true && $user_data['email'] !== $_POST['email']) {
            $errors[] = "Sorry, email: " . $_POST['email'] . " is already in use.";
        }
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
                if (empty($_POST) === false && empty($errors) === true) {
                    // update UserDetail table
                    $update_data1 = array(
                        'firstname' => $_POST['firstname'],
                        'lastname'  => $_POST['lastname'],
                        'phone'     => $_POST['phone'],
                        'phone2'    => $_POST['phone2'],
                        'fax'       => $_POST['fax'],
                    );
                    // update Address table
                    $update_data2 = array(
                        'street'    => $_POST['street'],
                        'street2'   => $_POST['street2'],
                        'city'      => $_POST['city'],
                        'state'     => $_POST['state'],
                        'zipcode'   => $_POST['zipcode'],
                        'country'   => $_POST['country'],
                    );
                    $update_data3 = $_POST['email'];
                    $userDetailNo = $user_data['userdetailno'];
                    $userAddressNo = $user_data['addressno'];
                    $userEmail = $user_data['email'];
                    update_user_complete($update_data1, $update_data2, $update_data3, $userDetailNo, $userAddressNo, $userEmail);
                } else if (empty($errors) === false) {
                    echo output_errors($errors);
                }
                ?>
                <form action="" method="POST">
                    <fieldset>
                        <legend>Contact Information</legend>
                        <ul>
                            <li>First Name* :<br />
                                <input type="text" name="firstname" value="<?php echo $user_data['firstname']; ?>">
                            </li>
                            <li>Last Name* :<br />
                                <input type="text" name="lastname" value="<?php echo $user_data['lastname']; ?>">
                            </li>
                            <li>Email* :<br />
                                <input type="text" name="email" value="<?php echo $user_data['email']; ?>">
                            </li>
                            <li>Phone* :<br />
                                <input type="text" name="phone" value="<?php echo $user_data['phone']; ?>">
                            </li>
                            <li>
                                Phone2 :<br />
                                <input type="text" name="phone2" value="<?php echo $user_data['phone2']; ?>">
                            </li>
                            <li>
                                Fax :<br />
                                <input type="text" name="fax" value="<?php echo $user_data['fax']; ?>">
                            </li>                               
                        </ul>
                    </fieldset>
                    <fieldset>
                        <legend>Personal Information</legend>
                        <ul>
                            <li>
                                Street* :<br />
                                <input type="text" name="street" value="<?php echo $user_data['street']; ?>">
                            </li>
                            <li>
                                Street2 :<br />
                                <input type="text" name="street2" value="<?php echo $user_data['street2']; ?>">
                            </li>
                            <li>
                                City* :<br />
                                <input type="text" name="city" value="<?php echo $user_data['city']; ?>">
                            </li>
                            <li>
                                State* :<br />
                                <input type="text" name="state" value="<?php echo $user_data['state']; ?>">
                            </li>
                            <li>
                                Zip Code* :<br />
                                <input type="text" name="zipcode" value="<?php echo $user_data['zipcode']; ?>">
                            </li>
                            <li>
                                Country* :<br />
                                <input type="text" name="country" value="<?php echo $user_data['country']; ?>">
                            </li>
                            <li>
                                <input type="submit" value="Update">     
                            </li>
                        </ul>
                    </fieldset>
                </form>
            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>

