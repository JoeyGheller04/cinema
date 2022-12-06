<?php
session_start();
class Utente
{
    private $conn;
    // private $table = 'credenziali';

    public $id;
    public $nome;
    public $cognome;
    public $email;
    public $password;

    public function __construct()
    {
        require_once('Database.php');
        $this->conn = Database::getIstance()->conn;
    }

    public function read()
    {
        $query = 'SELECT * from registroutenti.credenziali';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    //login
    public function read_single($email, $password)
    {
        $query = 'SELECT * FROM registroutenti.credenziali
                WHERE email = ? AND password = ?
        ';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
    //register
    public function create($data)
    {
        include_once 'RegistrationController.php';
        $checkUser = new RegistrationController($data["nome"], $data["cognome"], $data["email"], $data["password"]);
        $msg = $checkUser->controllaDati();

        if (!($msg == false)) {
            return $msg;
        }

        $query = 'INSERT INTO registroutenti.credenziali (nome, cognome, email, password)
            VALUES (
                    :nome,
                    :cognome,            
                    :email,
                    :password
                )
        ';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam('nome', $data["nome"]);
        $stmt->bindParam('cognome', $data["cognome"]);
        $stmt->bindParam('email', $data["email"]);
        $stmt->bindParam('password', $data["password"]);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
