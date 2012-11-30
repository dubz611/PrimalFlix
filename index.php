<?php
    require_once 'VendorService.php';
    $params = array_merge($_GET, $_POST);
    // Invoke the services module in case there's a service request
    invokeService($params);    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Flunkbuster</title>
        <script type='text/javascript' src='https://www.google.com/jsapi'></script>
        <script type='text/javascript'>
            if (window.google && window.google.load) {
                google.load('jquery', '1.6.1');
                google.load('jqueryui', '1.8.13');
            }            
        </script>
        <script type='text/javascript' src='js/application.js'></script>
    </head>
    <body>
        <?php
            $vendors = getAllVendors();
        // put your code here
        ?>
        <select name="vendors" id="vendors"></select>
    </body>
</html>
