<?php
session_start();

require_once('db-config.php');

$conn = connectToDB();

$nome = $_SESSION["nome"];
$cognome = $_SESSION["cognome"];
$email = $_SESSION["email"];
$password = $_SESSION["password"];

$sql = "select * from users where email = '$email'";

$stmt = $conn->prepare($sql);
$stmt->execute();

$record = $stmt->fetch(PDO::FETCH_ASSOC);

if($record == false){

    $query = 'INSERT INTO cinema.users (nome, cognome, email, password)
    VALUES (
            :nome,
            :cognome,            
            :email,
            :password
        )';
    $stmt = $conn->prepare($query);

    $stmt->bindParam('nome', $nome);
    $stmt->bindParam('cognome', $cognome );
    $stmt->bindParam('email', $email );
    $stmt->bindParam('password', $password );

    $stmt->execute();
    header('location: ..\second.php');
}
else{
    session_unset();
    $_SESSION["logged"] = false;
    $_SESSION["res"] = "utente già esistente";

    header('location: ..\index.php');
}