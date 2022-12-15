<?php
session_start();

require_once('db-config.php');

$conn = connectToDB();


$email = $_POST["email"];
$password = $_POST["password"];

$sql = "select * from users where email = '$email' and password = '$password'";

$stmt = $conn->prepare($sql);
$stmt->execute();

$record = $stmt->fetch(PDO::FETCH_ASSOC);

if($record != false){
    if($record["email"] === $_POST["email"] && $record["password"]  === $_POST["password"]){

        $_SESSION["email"] = $record["email"];
        $_SESSION["logged"] = true;
        $responseData = [
            "success" => true,
            "msg" => "logged"
        ];
    }
}
else{
    session_unset();
    $_SESSION["logged"] = false;
    $responseData = [
        "success" => false,
        "msg" => "login unsuccesful"
    ];
}
header('Content-Type: application/json');
echo json_encode($responseData);