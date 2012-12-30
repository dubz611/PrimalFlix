<?php
/* User profile
 * 
 * Created:     12/28/12
 * Author:      Wayne Fields
 * 
 */

include 'core/init.php';
echo
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
                <form action="" method="POST">
                    <fieldset>
                        <legend>Profile</legend>
                        <ul>
                            <li>
                                First Name* : <br />
                                <input type="text" name="first_name">
                            </li>
                            <li>
                                Last Name* : <br />
                                <input type="text" name="last_name">
                            </li>
                            <li>
                                Email* : <br />
                                <input type="text" name="email">
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

