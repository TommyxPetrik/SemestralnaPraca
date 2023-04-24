<?php

require_once 'config.php';

require_once 'controllers/list_plan_id.php';
if (isset($_SESSION['planids'])){
    $plandids = $_SESSION['planids'];
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $usernamedb, $passworddb);
    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $stmt = $conn->prepare("SELECT * FROM plans");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_OBJ);
    while ($row = $stmt->fetch()) {
        if (isset($plandids[0])){
            if ($row->plan_index == $plandids[0]){
                echo '<div class="col-lg-4">
                <a href="view/plans.php?choice=1" class="pricing-card">
                    <div class="head"> '. $row->name .' </div>
                    <div class="body">
                        <h1><small>$</small>'. $row->price .'</h1>
                        <p>Free for Life</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">'. $row->space .' GB OF SPACE</li>
                        <li class="list-group-item">'. $row->bandwidth .' GB OF BANDWIDTH</li>
                        <li class="list-group-item">'. $row->websites .' WEBSITES</li>
                        <li class="list-group-item">'. $row->customization .' CUSTOMIZATION</li>
                        <li class="list-group-item">'. $row->integration .' INTEGRATION</li>
                        <li class="list-group-item">'. $row->support .' SUPPORT</li>
                    </ul>
                </a>
            </div>';
            }
        }
        if (isset($plandids[1])){
            if ($row->plan_index == $plandids[1] && $row->plan_index != $plandids[0]){
                echo '<div class="col-lg-4"">
                <a href="view/plans.php?choice=2" class="pricing-card popular">
                    <div class="head">'. $row->name .'</div>
                    <div class="body">
                        <h1><small>$</small>'. $row->price .'</h1>
                        <p>Monthly Payment</p>
                    </div>
                    <div class="popular-item">OUR MOST POPULAR</div>
                    <ul class="list-group">
                        <li class="list-group-item">'. $row->space .' GB OF SPACE</li>
                        <li class="list-group-item">'. $row->bandwidth .' GB OF BANDWIDTH</li>
                        <li class="list-group-item">'. $row->websites .' WEBSITES</li>
                        <li class="list-group-item">'. $row->customization .' CUSTOMIZATION</li>
                        <li class="list-group-item">'. $row->integration .' INTEGRATION</li>
                        <li class="list-group-item">'. $row->support .' SUPPORT</li>
                    </ul>
                </a>
            </div>';
            }
        }
        if (isset($plandids[2])){
            if ($row->plan_index == $plandids[2] && $row->plan_index != $plandids[0] && $row->plan_index != $plandids[1]){
                echo '<div class="col-lg-4">
                <a href="view/plans.php?choice=3" class="pricing-card">
                    <div class="head">'. $row->name .'</div>
                    <div class="body">
                        <h1><small>$</small>'. $row->price .'</h1>
                        <p>Monthly Payment</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">'. $row->space .' OF SPACE</li>
                        <li class="list-group-item">'. $row->bandwidth .' BANDWIDTH</li>
                        <li class="list-group-item">'. $row->websites .' WEBSITES</li>
                        <li class="list-group-item">'. $row->customization .' CUSTOMIZATION</li>
                        <li class="list-group-item">'. $row->integration .' INTEGRATION</li>
                        <li class="list-group-item">'. $row->support .' SUPPORT</li>
                    </ul>
                </a>
            </div>';
            }
        }
        if (isset($plandids[3])){
            if ($row->plan_index == $plandids[3] && $row->plan_index != $plandids[0] && $row->plan_index != $plandids[1] && $row->plan_index != $plandids[2]){
                echo '<div class="col-lg-4">
                <a href="view/plans.php?choice=3" class="pricing-card">
                    <div class="head">'. $row->name .'</div>
                    <div class="body">
                        <h1><small>$</small>'. $row->price .'</h1>
                        <p>Monthly Payment</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">'. $row->space .' OF SPACE</li>
                        <li class="list-group-item">'. $row->bandwidth .' BANDWIDTH</li>
                        <li class="list-group-item">'. $row->websites .' WEBSITES</li>
                        <li class="list-group-item">'. $row->customization .' CUSTOMIZATION</li>
                        <li class="list-group-item">'. $row->integration .' INTEGRATION</li>
                        <li class="list-group-item">'. $row->support .' SUPPORT</li>
                    </ul>
                </a>
            </div>';
            }
        }
        if (isset($plandids[4])){
            if ($row->plan_index == $plandids[4] && $row->plan_index != $plandids[0] && $row->plan_index != $plandids[1] && $row->plan_index != $plandids[2] && $row->plan_index != $plandids[3]){
                echo '<div class="col-lg-4">
                <a href="view/plans.php?choice=3" class="pricing-card">
                    <div class="head">'. $row->name .'</div>
                    <div class="body">
                        <h1><small>$</small>'. $row->price .'</h1>
                        <p>Monthly Payment</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">'. $row->space .' OF SPACE</li>
                        <li class="list-group-item">'. $row->bandwidth .' BANDWIDTH</li>
                        <li class="list-group-item">'. $row->websites .' WEBSITES</li>
                        <li class="list-group-item">'. $row->customization .' CUSTOMIZATION</li>
                        <li class="list-group-item">'. $row->integration .' INTEGRATION</li>
                        <li class="list-group-item">'. $row->support .' SUPPORT</li>
                    </ul>
                </a>
            </div>';
            }
        }




    }
}catch (PDOException $exception) {
    $con = null;
    die($exception->getMessage());
}

$con = null;
