<?php
session_start();
$userdata = $_SESSION['userdata'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Rubic landing page.">
    <meta name="author" content="Devcrud">
    <title>Rubic</title>
    <link rel="stylesheet" href="../assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/rubic.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

<nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top" data-spy="affix"
     data-offset-top="20" style="background-color: black">
    <div class="container">
        <a class="navbar-brand" onclick="location.href='../index.php'"><strong class="text-primary">RU</strong><span
                class="text-light">BIC</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" onclick="location.href='../index.php#features'" >Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="location.href='../index.php#about'">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="location.href='../index.php#pricing'">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="location.href= '../index.php#review'">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="location.href='../index.php#contact'">Contact</a>
                </li>
                <?php if (!$userdata) {
                    echo '<li class="nav-item">
                    <a class="nav-link btn btn-primary text-dark shadow-none ml-md-4"
                      href="login.php">Sign in</a>
                </li>';
                }else{
                    echo '<li class="nav-item">
                    <a class="nav-link btn btn-primary text-dark shadow-none ml-md-4"
                      href="../controllers/logout.php">Sign out</a>
                </li>';
                }
                ?>
                <?php if ($userdata){
                    echo '<li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>';
                }
                ?>
                <?php if ($userdata){
                    if ($userdata['trial'] == 99){
                        echo '<li class="nav-item">
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<section class="section" id="pricing">
    <div class="container text-center">
        <h6 class="display-4 has-line">CONGRATULATIONS</h6>
        <p class="mb-5 pb-4">Now you own your very own server where you can host your website.</p>
        <div class="footer">
            <button class="btn btn-primary btn" style="width: 300px" onclick="location.href='../index.php'">Continue</button>
        </div>
    </div>
</section>
<script src="../assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="../assets/vendors/bootstrap/bootstrap.bundle.js"></script>
<script src="../assets/vendors/bootstrap/bootstrap.affix.js"></script>
<script src="../assets/js/rubic.js"></script>
<script type="text/javascript" src="../validators/validate.js"></script>
</body>
</html>
