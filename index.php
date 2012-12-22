<!DOCTYPE html>
<?php
require_once 'service.php';
$params = array_merge($_GET, $_POST);
// Invoke the services module in case there's a service request
invokeService($params);
?>
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
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rambla">
        <link href="js/fancybox/jquery.fancybox.css?v=2.1.3" rel="stylesheet">
        <script src="js/fancybox/jquery.fancybox.js"></script>
        <link type="text/css" rel="stylesheet" href="pf.css" /> <!-- Main CSS -->
        <script src="js/nav1.1.min.js"></script>
        <link href="js/anythingSlider/anythingslider.css" rel="stylesheet">
        <script src="js/anythingSlider/jquery.anythingslider.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.color.js"></script>
        <script> // Navigation bar
            $(function() {
                $('#navigation').navPlugin({
                    'itemWidth': 100,
                    'itemHeight': 30,
                    'navEffect' : 'slide',
                    'speed' : 250
                }); // end navigation bar
            }); // end ready
        </script>
        <script>
            $(function() {
                $('#slider').anythingSlider( {
                    buildArrows : false,
                    autoPlay : true,
                    buildStartStop : false,
                    buildNavigation : false,
                    delay : 7000,
                    resumeDelay : 7000,
                    easing : "easeInOutBack"
                }); // end anythingSlider
            }); // end ready
        </script>
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
                    1000,
                    'easeOutBounce'
                ); // end animate
                }
            ); // end hover 
            }); // end ready
        </script>
        <script> // New releases covers
            $(function(){
                $('.gallery img').mouseover(function() {
                    
                    $(this).css('opacity', '0.5');
                }); // end mouseover
                $('.gallery img').mouseout(function() {
                    $(this).css('opacity', '1.0');
                }); // end mouseout
            }); // end ready
        </script>
        <script>
            $(function() {
                $('.over').focus(function() {
                    var field = $(this);
                    if (field.val()==field.attr('defaultValue'))
                        field.val('');
                });
            }); // end ready
        </script>
        <script> // Youtube player
            $(function() {
                $(".youtube").fancybox({
                    openEffect : 'fade',
                    closeEffect : 'fade',
                    padding : 0,
                    helpers : {
                        title : null,
                        overlay : { 
                            css : {'background' : '#0099CC'}
                        } }
                }); // fancybox
            }); // end ready 
        </script>
    </head>
    <body> 
        <div id="dashboard">
            <a href="http://www.twitter.com" ><img src="img/twitter_icon.png" alt="blue"></a>
            <a href="http://www.facebook.com" ><img src="img/fb_icon.jpg" alt="green"></a>
            <a href="http://www.myspace.com" ><img src="img/myspace_icon.png" alt="orange"></a>
            <a href="http://www.pinterest.com" ><img src="img/pinterest_icon.png" alt="purple"></a>
            <a href="http://www.foursquare.com" ><img src="img/foursquare_icon.jpg" alt="red"></a>
        </div>
        <div id="content">
            <img src="img/penguin1.jpg" id="under"/>
            <input type="text" name="search" value="Search..." id="over">
            <br />
            <a href="index.php"><img src ="img/pflogo2.png" id="mainlogo" /></a>     
            <div>
                <ul id="navigation">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">DVD</a>
                        <ul>
                            <li><a href="#">New Releases</a></li>
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Comedy</a></li>
                            <li><a href="#">Suspense</a></li>
                            <li><a href="#">Drama</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Blu-Ray</a>
                        <ul>
                            <li><a href="#">New Releases</a></li>
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Comedy</a></li>
                            <li><a href="#">Suspense</a></li>
                            <li><a href="#">Drama</a></li>
                        </ul>  
                    </li>
                    <li><a href="#">Video Games</a>
                        <ul>
                            <li><a href="#">Xbox 360</a></li>
                            <li><a href="#">Playstation 3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Accessory</a></li>
                    <li><a href="#">Membership</a></li>
                    <li><a href="#">About Us</a>
                        <ul>
                            <li><a href="#">Our History</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </li>
                    <li></li>
                    <li><a href="#">Sign-In</a></li>
                    <li><a href="#">Cart</a></li>
                </ul>
            </div><br />
            <div id="main_banner">
                <div id="slider">
                    <div>
                        <a href="page1.html"><img src="img/1.gif" alt="1"></a>
                    </div>
                    <div>
                        <a href="page2.html"><img src="img/ps3banner.jpg" alt="2"></a>
                    </div>
                    <div>
                        <a href="page3.html"><img src="img/madag3_banner.jpg" alt="3"></a>
                    </div>
                </div>
            </div>
            <div id="leftcolumn">
                <div></div>
                <div id="newreleases_area">
                    <div ><img src ="img/newreleases.png"></div>
                    <span>Click on any movie to watch it's trailer</span>
                    <div class="gallery">
                        <a href="http://www.youtube.com/embed/SlSWCnNRfeM?autoplay=1" title="The Dark Knight Rises" class="youtube fancybox.iframe"><img src ="img/darkknight.jpg" /></a>
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
            </div>
            <div id="rightcolumn">Begin next column here. Put news here!
                <div>    
                    <?php
                    $vendors = getAllVendors();
                    // put your code here
                    ?>
                    <select name="vendors" id="vendors"></select>
                </div>
            </div><div id="footer">Content created by Wayne Fields. // Managing Resources project. // Spring 2013.</div>
        </div>

    </body>
</html>
