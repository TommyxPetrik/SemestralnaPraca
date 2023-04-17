<?php
session_start();
$userdata = $_SESSION['userdata'];
$choice = $_REQUEST['choice'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Rubic landing page.">
    <meta name="author" content="Devcrud">
    <title>Rubic</title>
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/rubic.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

<nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top" data-spy="affix"
     data-offset-top="20" style="background-color: black">
    <div class="container">
        <a class="navbar-brand" onclick="location.href='index.php'"><strong class="text-primary">RU</strong><span
                class="text-light">BIC</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" onclick="location.href='index.php#features'" >Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="location.href='index.php#about'">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="location.href='index.php#pricing'">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="location.href= 'index.php#review'">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="location.href='index.php#contact'">Contact</a>
                </li>
                <?php if (!$userdata) {
                    echo '<li class="nav-item">
                    <a class="nav-link btn btn-primary text-dark shadow-none ml-md-4"
                      href="login.php">Sign in</a>
                </li>';
                }else{
                    echo '<li class="nav-item">
                    <a class="nav-link btn btn-primary text-dark shadow-none ml-md-4"
                      href="controllers/logout.php">Sign out</a>
                </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<section class="section" id="pricing">
    <div class="container text-center">
        <h6 class="display-4 has-line">PLANS</h6>
        <p class="mb-5 pb-4">Server hosting plan for your own Website.</p>
        <?php if (!$userdata){
            echo '<h6 class="display-4 justify-content-center">YOU HAVE TO SIGN IN IN ORDER TO CONTINUE</h6>';
            echo '<li class="nav-item">
                    <a class="nav-link btn btn-primary text-dark shadow-none ml-md-4"
                      href="login.php">Sign in</a>
                </li>';
        }
        ?>
        <div class="row pt-5">
            <?php if ($userdata){
                if ($choice == 1){
                    echo '<div class="col-lg-4">
                <a href="javascript:void(0)" class="pricing-card">
                    <div class="head">Basic</div>
                    <div class="body">
                        <h1><small>$</small>0</h1>
                        <p>Free for Life</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">1 GB OF SPACE</li>
                        <li class="list-group-item">10 GB OF BANDWIDTH</li>
                        <li class="list-group-item">3 WEBSITES</li>
                        <li class="list-group-item">BASIC CUSTOMIZATION</li>
                        <li class="list-group-item">WORDPRESS INTEGRATION</li>
                        <li class="list-group-item">EMAIL SUPPORT</li>
                    </ul>
                </a>
            </div>';
                }

                if ($choice == 2){
                    echo '<div class="col-lg-4">
                <a href="javascript:void(0)" class="pricing-card popular">
                    <div class="head">Professional</div>
                    <div class="body">
                        <h1><small>$</small>14.99</h1>
                        <p>Monthly Payment</p>
                    </div>
                    <div class="popular-item">OUR MOST POPULAR</div>
                    <ul class="list-group">
                        <li class="list-group-item">5 GB OF SPACE</li>
                        <li class="list-group-item">50 GB OF BANDWIDTH</li>
                        <li class="list-group-item">10 WEBSITES</li>
                        <li class="list-group-item">ADVANCED CUSTOMIZATION</li>
                        <li class="list-group-item">WORDPRESS INTEGRATION</li>
                        <li class="list-group-item">EMAIL SUPPORT</li>
                    </ul>
                </a>
            </div>';
                }

                if ($choice == 3){
                    echo '<div class="col-lg-4">
                <a href="javascript:void(0)" class="pricing-card popular">
                    <div class="head">Professional</div>
                    <div class="body">
                        <h1><small>$</small>14.99</h1>
                        <p>Monthly Payment</p>
                    </div>
                    <div class="popular-item">OUR MOST POPULAR</div>
                    <ul class="list-group">
                        <li class="list-group-item">5 GB OF SPACE</li>
                        <li class="list-group-item">50 GB OF BANDWIDTH</li>
                        <li class="list-group-item">10 WEBSITES</li>
                        <li class="list-group-item">ADVANCED CUSTOMIZATION</li>
                        <li class="list-group-item">WORDPRESS INTEGRATION</li>
                        <li class="list-group-item">EMAIL SUPPORT</li>
                    </ul>
                </a>
            </div>';
                }
            }
            ?>
        </div>
    </div>
</section>
<script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
<script src="assets/js/rubic.js"></script>
<script type="text/javascript" src="validators/validate.js"></script>
</body>
</html>
