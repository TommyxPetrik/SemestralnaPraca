<?php

require_once 'config.php';
session_start();
if (isset($_SESSION['userdata'])){
    $userdata = $_SESSION['userdata'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST["email"];
    $country = $_REQUEST['country'];
    $trial = $_REQUEST['trial'];
    $plan = $_REQUEST['plan'];
    $id = $_REQUEST['user_ID'];
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $usernamedb, $passworddb);
    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $stmt = $conn->prepare("SELECT * FROM customers");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_OBJ);
    while ($row = $stmt->fetch()) {
        if ($id == $userdata['user_index'] ) {
            header("Location: ../admin.php");
        }else{
            $sql = 'DELETE from customers where user_index=:user_index';
            $stm = $conn->prepare($sql);

            $stm->bindParam(":user_index",$id);

            $stm->execute();
        }

    }

    header("Location: ../admin.php");

}catch (PDOException $exception){
    $con = null;
    die($exception->getMessage());
}

$con = null;