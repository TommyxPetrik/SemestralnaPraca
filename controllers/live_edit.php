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

        $input = filter_input_array(INPUT_POST);
        if ($input['action'] == 'edit') {
            $update_field='';
            if(isset($input['name'])) {
                $update_field.= "name='".$input['name']."'";
            } else if(isset($input['gender'])) {
                $update_field.= "gender='".$input['gender']."'";
            } else if(isset($input['address'])) {
                $update_field.= "address='".$input['address']."'";
            } else if(isset($input['age'])) {
                $update_field.= "age='".$input['age']."'";
            } else if(isset($input['designation'])) {
                $update_field.= "designation='".$input['designation']."'";
            }
            if($update_field && $input['id']) {
                $sql_query = "UPDATE developers SET $update_field WHERE id='" . $input['id'] . "'";
                mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
            }
}
    }
    else {
        header('Location:  http://localhost:8080');
    }

} catch (PDOException $e) {
    echo "Chyba" . $e->getMessage();
}