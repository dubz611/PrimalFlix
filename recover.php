<?php
/* Recover page 
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 * 
 * NOTE: Email function is not working
 */
include 'core/init.php';
logged_in_redirect();
include 'includes/overall/header.php';
?>

<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
    echo "Thank you! Please check your email pertaining your recovery information.";
} else {
    $mode_allowed = array('username', 'password');
    if (isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
        if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
            $user_phone = verify_phone($_POST['phone'], $_POST['email']);
            if (email_exists($_POST['email']) === true && $user_phone == true) {
                recover($_GET['mode'], $_POST['email']);
                header('Location: recover.php?success');
                exit();
            } else {
                $errors[] = "Oops, we could not find this account!";
                echo output_errors($errors);
            }
        }
        ?>

        <form action="" method="POST">
            <fieldset>
                <ul>
                    <li>
                        <img id="recoverIcon" src="img/question.png">
                    </li>
                    <li>
                        <div id="formTitle">Account Recovery</div> <br />                        
                    </li>
                    <li>
                        Please enter your Email: <br />
                        <input type="text" name="email">
                    </li>
                    <li>
                        Please enter your Phone #: <br />
                        <input type="text" name="phone">
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