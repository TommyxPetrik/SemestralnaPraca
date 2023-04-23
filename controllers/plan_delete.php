<?php

require_once 'config.php';
session_start();
if (isset($_SESSION['planinfo'])){
    $planinfo = $_SESSION['planinfo'];
    $id = $_REQUEST['plan_index'];
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
        if ($id == $row->plan_index ){
            $sql = 'DELETE from plans where plan_index=:plan_index';
            $stm = $conn->prepare($sql);

            $stm->bindParam(":plan_index",$id);

            $stm->execute();
        }
        if ($id != $row->user_index ) {
            header("Location: ../admin.php");
        }

    }

    header("Location: ../view/admin.php");

}catch (PDOException $exception){
    $con = null;
    die($exception->getMessage());
}

$con = null;