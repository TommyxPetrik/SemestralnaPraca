<?php
require_once 'config.php';
session_start();
$id = $_REQUEST['plan_index'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $usernamedb, $passworddb);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM plans");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_OBJ);
    while ($row = $stmt->fetch()) {
        if ($id == $row->plan_index) {
            $_SESSION['planinfo'] = [
                'plan_index'=> $row->plan_index,
                'name'=> $row->name,
                'price'=> $row->price,
                'space'=> $row->space,
                'bandwidth'=> $row->bandwidth,
                'websites'=> $row->websites,
                'customization'=> $row->customization,
                'integration' => $row->integration,
                'support' => $row->support,
                'show'=> ''
            ];
            header('Location: ../view/admin_plan_edit.php');
        }
    }

} catch (PDOException $e) {
    echo "Chyba" . $e->getMessage();
}
