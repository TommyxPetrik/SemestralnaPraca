<?php
require_once 'config.php';
$users[] = '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $usernamedb, $passworddb);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM customers");
    $stmt->execute();


    $stmt->setFetchMode(PDO::FETCH_OBJ);
    while ($row = $stmt->fetch()) {
        echo "<strong>ID:</strong> ", $row->user_index, "<strong>, Name: </strong>", $row->name, "<strong>, Email: </strong>", $row->email, "<strong>, Country: </strong>", $row->country, "<strong>, Trial: </strong>", $row->trial, "<strong>, Plan: </strong>", $row->plan, "<br>",
        "<br>";

    }

} catch (PDOException $e) {
    echo "Chyba" . $e->getMessage();
}
