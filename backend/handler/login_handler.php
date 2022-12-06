<?php
session_start();

$user = new Utente();
$row = $user->read_single($_POST["email"],$_POST["password"]);

if($row[3] == $_POST["email"] && $row2[4] == $_POST["password"]){

    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"] = $_POST["password"];
    header('location: ../frontend/index.php');
}

header('location: ../frontend/index.php');