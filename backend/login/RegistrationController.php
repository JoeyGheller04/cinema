<?php
session_start();
class RegistrationController
{
    public $nome;
    public $cognome;
    public $email;
    public $password;
    private $conn;
    public function __construct($nome, $cognome, $email, $password)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->email = $email;
        $this->password = $password;
        require_once 'Database.php';
        $this->conn = Database::getIstance()->conn;
    }
    public function controllaDati()
    {
        if (!$this->areEmpy()) {
            return "Compila tutti i campi";
        }
        if (!$this->isEmail()) {
            return "Inserisci un'email valida";
        }
        if (!$this->doesUserExist()) {
            return "L'utente esiste già";
        }
        return false;
    }

    private function areEmpy()
    {
        if (empty($this->nome) || empty($this->cognome) || empty($this->email) || empty($this->password)) {
            return false;
        }
        return true;
    }

    private function isEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    private function doesUserExist()
    {

        $query = 'SELECT id FROM registroutenti.credenziali
            WHERE email = ?
        ';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false;
        }
        return true;
    }
}
