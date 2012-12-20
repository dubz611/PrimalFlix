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
        <link href="js/fancybox/jquery.fancybox.css?v=2.1.3" rel="stylesheet">
        <script src="js/fancybox/jquery.fancybox.js"></script>
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
        <script> // new releases covers
            $(function(){
                $('.gallery img').mouseover(function() {
                    
                    $(this).css('opacity', '0.5');
                }); // end mouseover
                $('.gallery img').mouseout(function() {
                    $(this).css('opacity', '1.0');
                }); // end mouseout
            }); // end ready
        </script>
        <script> // search bar
            $(function() {
                $('.over').focus(function() {
                    $(this).val('');
                    $(this).css('fontStyle','normal');
                }); // end focus
                $('.over').blur(function() {
                    $(this).val('Search...');
                    $(this).css('fontStyle','italic');
                }); // end blur
            }); // end function  
        </script>  
        <script> // Youtube player
        $(document).ready(function() {
            $(".youtube").fancybox({
                openEffect : 'fade',
                closeEffect : 'fade',
                padding : 0,
                helpers : {
                    overlay : {
                        css : {'background' : '#0099CC'}
                    } }
            }); // fancybox
        }); // end ready 
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
        <img src="../PrimalFlix/img/penguin1.jpg" width="83" height="82" class="under"/>
        <input type="text" name="search" value="Search..." class="over">
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
            <div><h3><b>FREE SHIPPING</b> - on everything at PrimalFlix.com!</h3></div>

            <!-- JQuery Banner Slider (jqslider) -->
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

            <!-- Will be working with this plugin for DVD, Blu-Ray, & Video Games page -->
            <div id="newreleases">
                <div class="newreleases_title"><img src ="img/newreleases.png"></div>
                <div>Click on a movie to watch it's trailer!</div>
                <div class="gallery">
                    <a href="http://www.youtube.com/embed/SlSWCnNRfeM?autoplay=1" class="youtube fancybox.iframe"><img src ="img/darkknight.jpg" /></a>
                    <a href="http://www.youtube.com/embed/C05pGnZQQtE?autoplay=1" title="Madagascar 3" class="youtube fancybox.iframe"><img src ="img/madaga3.jpg" /></a>
                    <a href="http://www.youtube.com/embed/Pxzb3bHHu2Q?autoplay=1" title="The Expendables 2" class="youtube fancybox.iframe"><img src ="img/expend2.jpg" /></a>
                    <a href="http://www.youtube.com/embed/IyaFEBI_L24?autoplay=1" title="Men In Black 3" class="youtube fancybox.iframe"><img src ="img/mib3.jpg" /></a>   
                </div>   
                <div class="gallery">
                    <a href="http://www.youtube.com/embed/m_6ksxHBklo?autoplay=1" title="Safe" class="youtube fancybox.iframe"><img src ="img/safe.jpg" /></a>
                    <a href="http://www.youtube.com/embed/sAsGhDMlZjQ?autoplay=1" title="Prometheus" class="youtube fancybox.iframe"><img src ="img/prometheus.jpg" /></a>
                    <a href="http://www.youtube.com/embed/CBIGWu0rAHI?autoplay=1" title="The Amazing Spiderman" class="youtube fancybox.iframe"><img src ="img/spiderman.jpg" /></a>
                    <a href="http://www.youtube.com/embed/Pp9xuquibQc?autoplay=1" title="Chernobyl Diaries" class="youtube fancybox.iframe"><img src ="img/chernobyl.jpg" /></a>
                </div>
            </div>

            <?php
            $vendors = getAllVendors();
            // put your code here
            ?>
            <select name="vendors" id="vendors"></select>
        </div>

        <div id="footer">
            <p>Content created by Wayne Fields. // Managing Resources project. // Spring 2013.</p>
        </div>

    </body>
</html>
