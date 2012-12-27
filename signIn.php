<?php include 'core/init.php'; ?>
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
                if (logged_in() === true) {
                    include 'includes/widgets/loggedin.php';
                } else {
                    include 'includes/loginForm.php';
                }
                ?>
            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>

