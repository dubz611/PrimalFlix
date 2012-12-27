<!DOCTYPE html>
<html>
    <?php
    // Main login page (PrimalFlix)
    include 'core/init.php';
    include 'includes/head.php';
    ?>
    <body> 
        <div id="loginContent">
            <?php include 'includes/header.php'; ?>     
            <?php include 'includes/naviBar.php'; ?>
            <br />
            <div id="mainBanner">
                <?php 
                if (logged_in() === true) {
                    echo 'Logged In!';
                } else {
                    include 'includes/loginForm.php';
                }
                 ?>
            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>

