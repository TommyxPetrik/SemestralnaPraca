<?php
require_once 'config.php';
session_start();


try {
    if (isset($_REQUEST['password']) && isset($_REQUEST['email'])) {
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $conn = new PDO("mysql:host=$servername;dbname=$database", $usernamedb, $passworddb);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM customers");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_OBJ);
        while ($row = $stmt->fetch()) {
            if (password_verify($password, $row->password) && $row->email == $email) {
                echo 'login ';
                echo $email;
                $_SESSION['email'] = $email;
                $_SESSION['userdata'] = [
                    'name'=> $row->name,
                    'email'=> $row->email,
                    'trial'=> $row->trial,
                    'plan'=> $row->plan,
                    'country'=> $row->country,
                    'user_index'=> $row->user_index
                ];
                header('Location: ../index.php');
            } else {
                echo "wrong email or password";
                header('refresh:2; ../login.php');
            }
        }
    }
    else {
        header('Location:  http://localhost:8080');
    }

} catch (PDOException $e) {
    echo "Chyba" . $e->getMessage();
}
