<?php
/* DVD page
 * 
 * Created:     1/3/13
 * Author:      Wayne Fields
 * 
 */

include 'core/init.php';
?>

<!DOCTYPE html>
<html>
    <?php include 'includes/head.php'; ?>
    <body> 
        <div id="content">
            <?php
            include 'includes/header.php';
            include 'includes/naviBar.php';
            ?>
            <br />
            <div>
                <?php include 'includes/widgets/dvd_browse.php' ?>
            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>



