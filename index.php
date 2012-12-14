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
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
            <link rel="stylesheet" href="/resources/demos/style.css" /> 
        <script src="jqbanner.js" type="text/javascript"></script>
            <link rel="stylesheet" type="text/css" media="screen" href="jqbanner.css" />
            <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rambla">
        
        <!-- SUBJECT TO REMOVAL.. <script type="text/javascript" src="widget/lib/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="widget/lib/jquery.ui.core.min.js"></script>
        <script type="text/javascript" src="widget/lib/jquery.ui.widget.min.js"></script>-->
        <script type="text/javascript" src="widget/lib/jquery.ui.rlightbox.min.js"></script>
            <link type="text/css" rel="stylesheet" href="widget/css/lightbox.min.css" />
            <link type="text/css" rel="stylesheet" href="pf.css" /> <!-- main css -->
    
    <!-- JQueryUI tabs (JQueryUI tab) -->
    <script>
    $(function() {
        $( "#tabs" ).tabs({
            event: "mouseover"
        });
    });
    </script>
    </head>
    <body>
        <a href="index.php"><img src ="img/pflogo2.png"></a>
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
        <a href="wiiu.html">Nintendo Wii U</a>
        <a href="pc.html">PC</a>
    </div>
    <div id="tabs-4">
        <a href="acc_systems.html">Game Systems</a>
        <a href="acc_game.html">Game Accessories</a>
        <a href="acc_player.html">DVD & Blu-Ray Players</a>
        <a href="acc_home.html">Other Accessories</a>
    </div>
    <div id="tabs-5">
        <a href="member_join.html">Join Us</a>
        <a href="member_benefit.html">Benefits</a>
        <a href="member_promo.html">Promotions</a>
    </div>
        </div>
        
  
    <!-- JQuery Photo Slider (jqslider) -->
    <center>        
    <h3 style="font-family: 'Rambla', sans-serif;"><b>FREE SHIPPING</b> - on everything at PrimalFlix.com!</h3>
        
    <div id="jqb_object">

    <div class="jqb_slides">
    <div class="jqb_slide" title="slide title" ><a href="index.php"><img src="img/pflogo.png"/></a></div>
    <div class="jqb_slide" title="PS3 - Long Live Play" ><a href="slide link"><img src="img/ps3banner.jpg"/></a></div>
    <div class="jqb_slide" title="slide title"><a href="slide link"><img src="img/3.gif"/></a></div>
    <div class="jqb_slide" title="slide title"><a href="slide link"><img src="img/1.gif"/></a></div>
    <div class="jqb_slide" title="slide title" ><span>TEXT SLIDE IN DIV</span></div></div>

    <div class="jqb_bar">
    <div class="jqb_info"></div>
    <div id="btn_next" class="jqb_btn jqb_btn_next"></div>
    <div id="btn_pauseplay" class="jqb_btn jqb_btn_pause"></div>
    <div id="btn_prev" class="jqb_btn jqb_btn_prev"></div>
    </div></div><br /><br />
    
    <!-- JQuery Video Box (rlightbox) -->
    <!-- Will be working with this plugin for DVD, Blu-Ray, & Video Games page -->
    <table>
    <tr><th colspan="4" class="rambia2"><u>New Releases</u></th>
    </tr>
    <tr>
        <th><a href="http://www.youtube.com/watch?v=SlSWCnNRfeM" title="The Dark Knight Rises" class="lb_youtube"><img src ="img/darkknight.jpg"></a>
        <div class="title">The Dark Knight Rises</div></th>
        <th><a href="http://www.youtube.com/watch?v=C05pGnZQQtE" title="Madagascar 3" class="lb_youtube"><img src ="img/madaga3.jpg"></a>
        <div class="title">Madagascar 3</div></th>
        <th><a href="http://www.youtube.com/watch?v=Pxzb3bHHu2Q" title="The Expendables 2" class="lb_youtube"><img src ="img/expend2.jpg"></a>
        <div class="title">The Expendables 2</div></th>
        <th><a href="http://www.youtube.com/watch?v=IyaFEBI_L24" title="Men In Black 3" class="lb_youtube"><img src ="img/mib3.jpg"></a>
        <div class="title">Men in Black 3</div></th>
    </tr>
    <tr> 
        <th><a href="http://www.youtube.com/watch?v=m_6ksxHBklo" title="Safe" class="lb_youtube"><img src ="img/safe.jpg"></a>
        <div class="title">Safe</div></th>
        <th><a href="http://www.youtube.com/watch?v=sAsGhDMlZjQ" title="Prometheus" class="lb_youtube"><img src ="img/prometheus.jpg"></a>
        <div class="title">Prometheus</div></th>
        <th><a href="http://www.youtube.com/watch?v=CBIGWu0rAHI" title="The Amazing Spiderman" class="lb_youtube"><img src ="img/spiderman.jpg"></a>
        <div class="title">The Amazing Spiderman</div></th>
        <th><a href="http://www.youtube.com/watch?v=Pp9xuquibQc" title="Chernobyl Diaries" class="lb_youtube"><img src ="img/chernobyl.jpg"></a>
        <div class="title">Chernobyl Diaries</div></th>
    </tr>
    </table></center>
    
        <script type="text/javascript">
            jQuery(function($) {
            $( ".lb_youtube" ).rlightbox({overwriteTitle: "True"});
        });
        </script>
        <?php
            $vendors = getAllVendors();
        // put your code here
        ?>
        <select name="vendors" id="vendors"></select>
    </body>
</html>
