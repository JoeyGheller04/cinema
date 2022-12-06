<?php
session_start();

require("../backend/login/Utente.php");

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
    header('location: ../backend/second.php');
}

header('location: ../backend/index.php');