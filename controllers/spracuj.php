<?php

require_once 'config.php';

$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$password = password_hash($_REQUEST["password"],PASSWORD_ARGON2ID);
$country = $_REQUEST["country"];
$trial = true;



try {
    $con = new PDO("mysql:host=$servername;dbname=$database", $usernamedb, $passworddb);
    $con->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $sql = 'INSERT INTO customers (name, email, password, country, trial)
                VALUES (:name, :email, :password, :country, :trial)';

    $stm = $con->prepare($sql);

    $stm->bindParam(":name",$name);
    $stm->bindParam(":email",$email);
    $stm->bindParam(":password",$password);
    $stm->bindParam(":country",$country);
    $stm->bindParam(":trial",$trial);

    $stm->execute();

    header("Location: http://localhost:8080/registered.php");

    //echo "Successfully registered!";
    //session_start();

}catch (PDOException $exception){
    $con = null;
    die($exception->getMessage());
}

$con = null;