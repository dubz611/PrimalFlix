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
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rambla">
        <link href="js/fancybox/jquery.fancybox.css?v=2.1.3" rel="stylesheet">
        <script src="js/fancybox/jquery.fancybox.js"></script>
        <script src="js/jquery.qtip.min.js"></script>
        <link href="js/jquery.qtip.min.css" rel="stylesheet">            
        <link type="text/css" rel="stylesheet" href="pf.css" /> <!-- Main CSS -->
        <script src="js/nav1.1.min.js"></script>
        <script type="text/javascript" src="js/coinslider/coin-slider.min.js"></script>
        <link rel="stylesheet" href="js/coinslider/coin-slider-styles.css" type="text/css" />
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
        <script> // Content slider
            $(function() {
                $('#coin-slider').coinslider({ width: 700, height: 250, delay: 5000, effect: 'rain' });
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
        <script>
            $(function() {
                $('.test[title]').qtip( {
                    content: {
                        text: ('.test2').text()
                    },
                    style: {
                        classes: 'qtip-shadow qtip-dark'
                    },
                    position: {
                        at: 'right center',
                        my: 'left center'                               
                    },
                    hide: 'unfocus'
                });
            });
        </script>
        <style> /* Remove when done */
            #leftColumn {
                background-color: lightskyblue;
            }
            #rightColumn {
                background-color: greenyellow;
            }
        </style>
    </head>
    <body> 
        <div id="loginContent">
            <img src="img/penguin1.jpg" id="under"/>
            <input type="text" name="search" value="Search..." id="over">
            <br />
            <a href="index.php"><img id="mainLogo" class="tooltip" src ="img/pflogo2.png" title="rawrr!"/></a>     
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
            <div id="mainBanner">
                
            </div>
            <footer id="footer">Content created by Wayne Fields. // Managing Resources project. // Spring 2013.</footer>
        </div>
    </body>
</html>

