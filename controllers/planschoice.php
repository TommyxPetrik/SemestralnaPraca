<?php
session_start();
$userdata = '';
if (isset($_SESSION['userdata'])){
    $userdata = $_SESSION['userdata'];
}


