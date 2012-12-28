<?php

/* Unauthorized access page
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
                <h2>Sorry, you need to be sign in to access this page!</h2>
                <p>Please sign in or register to access this page.
            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>