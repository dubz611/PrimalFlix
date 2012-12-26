<!DOCTYPE html>
<html>
    <?php // Main login page (PrimalFlix)
    include 'core/init.php';
    include 'includes/head.php';
    ?>
    <body> 
        <div id="loginContent">
            <?php include 'includes/header.php'; ?>     
            <?php include 'includes/naviBar.php'; ?>
            <br />
            <div id="mainBanner">
                <h2>Login/Register</h2>
                <form action="login.php" method="post">
                    <ul>
                        <li>
                            Username:<br />
                            <input type="text" name="username">
                        </li>
                        <li>
                            Password:<br/>
                            <input type="text" name="password">
                        </li>
                        <li>
                            <input type="submit" value="Log In">
                        </li>
                        <li>
                            <a href="register.php">Register</a>
                        </li>
                    </ul>
                </form>
            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>

