<?php
session_start();

$data = array(
    "nome" =>  $_POST["nome"],
    "cognome" =>  $_POST["cognome"],
    "email" =>  $_POST["email"],
    "password" =>  $_POST["password"]
);

$user = new Utente();
$res = $user->create($data);

if($res == true){

    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"] = $_POST["password"];
    header('location: ../frontend/second.php');
}

header('location: ../frontend/index.php');