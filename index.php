<?php
require_once 'service.php';
$params = array_merge($_GET, $_POST);
// Invoke the services module in case there's a service request
invokeService($params);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="img/favicon.png">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>PrimalFlix - DEVELOPMENT (Home Page)</title>
        <script type='text/javascript' src='https://www.google.com/jsapi'></script>
        <script type='text/javascript'>
            if (window.google && window.google.load) {
                google.load('jquery', '1.6.1');
                google.load('jqueryui', '1.8.13');
            } 
        </script>
        <script type='text/javascript' src='js/application.js'></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css" /> 
        <script src="jqbanner.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="jqbanner.css" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rambla">
        <script type="text/javascript" src="widget/lib/jquery.ui.rlightbox.min.js"></script>
        <link type="text/css" rel="stylesheet" href="widget/css/lightbox.min.css" />
        <link type="text/css" rel="stylesheet" href="pf.css" /> <!-- main css -->

        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.color.js"></script>
        <script> // Side navigation
            $(function() {
                $('#dashboard').hover(
                function() {
                    $(this).stop().animate(
                    {
                        left: '0',
                        backgroundColor: 'rgb(255,255,255)'
                    },
                    500,
                    'easeInSine'
                ); // end animate
                }, 
                function() {
                    $(this).stop().animate(
                    {
                        left: '-92px',
                        backgroundColor: '#0099CC'
                    },
                    1500,
                    'easeOutBounce'
                ); // end animate
                }
            ); // end hover 
                
            }); // end function
        </script>

        <script>
            $(document).ready(function(){
                $('.gallery img').mouseover(function() {
                    
                    $(this).css('opacity', '0.5');
                }); // end mouseover
                $('.gallery img').mouseout(function() {
                    $(this).css('opacity', '1.0');
                }); // end mouseout
            }); // end ready
        </script>

        <script>
            jQuery(function($) {
                $( ".lb_youtube" ).rlightbox({overwriteTitle: "True"});
            });
        </script>
    </head>
    <body>    

        <div id="dashboard">
            <img src="img/blue_h.jpg" width="70" height="70" alt="blue">
            <img src="img/green_h.jpg" width="70" height="70" alt="green">
            <img src="img/orange_h.jpg" width="70" height="70" alt="orange">
            <img src="img/purple_h.jpg" width="70" height="70" alt="purple">
            <img src="img/red_h.jpg" width="70" height="70" alt="red">
        </div>
        <div><input id="search" type="text" name="search" value="Search"></div>
        <div id="header">
            <a href="index.php"><img src ="img/pflogo2.png" /></a></div>
        <div id="container">
            <!-- Solid Block menu -->   
            <ul class="solidblockmenu">
                <li class="menu"><a href="index.php">HOME</a></li>
                <li><a href="dvd_newrelease.html">DVD</a></li>
                <li><a href="bray_newrelease.html">BLU-RAY</a></li>
                <li><a href="games.html">VIDEO GAMES</a></li>
                <li><a href="accessory.html">ACCESSORY</a></li>
                <li><a href="membership.html">MEMBERSHIP</a></li>
                <li class="right"><a href="shoppingcart.html">CART</a></li>
                <li class="right"><a href="login.html">SIGN-IN</a></li>
            </ul><br /><br />

            <!-- JQuery Banner Slider (jqslider) -->

            <h3><b>FREE SHIPPING</b> - on everything at PrimalFlix.com!</h3><br />

            <div id="jqb_object" class="jqb_center">

                <div class="jqb_slides">
                    <div class="jqb_slide" title="Madagascar 3 - Now on Blu-Ray & DVD" ><a href="bray_newrelease.html"><img src="img/madag3_banner.jpg"/></a></div>
                    <div class="jqb_slide" title="PS3 - Long Live Play" ><a href="games.html"><img src="img/ps3banner.jpg"/></a></div>
                    <div class="jqb_slide" title="COD Black Ops 2 - Now Available"><a href="games.html"><img src="img/blackop2.jpg"/></a></div>
                    <div class="jqb_slide" title="slide title"><a href="bray_newrelease.html"><img src="img/1.gif"/></a></div>
                </div>
                <div class="jqb_bar">
                    <div class="jqb_info"></div>
                    <div id="btn_next"      class="jqb_btn jqb_btn_next"></div>
                    <div id="btn_pauseplay" class="jqb_btn jqb_btn_pause"></div>
                    <div id="btn_prev"      class="jqb_btn jqb_btn_prev"></div>
                </div></div><br /><br />

            <!-- JQuery Video Box (rlightbox) -->
            <!-- Will be working with this plugin for DVD, Blu-Ray, & Video Games page -->

            <div id="newreleases">
                <div class="rambia2"><img src ="img/newreleases.png"></div>
                <div class="gallery">
                    <a href="http://www.youtube.com/watch?v=SlSWCnNRfeM" title="The Dark Knight Rises" class="lb_youtube"><img height="150" src ="img/darkknight.jpg"></a>
                    <a href="http://www.youtube.com/watch?v=C05pGnZQQtE" title="Madagascar 3" class="lb_youtube"><img height="150" src ="img/madaga3.jpg"></a>
                    <a href="http://www.youtube.com/watch?v=Pxzb3bHHu2Q" title="The Expendables 2" class="lb_youtube"><img height="150" src ="img/expend2.jpg"></a>
                    <a href="http://www.youtube.com/watch?v=IyaFEBI_L24" title="Men In Black 3" class="lb_youtube"><img height="150" src ="img/mib3.jpg"></a>   
                </div>   
                <div class="gallery">
                    <a href="http://www.youtube.com/watch?v=m_6ksxHBklo" title="Safe" class="lb_youtube"><img height="150" src ="img/safe.jpg"></a>
                    <a href="http://www.youtube.com/watch?v=sAsGhDMlZjQ" title="Prometheus" class="lb_youtube"><img height="150" src ="img/prometheus.jpg"></a>
                    <a href="http://www.youtube.com/watch?v=CBIGWu0rAHI" title="The Amazing Spiderman" class="lb_youtube"><img height="150" src ="img/spiderman.jpg"></a>
                    <a href="http://www.youtube.com/watch?v=Pp9xuquibQc" title="Chernobyl Diaries" class="lb_youtube"><img height="150" src ="img/chernobyl.jpg"></a>
                </div>
            </div>
            
            <?php
            $vendors = getAllVendors();
            // put your code here
            ?>
            <select name="vendors" id="vendors"></select>
        </div>
        
        <div id="footer">
            <p>Content created by Wayne Fields. // Managing Resources project - Spring 2013.</p>
        </div>

    </body>
</html>
