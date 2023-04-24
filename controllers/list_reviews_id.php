<?php

require_once 'config.php';
$_SESSION['reviewids'] = [];
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
        $_SESSION['reviewids'][] = $row->review_index;
    }
}catch (PDOException $exception) {
    $con = null;
    die($exception->getMessage());
}

$con = null;
