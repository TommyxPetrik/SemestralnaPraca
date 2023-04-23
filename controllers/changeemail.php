<?php

require_once 'config.php';
session_start();
if (isset($_SESSION['userdata'])){
    $userdata = $_SESSION['userdata'];
    $name = $userdata['name'];
    $oldemail = $_REQUEST["oldemail"];
    $newemail = $_REQUEST["newemail"];
    $password = password_hash($_REQUEST["password"],PASSWORD_ARGON2ID);
    $country = $userdata['country'];
    $trial = $userdata['trial'];
    $plan = $userdata['plan'];
    $user_index = $userdata['user_index'];
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
        if (password_verify($password, $row->password) && $row->email == $oldemail ) {
            $_SESSION['userdata'] = [
                'name'=> $row->name,
                'email'=> $row->email,
                'trial'=> $row->trial,
                'plan'=> $row->plan,
                'country'=> $row->country,
                'user_index' => $row->user_index
            ];
        }

    }

    $sql = 'UPDATE customers SET name=:name, email=:email, password=:password, country=:country, trial=:trial, plan=:plan where user_index=:user_index';
    $stm = $conn->prepare($sql);

    $stm->bindParam(":name", $userdata['name']);
    $stm->bindParam(":email",$newemail);
    $stm->bindParam(":password",$password);
    $stm->bindParam(":country",$userdata['country']);
    $stm->bindParam(":trial",$userdata['trial']);
    $stm->bindParam(":plan",$userdata['plan']);
    $stm->bindParam(":user_index",$user_index);

    $stm->execute();

    header("Location: ../view/profile.php");

}catch (PDOException $exception){
    $con = null;
    die($exception->getMessage());
}

$con = null;