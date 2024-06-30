<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$db = "upload";
$port = 3306;

$conn = new mysqli($host, $username, $password, $db, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email_err = $password_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    }
    
    if (empty($password)) {
        $password_err = "Password is required";
    }

    if (empty($email_err) && empty($password_err)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            header("Location: upload.php");
        } else {
            $login_err = "Invalid email or password";
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-container img {
            display: block;
            margin: 0 auto 20px; 
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/vendor.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="index.css"/>
</head>
<body>
<header class="s-header">
    <div class="nav-menu">
        <div class="nav-menu-content">
            <div class="logo">
                <a class="logo-link" href="/">
                    <img alt="Homepage" src="images/buni logo.png">
                </a>
            </div>
            <div class="navigation">
                <ul class="navigation_list">
                    <li class="dropdown"><a class="" href="index.php" title="about">Home</a>
                    <li class="dropdown"><a href="do.html">Program</a></li>
                    <li class="dropdown"><a href="story.html">Success Stories</a></li>
                    <li class="dropdown"><a href="community.php">Community</a></li>
                    <li class="dropdown"><a href="blog.php">News</a></li>
                    <li class="dropdown"><a class="" href="contact.html">Contact</a></li>
                    <li class="dropdown"><a class="" href="login.php">Staff Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <a class="nav-menu-toggle" href="#0" id="nav-menu-toggle">
        <span class="header-menu-text">Menu</span>
        <span class="header-menu-icon"></span>
    </a>
</header>
<div class="login-container">
    
<img alt="Homepage" src="images/buni logo.png" style="height: 50px;width: 70px;">

    <?php if (!empty($login_err)): ?>
        <div class="alert alert-danger"><?php echo $login_err; ?></div>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" novalidate>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control <?php echo !empty($email_err) ? 'is-invalid' : ''; ?>" id="email" name="email" required>
            <div class="invalid-feedback"><?php echo $email_err; ?></div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control <?php echo !empty($password_err) ? 'is-invalid' : ''; ?>" id="password" name="password" required>
            <div class="invalid-feedback"><?php echo $password_err; ?></div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>


<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script>
    (function() {
        'use strict';
        var forms = document.querySelectorAll('form[novalidate]');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
    window.history.pushState(null, "", window.location.href);        
    window.onpopstate = function() {
        window.history.pushState(null, "", window.location.href);
    };
</script>
</body>
</html>
