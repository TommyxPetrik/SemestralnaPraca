<?php

require_once 'config.php';
$_SESSION['planids'] = [];
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
        $_SESSION['planids'][] = $row->plan_index;
    }
}catch (PDOException $exception) {
    $con = null;
    die($exception->getMessage());
}

$con = null;
