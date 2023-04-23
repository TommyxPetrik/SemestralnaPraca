<?php

require_once 'config.php';
session_start();
if (isset($_SESSION['userdata'])){
    $userdata = $_SESSION['userdata'];
    $name = $userdata['name'];
    $email = $_REQUEST["email"];
    $oldpassword = $_REQUEST['oldpassword'];
    $newpassword = password_hash($_REQUEST["newpassword"],PASSWORD_ARGON2ID);
    $rpassword = $_REQUEST['rpassword'];
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
        if (password_verify($oldpassword, $row->password) && $row->email == $email && $newpassword == $rpassword ) {
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
    $stm->bindParam(":email",$userdata['email']);
    $stm->bindParam(":password",$newpassword);
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