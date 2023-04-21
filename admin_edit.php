<?php
session_start();
$userdata = $_SESSION['userdata'];
$id = 0;
$userinfo = $_SESSION['userinfo'];
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
                <?php if ($userdata){
                    echo '<li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<section class="section">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-lg-8">
                <div class="tabs-container">
                    <ul class="nav tab-nav" id="pills-tab">
                        <ul class="nav tab-nav" id="pills-tab">
                            <button class="btn btn-primary" onclick="location.href='admin.php'">Back</button>
                        </ul>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="users">
                                <h4 class="title">Users</h4>
                            <form action="controllers/user_change.php" method="post" class="header-form" name="user_change" id="user_change" style="width: 300px">
                                <div class="head">Change <span class="text-primary">user</span> account information.</div>
                                <div class="body">
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="ID*" value=<?php echo $userinfo['user_index'];?> name="id" id="id">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name*" name="name" id="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email*" name="email" id="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Account state*" name="trial" id="trial">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Plan*" name="plan" id="plan">
                                    </div>
                                    <div class="form-group">
                                        <select type="country" class="form-select" aria-label="Default select example"
                                                name="country" id="country">
                                            <option value="sk">Slovakia</option>
                                            <option value="cz">Czech</option>
                                            <option value="gb">Great Britain</option>
                                            <option value="de">Germany</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <button class="btn btn-primary btn-block" onclick="location.href='controllers/user_change.php'" style="width: 300px">Change</button>
                                </div>
                            </form>
                        <p>

                        </p>
                        <form action="controllers/user_delete.php" method="post" class="header-form" name="user-del" id="user-del" style="width: 300px">
                            <div class="head">Delete <span class="text-primary">user</span> by ID.</div>
                            <div class="body">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="ID." name="user_ID" id="user_ID">
                                </div>
                            </div>
                            <div class="footer">
                                <button class="btn btn-primary btn-block">Delete</button>
                            </div>
                        </form>
                        </div>
                        <div class="tab-pane fade" id="users">
                            <h4 class="title">Users</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
<script src="assets/js/rubic.js"></script>
</body>
</html>