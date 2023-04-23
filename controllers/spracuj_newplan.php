<?php

require_once 'config.php';

$name = $_REQUEST["name"];
$price = $_REQUEST['price'];
$space = $_REQUEST['space'];
$bandwidth = $_REQUEST['bandwidth'];
$websites = $_REQUEST['websites'];
$customization = $_REQUEST['customization'];
$integration = $_REQUEST['integration'];
$support = $_REQUEST['support'];


try {
    $con = new PDO("mysql:host=$servername;dbname=$database", $usernamedb, $passworddb);
    $con->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $stmt = $con->prepare("SELECT * FROM plans");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_OBJ);

    while ($row = $stmt->fetch()){
        if ($name == $row->name){
            echo 'Plan already exist';
            header('refresh:2; ..index.php');
        }
    }

    $sql = 'INSERT INTO plans (name, price, space, bandwidth, websites, customization, integration, support)
                VALUES (:name, :price, :space, :bandwidth, :websites, :customization, :integration, :support)';

    $stm = $con->prepare($sql);

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

    //echo "Successfully registered!";
    //session_start();

}catch (PDOException $exception){
    $con = null;
    die($exception->getMessage());
}

$con = null;