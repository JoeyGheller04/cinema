<?php
session_start();

if($_POST){

    switch($_POST["btn"]){
        case "login":
            header("location: ../backend/handler/login_handler.php");
            break;
        
        case "register":

            break;

        default:
            break;
    }
}

//header('location: ../frontend/index.html');