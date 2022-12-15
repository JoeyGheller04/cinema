<?php
session_start();

require_once('db-config.php');
$conn = connectToDB();

if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    $email = $_POST["email"];
}
$titolo = $_POST["film"];
$data = $_POST["data"];
$ora = $_POST["ora"];
$posto = $_POST["posto"];

$query = 'INSERT INTO cinema.prenotations (titolo, email, data, ora, ' . $posto . ')
    VALUES (
            :titolo,
            :email,
            :data,
            :ora,
            :posto
        )';
$stmt = $conn->prepare($query);

$stmt->bindParam('titolo', $titolo, PDO::PARAM_STR);
$stmt->bindParam('email', $email, PDO::PARAM_STR);
$stmt->bindParam('data', $data, PDO::PARAM_STR);
$stmt->bindParam('ora', $ora, PDO::PARAM_STR);
$stmt->bindParam($posto, true, PDO::PARAM_BOOL);

$stmt->execute();

$responseData = [
    "success" => true,
    "msg" => "posto prenotato"
];
echo json_encode($responseData);
