<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Successfully registered</title>
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/rubic.css">

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

<nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top" data-spy="affix"
     data-offset-top="20">
    <div class="container">
        <a class="navbar-brand" onclick="location.href='index.php'"><strong class="text-primary">RU</strong><span class="text-light">BIC</span></a>
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
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-dark shadow-none ml-md-4" onclick="location.href='index.php'">Sign up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="header d-flex justify-content-center">
    <div class="container">
        <div class="row h-100 align-items-center">
            <div class="col-md-7">
                <div class="header-content">
                    <h3 class="header-title"><strong class="text-primary">RUBIC</strong></h3>
                    <h4 class="header-subtitle">Creative Mylti-purpose Server Hosting </h4>
                    <p></p>
                    <button class="btn btn-outline-light btn-flat" onclick="location.href='index.php\#features'">More info</button>
                </div>
            </div>
            <div class="col-md-5 d-none d-md-block">
                <form action="controllers/spracuj_login.php" method="post" class="header-form" name="formular_login" id="formular_login">
                    <div class="head">Sign in to <span class="text-primary">your</span> account.</div>
                    <div class="body">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email*" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password*" name="password" id="password">
                        </div>
                    </div>
                    <div class="footer">
                        <button class="btn btn-primary btn-block">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
<script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
<script src="assets/js/rubic.js"></script>
<script  type="text/javascript" src="validators/validate_login.js"></script>
</body>
</html>
