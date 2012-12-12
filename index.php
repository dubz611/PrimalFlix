<?php
    require_once 'service.php';
    $params = array_merge($_GET, $_POST);
    // Invoke the services module in case there's a service request
    invokeService($params);    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>PrimalFlix - How do you like me now ?!?</title>
        <script type='text/javascript' src='https://www.google.com/jsapi'></script>
        <script type='text/javascript'>
            if (window.google && window.google.load) {
                google.load('jquery', '1.6.1');
                google.load('jqueryui', '1.8.13');
            } 
        </script>
        <script type='text/javascript' src='js/application.js'></script>
            <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
            <link rel="stylesheet" href="/resources/demos/style.css" /> 
        <script src="jqbanner.js" type="text/javascript"></script>
            <link rel="stylesheet" type="text/css" media="screen" href="jqbanner.css" />
            <link href='http://fonts.googleapis.com/css?family=Rambla' rel='stylesheet' type='text/css'>
    
    <!-- JQuery tabs -->
    <style>
        p {font-family: 'Rambla', sans-serif; font-size:75%;}
        a {font-family: 'Rambla', sans-serif; font-size:75%;}
    </style>
    <script>
    $(function() {
        $( "#tabs" ).tabs({
            event: "mouseover"
        });
    });
    </script>
    </head>
    <body> 
        <img src ="img/pflogo2.png">
        <br /><br />
        <div id="tabs">
    <ul>
        <li><a href="#tabs-1">DVD</a></li>
        <li><a href="#tabs-2">Blu-Ray</a></li>
        <li><a href="#tabs-3">Video Games</a></li>
        <li><a href="#tabs-4">Accessory</a></li>
        <li><a href="#tabs-5">Membership</a></li>
    </ul>
    <div id="tabs-1">
        <a href="dvd_newrelease.html">New Releases</a>
        <a href="dvd_action.html">Action</a>
        <a href="dvd.html">Comedy</a>
        <a href="dvd.html">Suspense</a>
    </div>
    <div id="tabs-2">
        <a href="bray_newrelease.html">New Releases</a>
        <a href="bray_action.html">Action</a>
        <a href="bray.html">Comedy</a>
        <a href="bray.html">Suspense</a>
    </div>
    <div id="tabs-3">
        <a href="xbox360.html">XBOX 360</a>
        <a href="playstation3.html">Sony Playstation 3</a>
    </div>
    <div id="tabs-4">
        <a href="acc_systems.html">Game Systems</a>
        <a href="acc_game.html">Game Accessories</a>
        <a href="acc_player.html">DVD & Blu-Ray players</a>
        <a href="acc_home.html">Home Accessories</a>
    </div>
    <div id="tabs-5">
        <a href="member_join.html">Join Us Today!</a>
        <a href="member_benefit.html">Benefits</a>
        <a href="member_promo.html">Promotions</a>
    </div>
        </div>
        <br />
  
    <!-- JQuery Photo Slider -->
    <center>        
        <h3 style="font-family: 'Rambla', sans-serif;">FREE SHIPPING - on everything at PrimalFlix.com!</h3>
        
        <div id="jqb_object">

        <div class="jqb_slides">
        <div class="jqb_slide" title="slide title" ><a href="index.php"><img src="img/pflogo.png"/></a></div>
        <div class="jqb_slide" title="slide title" ><a href="slide link"><img src="img/2.gif"/></a></div>
        <div class="jqb_slide" title="slide title"><a href="slide link"><img src="img/3.gif"/></a></div>
        <div class="jqb_slide" title="slide title"><a href="slide link"><img src="img/1.gif"/></a></div>
        <div class="jqb_slide" title="slide title" ><span>TEXT SLIDE IN DIV</span></div></div>

        <div class="jqb_bar">
        <div class="jqb_info"></div>
        <div id="btn_next" class="jqb_btn jqb_btn_next"></div>
        <div id="btn_pauseplay" class="jqb_btn jqb_btn_pause"></div>
        <div id="btn_prev" class="jqb_btn jqb_btn_prev"></div>
        </div>
    
        </div>
    </center>
    
    
        <?php
            $vendors = getAllVendors();
        // put your code here
        ?>
        <select name="vendors" id="vendors"></select>
    </body>
</html>
