<?php
session_start();

if(!isset($_SESSION["film"])){
    $_SESSION["film"] = $_POST["film"];

    $responseData = [
        "success" => true,
        "msg" => "yes"
    ];
}
else{
    $responseData = [
        "success" => false,
        "msg" => "no"
    ];
}
header('Content-Type: application/json');
echo json_encode($responseData);