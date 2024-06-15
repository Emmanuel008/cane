<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs -->
    <meta charset="utf-8">
    <title>Buni Hub</title>
    <meta name="description" content="Building a stable innovation technology and
                    entrepreneurship ecosystem in Africa">
    <meta name="author" content="BuniHub">

    <!-- mobile specific metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="3600">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/vendor.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="index.css"/>

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
<style>
    .gtco-testimonials {
    text-align: center;
}

.gtco-testimonials .card {
    display: inline-block;
    margin: 15px;
    max-width: 300px;
    width: 100%;
}

.gtco-testimonials .card-img-top {
    border-radius: 50%;
    margin: 0 auto;
    height: 350px;
    width: 50px;

}

</style>
</head>

<body id="top">

<!-- header -->
<header class="s-header">
    <div class="nav-menu">
        <div class="nav-menu-content">
            <div class="logo">
                <a class="logo-link" href="/">
                    <img alt="Homepage" src="images/logo.jpeg" >

                </a>
            </div>
            <div class="navigation">
                <ul class="navigation_list">
                    <li class="dropdown"><a class="" href="home.php" title="about">Home</a>
                    <li class="dropdown"><a href="do.html">Program</a></li>
                    <li class="dropdown"><a href="story.html">Success Stories</a></li>
                    <li class="dropdown"><a href="community.php">Community</a></li>
                    <li class="dropdown"><a href="blog.php">News</a></li>
                    <li class="dropdown"><a class="" href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>

    <a class="nav-menu-toggle" href="#0" id="nav-menu-toggle">
        <span class="header-menu-text">Menu</span>
        <span class="header-menu-icon"></span>
    </a>
</header> <!-- end s-header -->

<!-- home -->
<section class="s-home target-section" data-image-src="images/hero2.png" data-natural-height=2000
    data-natural-width=3000 data-parallax="scroll" data-position-y=center id="home">
    <div class="overlay"></div>
    <div class="shadow-overlay"></div>
    <video autoplay loop muted playsinline>
        <source src="images/hero.mp4" type="video/mp4">
    </video>
    <div class="home-content">
        <div class="row home-content__main">
            <h3></h3>
            <h1>
                "HUB OF HUBS"
            </h1>
           
        </div>
        <div class="home-content__scroll">
           
    </div> <!-- end home-content -->

</section> <!-- end s-home -->



<!-- about -->
<section class="s-about" id='about'>
    <div class="row section-header has-bottom-sep" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead subhead--dark">About Us</h3>
            <h1 class="display-1 display-1--light">We Are BuniHub</h1>
        </div>
    </div> <!-- end section-header -->

    <div class="row about-desc" data-aos="fade-up">
        <div class="col-full">
            <p>
                Buni Innovation Hub is the first Innovation Space established in Tanzania under the Commission for Science and Technology <strong>(COSTECH)</strong>, Buni is primarily focused on strengthening the innovation ecosystem through coordination and support to the innovation enablers (innovation spaces) and startups. 
 Buni has been a home to over 10000 youth and 20+ innovation spaces that has been the beneficiary of the innovation services offered by Buni Hub. Since it Started, Buni has swayed the vibrant innovation ecosystem that resulted in the growth of innovation spaces and startups companies in Tanzania.

            </p>
        </div>
    </div> <!-- end about-desc -->

    <div class="row about-stats stats block-1-4 block-m-1-2 block-mob-full" data-aos="fade-up">

    <div class="about__line"></div>

</section> <!-- end s-about -->
<section class="s-services" id="services">
<div class="row section-header has-bottom-sep" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead">What's happening</h3>
            <h1 class="display-2">Buni Hub</h1>
        </div>
    </div> <!-- end section-header -->
<div id="carouselExampleControls" class="carousel">
        <div class="carousel-inner">

            <?php
                $host = "localhost";
                $username = "root";
                $password = "";
                $db = "upload";
                $port = 3306;

                // Create database connection
                $conn = new mysqli($host, $username, $password, $db, $port);
                if ($conn->connect_error) {
                    die("Connection failed: ". $conn->connect_error);
                }

                $sql = "SELECT * FROM `happen` ORDER BY `id` DESC";
                $result = $conn->query($sql);
                $activeClass = 'active';

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {?>
        <div class="carousel-item <?php echo $activeClass;?>">
          <div class="card">
            <div style="width: auto; height: 300px;">
            <img src="./images/<?php echo $row['photo'];?>" style="width: 100%; height: 100%;" alt="">

            </div>
            <div class="card-body">
            <h5><?php echo $row['title'];?><br /><span> Program Member </span></h5>
            <p class="card-text">“ <?php echo $row['description'];?> ”</p>
              <a  href="<?php echo $row['link'];?>" class="btn btn-primary">Read more</a>
            </div>
          </div>
        </div>
                    
                        <?php
                        $activeClass = '';
                    }
                } else {
                    echo "NO ITEMS UPLOADED";
                }

                $conn->close();
           ?>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

    </div>
</section>


<!-- services -->
<section class="s-services" id='services'>
    <div class="row section-header has-bottom-sep" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead">What We Do</h3>
            <h1 class="display-2">Buni Hub</h1>
        </div>
    </div> <!-- end section-header -->

    <div class="row services-list block-1-3 block-tab-full">
        <div class="col-block service-item" data-aos="fade-up">
            <img class="blog-article-thumb" src="images/blog2.jpg">
            <div class="service-text">
                <a href="#">
                    <h3 class="h2">capacity building to new innovation Space</h3>
                </a>
                <p>
                    This program focuses
on supporting institutions to establish their innovation space.
This is a tailor-made program that helps the institutions to
understand the “Best Practices” on how to establish innovation
space.<br>
                    <a href="#" style="color: 
#e7bb2a"><b>Read More</b></a>
                </p>
            </div>
        </div>

        <div class="col-block service-item" data-aos="fade-up">
            <img class="blog-article-thumb" src="images/blog1.jpg">
            <div class="service-text">
                <a href="#">
                    <h3 class="h2">Mentorship to Existing Innovation Spaces</h3>
                </a>
                <p>
                    The program supports the existing
spaces through mentorship. The support is tailored according to the
needs of the Hub in question.<br>
                    <a href="#" style="color: 
#e7bb2a"><b>Read More</b></a>
                </p>
            </div>
        </div>

        <div class="col-block service-item" data-aos="fade-up">
            <img class="blog-article-thumb" src="images/blog3.jpg">
            <div class="service-text">
                <a href="#">
                    <h3 class="h2">Buni Talent Pool program</h3>
                </a>
                <p>
                    The program focuses on building talents
with brilliant ideas that can have an impact on the community and
can be useful to help companies to accelerate the work they do.<br>
                    <a href="#" style="color: 
#e7bb2a"><b>Read More</b></a>
                </p>
            </div>
        </div>

        <div class="col-block service-item" data-aos="fade-up">
            <img class="blog-article-thumb" src="images/blog3.jpg">
            <div class="service-text">
                <a href="#">
                    <h3 class="h2">Buni Divaz Program</h3>
                </a>
                <p>
                    This program is designed to increase women
involvement in Technology, Innovation and Entrepreneurship. It
also aspires to encourage a safe space for women participation in the
Innovation Ecosystem. <br>
                    <a href="#" style="color: 
#e7bb2a"><b>Read More</b></a>
                </p>
            </div>
        </div>

       
     <div class="col-block service-item" data-aos="fade-up">
            <img class="blog-article-thumb" src="images/blog3.jpg">
            <div class="service-text">
                <a href="#">
                    <h3 class="h2">Linkages and Networking </h3>
                </a>
                <p>
                    This program link and introduce our
beneficiaries with potential stakeholders and government
locally and international level.<br>
                    <a href="#" style="color: 
#e7bb2a"><b>Read More</b></a>
                </p>
            </div>
        </div> 
    </div> <!-- end services-list -->

</section> <!-- end s-services -->



<section class="s-about" id='covid19'>
    <div class="row section-header has-bottom-sep" data-aos="fade-up">
        <div class="col-full">
            <h1 class="display-2 display-2--light">Success Stories</h1>
        </div>
    </div>
    <div class="row block-1-2 block-m-1-1" data-aos="fade-up">
        <div class="col-block">
            <p class="covid19-desc">
                <br> Over 100,000 youths impacted by the Buni Hub Programs </br>

<br>More than 50+ local and international partnerships developed and
had a direct impact to the Buni beneficiaries</br> 

<br>More that 25 + innovation spaces established in different regions
in Tanzania.</br>

<br><span style="color: #111;">#BuniinnovationHub</span> mother of all hubs.<br><br>
                <a href="/growthinthecrisis" class="#" target="_blank">Learn More</a>
                </br>
            </p>
        </div>
        <div class="col-block">
            <img src="images/blog1.jpg" style="width: 100%" />
        </div>
    </div> <!-- end about-stats -->
</section> 



<section>
<div class="gtco-testimonials">
    <h2>Testimonials</h2>
    <div class="owl-carousel owl-carousel1 owl-theme">
        <div>
            
            <div class="card text-center">
                <br>
                <img class="card-img-top" style="width: 50%; height: 50%;" src="https://images.unsplash.com/photo-1572561300743-2dd367ed0c9a?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=300&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=300" alt="">
                <div class="card-body">
                    <h5>Mgasa Lucas<br /><span> BuniHub Member </span></h5>
                    <p class="card-text">“ Thank for bunihub help me to create my prototype and moving fowardng for more collaboration ” </p>
                </div>
            </div>
        </div>
    
        <div>

            <div class="card text-center">
            <br>
                <img class="card-img-top"style="width: 50%; height: 50%;" src="https://images.unsplash.com/photo-1588361035994-295e21daa761?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=301" alt="">
                <div class="card-body">
                    <h5>Elias Malema<br /><span> BuniHub Member </span></h5>
                    <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat ” </p>
                </div>
            </div>
        </div>
        <div>
       

            <div class="card text-center">
            <br>
                <img class="card-img-top"style="width: 50%; height: 50%;" src="https://images.unsplash.com/photo-1575377222312-dd1a63a51638?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=302&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=302" alt="">
                <div class="card-body">
                    <h5>Michael <br /><span> BuniHub Member </span></h5>
                    <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat ” </p>
                </div>
            </div>
        </div>
      
            <div class="card text-center">
            <br>
                <img class="card-img-top"style="width: 50%; height: 50%;" src="https://images.unsplash.com/photo-1549836938-d278c5d46d20?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=303" alt="">
                <div class="card-body">
                    <h5>Bernadetha Kweka<br /><span> BuniHub Member </span></h5>
                    <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat ” </p>
                </div>
            </div>
        </div>
 


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


    
</section>

<section class="s-clients" id="clients">
    <div class="row section-header" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead">Our Partiners</h3>
            <h1 class="display-2">We are honored to have worked with</h1>
        </div>
    </div>

    <div class="row clients-outer item-center justify-content-center" data-aos="">
        <div class="col-full">
            <div class="clients">
                <a class="clients__slide" href="#0" title=""><img src="images/sweden.png" class="object-fit" /></a>
                <a class="clients__slide" href="#0" title=""><img src="images/andelllla.png" class="object-fit"/></a>
                <a class="clients__slide" href="#0" title=""><img src="images/google.png"  class="object-fit" /></a>
                <a class="clients__slide" href="#0" title=""><img src="images/download.png" class="object-fit" /></a>
                <a class="clients__slide" href="#0" title=""><img src="images/siili.png"class="object-fit" /></a>
                <a class="clients__slide" href="#0" title=""><img src="images/eu project.png" class="object-fit" /></a>
                <a class="clients__slide" href="#0" title=""><img src="images/eu pic.png" class="object-fit" /></a>
                <a class="clients__slide" href="#0" title=""><img src="images/afrilab.jfif" class="object-fit"/></a>
                <a class="clients__slide" href="#0" title=""><img src="images/atbn.jfif" class="object-fit"/></a>
                <a class="clients__slide" href="#0" title=""><img src="images/itc.jfif" class="object-fit" /></a>
                <a class="clients__slide" href="#0" title=""><img src="images/finland.png" class="object-fit" /></a>
                <a class="clients__slide" href="#0" title=""><img src="images/hapoa.jfif" class="object-fit" /></a>
                <a class="clients__slide" href="#0" title=""><img src="images/dpixel.png" class="object-fit" /></a>
                <a class="clients__slide" href="#0" title=""><img src="images/stimul.png" class="object-fit" /></a>
                <a class="clients__slide" href="#0" title=""><img src="images/porto.png" class="object-fit" /></a>
                <a class="clients__slide" href="#0" title=""><img src="images/eu.png" class="object-fit" /></a>
            </div> 
        </div> 
    </div>
</div>
</div>
</section>


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
            </p>
        </div>

        <div class="col-six tab-full right footer-subscribe">
            <h4>Get Notified</h4>
            <p>Keep Up With Our Works. Subscribe To Our Newsletter and Receive Updates.</p>
            <div class="subscribe-form">
                <form class="group" id="mc-form">
                    <input class="email" id="mc-email" name="email" placeholder="Email Address" required="" type="email"
                        value="">
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
                <a class="smoothscroll" href="#top" title="Back to Top"><i aria-hidden="true"
                        class="icon-arrow-up"></i></a>
            </div>
        </div>
    </div> <!-- end footer-bottom -->
</footer> <!-- end footer -->

<!-- preloader -->


<!-- Java Script -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script
      src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script src="index.js"></script>
<!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        var lazyloadImages = document.querySelectorAll("img.lazy");
        var lazyloadThrottleTimeout;

        function lazyload() {
            if (lazyloadThrottleTimeout) {
                clearTimeout(lazyloadThrottleTimeout);
            }

            lazyloadThrottleTimeout = setTimeout(function () {
                var scrollTop = window.pageYOffset;
                lazyloadImages.forEach(function (img) {
                    if (img.offsetTop < (window.innerHeight + scrollTop)) {
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                    }
                });
                if (lazyloadImages.length == 0) {
                    document.removeEventListener("scroll", lazyload);
                    window.removeEventListener("resize", lazyload);
                    window.removeEventListener("orientationChange", lazyload);
                }
            }, 20);
        }

        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);
    });

</script> -->
<script>
  if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll('img[loading="lazy"]');
    images.forEach(img => {
      img.src = img.dataset.src;
    });
  } else {
    // Dynamically import the LazySizes library
    const script = document.createElement('script');
    script.src =
      '/js/lazysizes.min.js';
    document.body.appendChild(script);
  }
</script>


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
</html>
