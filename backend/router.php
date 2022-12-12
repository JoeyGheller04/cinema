<?php
session_start();

if($_POST){

    switch($_POST["btn"]){
        case "login":
            $_SESSION["logged"] = false;
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["password"] = $_POST["password"];
            header("location: ../backend/login/login_handler.php");
            break;
        
        case "register":
            $_SESSION["logged"] = false;
            $_SESSION["nome"] = $_POST["nome"];
            $_SESSION["cognome"] = $_POST["cognome"];
            $_SESSION["email"] = $_POST["email_registrazione"];
            $_SESSION["password"] = $_POST["password_registrazione"];
            header("location: ..\backend\login/registration_hander.php");
            break;

        case "get_film":

            header("location: ..\backend\prenotation/get_film.php");
            break;

        default:
            break;
    }
}

//header('location: ../frontend/index.html');