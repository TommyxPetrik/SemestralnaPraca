<?php

require_once 'config.php';

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
        if ($row->review_index == 1){
            $_SESSION['review1'] = [
                'name' => $row->name,
                'msg' => $row->msg,
            ];
        }
        if ($row->review_index == 2){
            $_SESSION['review2'] = [
                'name' => $row->name,
                'rmsg' => $row->msg,
            ];
        }
        if ($row->review_index == 3){
            $_SESSION['review3'] = [
                'name' => $row->name,
                'msg' => $row->msg,
            ];
        }
        if ($row->review_index == 4){
            $_SESSION['review4'] = [
                'name' => $row->name,
                'msg' => $row->msg,
            ];
        }


        header("Location: ../index.php");

    }
}catch (PDOException $exception) {
    $con = null;
    die($exception->getMessage());
}

$con = null;