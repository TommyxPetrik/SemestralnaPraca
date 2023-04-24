<?php

require_once 'config.php';

require_once 'controllers/list_reviews_id.php';
if (isset($_SESSION['reviewids'])){
    $reviewids = $_SESSION['reviewids'];
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $usernamedb, $passworddb);
    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $stmt = $conn->prepare("SELECT * FROM reviews");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_OBJ);
    while ($row = $stmt->fetch()) {
        if (isset($reviewids[0])){
            if ($row->review_index == $reviewids[0]){
                echo '<div class="col-md-4">
                <div class="testmonial">
                    <p class="description"><i>'. $row->msg .'</i></p>
                    <div class="media">
                        <img class="mr-3" src="assets/imgs/avatar1.jpg" width="60" alt="Generic placeholder image">
                        <div class="media-body">
                            <h6 class="title">'. $row->name .'</h6>
                            <p class="text-muted">Web designer</p>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }
        if (isset($reviewids[1])){
            if ($row->review_index == $reviewids[1] && $row->review_index != $reviewids[0]){
                echo '<div class="col-md-4">
                <div class="testmonial">
                    <p class="description"><i>'. $row->msg .'</i></p>
                    <div class="media">
                        <img class="mr-3" src="assets/imgs/avatar2.jpg" width="60" alt="Generic placeholder image">
                        <div class="media-body">
                            <h6 class="title">'. $row->name .'</h6>
                            <p class="text-muted">Freelancer</p>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }
        if (isset($reviewids[2])){
            if ($row->review_index == $reviewids[2] && $row->review_index != $reviewids[0] && $row->review_index != $reviewids[1]){
                echo '<div class="col-md-4">
                <div class="testmonial">
                    <p class="description"><i>'. $row->msg .'</i></p>
                    <div class="media">
                        <img class="mr-3" src="assets/imgs/avatar3.jpg" width="60" alt="Generic placeholder image">
                        <div class="media-body">
                            <h6 class="title">'. $row->name .'</h6>
                            <p class="text-muted">Graphic Designer</p>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }
        if (isset($reviewids[3])){
            if ($row->review_index == $reviewids[3] && $row->review_index != $reviewids[0] && $row->review_index != $reviewids[1] && $row->review_index != $reviewids[2]){
                echo '<div class="col-md-4">
                <div class="testmonial">
                    <p class="description"><i>'. $row->msg .'</i></p>
                    <div class="media">
                        <img class="mr-3" src="assets/imgs/avatar3.jpg" width="60" alt="Generic placeholder image">
                        <div class="media-body">
                            <h6 class="title">'. $row->name .'</h6>
                            <p class="text-muted">Graphic Designer</p>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }
        if (isset($reviewids[4])){
            if ($row->review_index == $reviewids[4] && $row->review_index != $reviewids[0] && $row->review_index != $reviewids[1] && $row->review_index != $reviewids[2] && $row->review_index != $reviewids[3]){
                echo '<div class="col-md-4">
                <div class="testmonial">
                    <p class="description"><i>'. $row->msg .'</i></p>
                    <div class="media">
                        <img class="mr-3" src="assets/imgs/avatar3.jpg" width="60" alt="Generic placeholder image">
                        <div class="media-body">
                            <h6 class="title">'. $row->name .'</h6>
                            <p class="text-muted">Graphic Designer</p>
                        </div>
                    </div>
                </div>
            </div>';
            }
        }




    }
}catch (PDOException $exception) {
    $con = null;
    die($exception->getMessage());
}

$con = null;
