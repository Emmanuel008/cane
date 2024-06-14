<!DOCTYPE html>
<!--[if lt IE 9 ]>
<html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
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
    <link rel="stylesheet" href="/css/buni">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
</head>

<body id="top">

<!-- header -->
<header class="s-header ">
    <div class="nav-menu">
        <div class="nav-menu-content">
            <div class="logo">
                <a class="logo-link" href="/">
                    <img alt="Homepage" src="images/logo.jpeg" >
                </a>
            </div>
            <div class="navigation">
                <ul class="navigation_list">
                    <li class="dropdown"><a class="" href="home.html" title="about">Home</a></li>
                    <li class="dropdown"><a href="community.php">Community</a></li>
                    <li class="dropdown"><a href="blog.php">Programs</a></li>
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

    <div class="home-content">

        <div class="row home-content__main">

            <h3>Welcome </h3>
            <h1>
                <br>Buni Hub Programs</br>
              Different program conducted at Bunihub
            </h1>
        </div>

    </div> <!-- end home-content -->

</section> <!-- end s-home -->

<section class="s-services" id='services'>
    <div class="row section-header has-bottom-sep">
        <div class="col-full">
            <h3 class="subhead">PROGRAMS</h3>
            <h1 class="display-2">BuniHub Programs</h1>
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

                $sql = "SELECT * FROM `blog` ORDER BY `id` DESC";
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
            <p class="card-text">“ <?php echo $row['content'];?> ”</p>
              <a  href="<?php echo $row['readmore'];?>" class="btn btn-primary">Read more</a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/pace.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
    <script src="index.js"></script></body>
</html>
