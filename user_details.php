<?php
/* User details page
 * 
 * Created:     12/30/12
 * Author:      Wayne Fields
 * 
 */

include 'core/init.php';
protect_page();
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
                // Authenticate user 
                if (isset($_GET['username']) === true && empty($_GET['username']) === false && ($_GET['username']) == $user_data['username']) {
                    $username = $_GET['username'];
                    
                    if (user_exists($username) === true) {
                        $user_id = user_id_from_username($username);
                        $profile_data = user_data($user_id, 'accountno', 'username', 'firstname', 'lastname', 'email', 'initialdate', 'phone', 'phone2', 'fax', 'street', 'street2', 'city', 'state', 'zipcode', 'country');
                        ?>
                        <fieldset>
                            <legend>General Information</legend>
                            <p>Username: <?php echo $profile_data['username']; ?></p>
                            <p>First Name: <?php echo $profile_data['firstname']; ?></p>
                            <p>Last Name: <?php echo $profile_data['lastname']; ?></p>
                            <p>Email: <?php echo $profile_data['email']; ?></p>
                            <p>Member Since: <?php echo $profile_data['initialdate']; ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Additional Information</legend>
                            <p>Phone: <?php echo $profile_data['phone']; ?></p>
                            <p>Phone2: <?php echo $profile_data['phone2']; ?></p>
                            <p>Fax: <?php echo $profile_data['fax']; ?></p>
                            <p>Street: <?php echo $profile_data['street']; ?></p>
                            <p>Street2: <?php echo $profile_data['street2']; ?></p>
                            <p>City: <?php echo $profile_data['city']; ?></p>
                            <p>State: <?php echo $profile_data['state']; ?></p>
                            <p>Zip Code: <?php echo $profile_data['zipcode']; ?></p>
                            <p>Country: <?php echo $profile_data['country']; ?></p>
                        </fieldset>
                        <?php
                    }
                } else {
                    header('Location: signin.php');
                    exit();
                }
                ?>
            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>