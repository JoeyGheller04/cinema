<?php
session_start();
/*INSERT INTO film (titolo, descrizione, durata, direttore)
VALUES ("Le cronache di Gheller", "si va a letto?", "2h15min", "Joey Gheller"); */
require_once('db-config.php');

$conn = connectToDB();

if(isset($_POST['id'])){
    $id = $_POST['id'];
}
else{
    $id = 1;
}
$sql = "select * from film where id = '$id'";

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
header('Content-Type: application/json');
echo json_encode($responseData);