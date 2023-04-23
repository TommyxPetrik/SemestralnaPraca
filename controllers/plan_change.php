<?php

require_once 'config.php';
session_start();
if (isset($_SESSION['planinfo'])){
    $planinfo = $_SESSION['planinfo'];
    $name = $_REQUEST['name'];
    $id = $planinfo['plan_index'];
    $price = $_REQUEST['price'];
    $space = $_REQUEST['space'];
    $bandwidth = $_REQUEST['bandwidth'];
    $websites = $_REQUEST['websites'];
    $customization = $_REQUEST['customization'];
    $integration = $_REQUEST['integration'];
    $support = $_REQUEST['support'];


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
        if ($id == $row->plan_index ) {
        }

    }
    $sql = 'UPDATE plans SET name=:name, price=:price, space=:space, bandwidth=:bandwidth, websites=:websites, customization=:customization, integration=:integration, support=:support where plan_index=:plan_index';
    $stm = $conn->prepare($sql);

    $stm->bindParam(":plan_index",$id);
    $stm->bindParam(":name",$name);
    $stm->bindParam(":price",$price);
    $stm->bindParam(":space",$space);
    $stm->bindParam(":bandwidth",$bandwidth);
    $stm->bindParam(":websites",$websites);
    $stm->bindParam(":customization",$customization);
    $stm->bindParam(":integration",$integration);
    $stm->bindParam(":support",$support);

    $stm->execute();

    header("Location: ../view/admin.php");

}catch (PDOException $exception){
    $con = null;
    die($exception->getMessage());
}

$con = null;