<?php
session_start();
$userdata = $_SESSION['userdata'];
$planinfo = $_SESSION['planinfo'];
$hideID = 0;
//$hide1 = 0;
//$hide2 = 0;
//$hide3 = 0;

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
                            <form action="../controllers/plan_change.php" method="post" class="header-form" name="plan_change" id="plan_change" style="width: 300px">
                                <div class="body">
                                    <div class="head">Name</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name*" value=<?php echo $planinfo['name'];?> name="name" id="name">
                                    </div>
                                    <div class="head">Price</div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Price*" value=<?php echo $planinfo['price'];?> name="price" id="price">
                                    </div>
                                    <div class="head">Space GB</div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Space*" value=<?php echo $planinfo['space'];?> name="space" id="space">
                                    </div>
                                    <div class="head">Bandwidth GB</div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Bandwidth*" value=<?php echo $planinfo['bandwidth'];?> name="bandwidth" id="bandwidth">
                                    </div>
                                    <div class="head">Number of websites</div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Number of websites*" value=<?php echo $planinfo['websites'];?> name="websites" id="websites">
                                    </div>
                                    <div class="head">Customization</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Customization" value=<?php echo $planinfo['customization'];?> name="customization" id="customization">
                                    </div>
                                    <div class="head">Integration</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Integration" value=<?php echo $planinfo['integration'];?> name="integration" id="integration">
                                    </div>
                                    <div class="head">Support</div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Support" value=<?php echo $planinfo['support'];?> name="support" id="support">
                                    </div>
                                </div>
                        </div>
                        <div class="footer">
                            <button class="btn btn-primary btn-block" style="width: 300px">Change</button>
                        </div>
                        </form>
                        <p>

                        </p>
                        <form action="../controllers/plan_delete.php" method="post" class="header-form" name="user-del" id="user-del" style="width: 300px">
                            <div class="head">Delete <span class="text-primary">plan</span> by ID.</div>
                            <div class="body">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="ID." value=<?php echo $planinfo['plan_index'];?> name="plan_index" id="plan_index">
                                </div>
                            </div>
                            <div class="footer">
                                <button class="btn btn-primary btn-block">Delete</button>
                            </div>
                        </form>
                        <p>

                        </p>
<!--                        <div class="footer">-->
<!--                            <button class="btn btn-primary btn-block" style="width: 300px">Hide / Show</button>-->
<!--                        </div>-->
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
<script src="../assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="../assets/vendors/bootstrap/bootstrap.bundle.js"></script>
<script src="../assets/vendors/bootstrap/bootstrap.affix.js"></script>
<script src="../assets/js/rubic.js"></script>
</body>
</html>