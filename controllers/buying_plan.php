<?php

require_once 'config.php';
session_start();
if (isset($_SESSION['userdata'])){
    $userdata = $_SESSION['userdata'];
    $cardnumber = $_REQUEST['cardnumber'];
    $exp_date = $_REQUEST['exp_date'];
    $cvc = $_REQUEST['cvc'];
    $id = $userdata['user_index'];
    $choice = $_REQUEST['choice'];
    $trial=0;
    if ($choice>1){
        $trial= 0;
    }else{
        $trial=1;
    }
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
        if ($id == $row->user_index ) {
        }

    }
    $sql = 'UPDATE customers SET  trial=:trial, plan=:plan where user_index=:user_index';
    $stm = $conn->prepare($sql);

    $stm->bindParam(":trial",$trial);
    $stm->bindParam(":plan",$choice);
    $stm->bindParam(":user_index",$id);

    $stm->execute();

    header("Location: ../bought_plan.php");

}catch (PDOException $exception){
    $con = null;
    die($exception->getMessage());
}

$con = null;