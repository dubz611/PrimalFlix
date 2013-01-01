<?php
/* Recover page 
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 */
include 'core/init.php';
logged_in_redirect();
include 'includes/overall/header.php';
?>


<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
    echo "Please check your email pertaining your recovery information.";
} else {
    $mode_allowed = array('username', 'password');
    if (isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
        if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
            if (email_exists($_POST['email']) === true) {
                //  recover($_GET['mode'], $_POST['email']);
                header('Location: recover.php?success');
                exit();
            } else {
                echo "Oops, we could not find this email!";
            }
        }
        ?>

        <form action="" method="POST">
            <fieldset>
                <legend>Recover Account</legend>
                <ul>
                    <li>
                        Please enter your email address: <br />
                        <input type="text" name="email">
                    </li>
                    <li>
                        <input type="submit" value="Submit">
                    </li>
                </ul>       
            </fieldset>   
        </form>

        <?php
    } else {
        header('Location: index.php');
        exit();
    }
}
//include 'includes/overall/footer.php';
?>