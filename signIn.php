<?php

/* Sign-in page
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 * 
 */

include 'core/init.php';
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
                if (logged_in() === true) {
                    include 'includes/widgets/loggedin.php';
                } else {
                    include 'includes/loginForm.php';
                }
                include 'includes/widgets/user_count.php';
                ?>
            </div>
            
        </div>
    </body>
</html>

