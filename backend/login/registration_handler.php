<?php
session_start();

require_once('db-config.php');

$conn = connectToDB();

$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "select * from users where email = '$email'";

$stmt = $conn->prepare($sql);
$stmt->execute();

$record = $stmt->fetch(PDO::FETCH_ASSOC);

if($record === false){

    $query = 'INSERT INTO cinema.users (nome, cognome, email, password)
    VALUES (
            :nome,
            :cognome,            
            :email,
            :password
        )';
    $stmt = $conn->prepare($query);

    $stmt->bindParam('nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam('cognome', $cognome, PDO::PARAM_STR);
    $stmt->bindParam('email', $email, PDO::PARAM_STR);
    $stmt->bindParam('password', $password, PDO::PARAM_STR);

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION["email"] = $record["email"];
    $_SESSION["logged"] = true;
    $responseData = [
        "success" => true,
        "msg" => "logged"
    ];
}
else{
    session_unset();
    $_SESSION["logged"] = false;
    $responseData = [
        "success" => false,
        "msg" => "utente già esistente"
    ];
}
header('Content-Type: application/json');
echo json_encode($responseData);