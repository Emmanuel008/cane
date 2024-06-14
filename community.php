<!DOCTYPE html>
<!--[if lt IE 9 ]>
<html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<?php  ?>
<head>

    <!--- basic page needs -->
    <meta charset="utf-8">
    <title>Buni Hub</title>
    <meta name="description" content="Building a stable innovation technology and entrepreneurship ecosystem in Africa">
    <meta name="author" content="Sahara Ventures">

    <!-- mobile specific metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="3600">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/vendor.css"/>
    <link rel="stylesheet" href="css/main.css"/>

    <!-- script -->
    

    <!-- favicons -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139029947-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-139029947-1');
    </script>
</head>

<body id="top">

<!-- header -->
<header class="s-header ">
    <div class="nav-menu">
        <div class="nav-menu-content">
            <div class="logo">
                <a class="logo-link" href="/">
                    <img alt="Homepage" src="images/logo.jpeg">
                </a>
            </div>
            <div class="navigation">
                <ul class="navigation_list">
                    <li class="dropdown"><a class="" href="home.html" title="about">Home</a>

                    <li class="dropdown"><a href="community.php">Community</a></li>
                    <!-- <li class="dropdown"><a class="" href="/clients" title="clients">Community</li> -->
                    <li class="dropdown"><a href="blog.php" >Programs</a></li>
                    <li class="dropdown"><a class="" href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>

    <a class="nav-menu-toggle" href="#0" id="nav-menu-toggle">
        <span class="header-menu-text">Menu</span>
        <span class="header-menu-icon"></span>
    </a>
</header> 
<!-- end s-header -->

<section class="s-home target-section" data-image-src="images/hero-bg1.jpg" data-natural-height=2000 data-natural-width=3000 data-parallax="scroll" data-position-y=center id="home">

    <!-- <div class="overlay"></div>
    <div class="shadow-overlay"></div> -->

    <div class="home-content">

        <div class="row home-content__main">

            <h3>Welcome </h3>
            <h1>
                <br>Buni Hub Community</br>
                Looking for a comfortable working space?.
            </h1>
        </div>

        
    <!-- end home-social -->

</section> <!-- end s-home -->


    </div> <!-- end about-stats -->

    <div class="about__line"></div>

</section> <!-- end s-about -->


<!-- services ================================================== -->
<section class="s-services" id='services'>

    <div class="row section-header has-bottom-sep">
        <div class="col-full">
            <h3 class="subhead">What We Do</h3>
            <h1 class="display-2">BuniHub Community</h1>
        </div>
    </div> <!-- end section-header -->

    <div class="row services-list block-1-2 block-tab-full">
    
 
 <div class="owl-carousel owl-carousel1 owl-theme">
    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "upload";
    $port = 3306;
    
     // Create database connection
     $conn = new mysqli($host, $username, $password, $db, $port);
    
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
    
     
     $sql = "SELECT * FROM `program` ORDER BY `id` DESC";
     $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <div>
                <div class="card text-center">
                    <img class="card-img-top" src="./images/<?php echo $row['photo']; ?>" height="50" width="50" alt="">
                    <div class="card-body">
                        <h5><?php echo $row['title']; ?><br /><span> Program Member </span></h5>
                        <p class="card-text">“ <?php echo $row['description']; ?> ”</p>
                        <a href="<?php echo $row['link']; ?>" class="card-link" style="color: #d8420d">Read more</a>
                    </div>
                </div>
            </div>
        <?php }
    } else {
        echo "NO ITEMS UPLOADED";
    }

    // Close statement and connection
    ?>
</div>

        
</div> <!-- end services-list -->
</section> 
<!-- end s-services -->


<!-- footer -->
<footer>
    <div class="row footer-main">
        <div class="col-three tab-full left footer-subscribe">
            <h4>Other Links</h4>
            <p>
                <a href="home.html" target="">About</a> <br>
                <a href="community.php" target="">Community</a> <br>
                <a href="blog.php" target="">Programs</a> <br>
                <a class="" href="contact.html">Contact</a>
            </p>
        </div>

        <div class="col-three tab-full footer-subscribe">
            <h4>Connect with us</h4>
            <p>
                <a href="https://www.facebook.com/VenturesSahara" target="_blank">Facebook</a><br>
                <a href="https://twitter.com/bunihub" target="_blank">Twitter</a><br>
                <a href="https://www.instagram.com/bunihub" target="_blank">Instagram</a><br>
                <a href="https://www.youtube.com/channel/UCiOnji8o4Wt8b5ST-E57KjQ" target="_blank">Youtube</a><br>
                <a href="https://www.linkedin.com/company/bunihub" target="_blank">LinkedIn</a>
            </p>
        </div>

        <div class="col-six tab-full right footer-subscribe">
            <h4>Get Notified</h4>
            <p>Keep Up With Our Works. Subscribe To Our Newsletter and Receive Updates.</p>
            <div class="subscribe-form">
                <form class="group" id="mc-form">
                    <input class="email" id="mc-email" name="email" placeholder="Email Address" required="" type="email" value="">
                    <input name="subscribe" type="submit" value="Subscribe">
                    <label class="subscribe-message" for="mc-email"></label>
                </form>
            </div>
        </div>
    </div> <!-- end footer-main -->

    <div class="row footer-bottom">
        <div class="col-twelve">
            <div class="copyright">
                <span>&copy; Copyright <a href="/">BuniHub</a></span>
            </div>
            <div class="go-top">
                <a class="smoothscroll" href="#top" title="Back to Top"><i aria-hidden="true" class="icon-arrow-up"></i></a>
            </div>
        </div>
    </div> <!-- end footer-bottom -->
</footer> <!-- end footer -->




<!-- Java Script -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script>
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.dataset.src;
        });
    } else {
        // Dynamically import the LazySizes library
        const script = document.createElement('script');
        script.src = '/js/lazysizes.min.js';
        document.body.appendChild(script);
    }
</script>
<!-- jQuery and Owl Carousel JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
(function () {
    "use strict";

    var carousels = function () {
        $(".owl-carousel1").owlCarousel({
            loop: true,
            center: true,
            margin: 0,
            responsiveClass: true,
            nav: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                680: {
                    items: 2,
                    nav: false,
                    loop: false
                },
                1000: {
                    items: 3,
                    nav: true
                }
            }
        });
    };

    (function ($) {
        carousels();
    })(jQuery);
})();
</script>

</body>

<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/pace.js"></script>
</html>
