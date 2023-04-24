<?php

require_once 'config.php';

$name = $_REQUEST['name'];
$email  = $_REQUEST['email'];
$msg = $_REQUEST['msg'];

try {
    $con = new PDO("mysql:host=$servername;dbname=$database", $usernamedb, $passworddb);
    $con->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $stmt = $con->prepare("SELECT * FROM reviews");
    $stmt->execute();


    $stmt->setFetchMode(PDO::FETCH_OBJ);

    $sql = 'INSERT INTO reviews (name, email, msg)
                VALUES (:name, :email, :msg)';

    $stm = $con->prepare($sql);

    $stm->bindParam(":name", $name);
    $stm->bindParam(":email", $email);
    $stm->bindParam(":msg", $msg);

    $stm->execute();

    header("Location: ../index.php#review");

} catch (PDOException $exception) {
    $con = null;
    die($exception->getMessage());
}

$con = null;
