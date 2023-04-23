<?php
require_once 'config.php';
session_start();
$id = $_REQUEST['user_index'];

try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $usernamedb, $passworddb);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM customers");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_OBJ);
        while ($row = $stmt->fetch()) {
            if ($id == $row->user_index) {
                $_SESSION['userinfo'] = [
                    'name'=> $row->name,
                    'email'=> $row->email,
                    'trial'=> $row->trial,
                    'plan'=> $row->plan,
                    'country'=> $row->country,
                    'user_index'=> $row->user_index
                ];
                header('Location: ../view/admin_edit.php');
            }
        }

} catch (PDOException $e) {
    echo "Chyba" . $e->getMessage();
}
