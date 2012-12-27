<?php
/* Logging off user. 
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 */

session_start();
session_destroy();

header('Location: signIn.php');
?>
