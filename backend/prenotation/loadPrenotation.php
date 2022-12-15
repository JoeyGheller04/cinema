<?php
session_start();

require_once('db-config.php');

$conn = connectToDB();

if(isset($_SESSION["film"])){

    $film = $_SESSION["film"];

    $sql = "select * from film where id = '$film'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    if($record != false){
        $responseData = [
            "success" => true,
            "msg" => $record
        ];
        
    }
    else{
        $responseData = [
            "success" => false,
            "msg" => "not found"
        ];
    }
}
else{
    $responseData = [
        "success" => false,
        "msg" => "not found"
    ];
}
header('Content-Type: application/json');
echo json_encode($responseData);