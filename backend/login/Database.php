<?php
session_start();
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    public $conn;

    private static $instance;

    private function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->createDatabase();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    private function createDatabase()
    {
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS `registroutenti`;";
        $this->conn->exec($sql);
        $this->addTable();
    }

    private function addTable()
    {
        $query = "CREATE TABLE IF NOT EXISTS `registroutenti`.`credenziali` ( 
            `id` INT NOT NULL AUTO_INCREMENT , 
            `nome` VARCHAR(30) NOT NULL , 
            `cognome` VARCHAR(30) NOT NULL , 
            `email` VARCHAR(40) NOT NULL , 
            `password` VARCHAR(25) NOT NULL , PRIMARY KEY (`id`)
        ) ENGINE = InnoDB;";
        $this->conn->query($query);

        $sql = "INSERT INTO registroutenti.credenziali (nome, cognome, email, password)
        VALUES ('Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger');";
        $this->conn->query($sql);
    }

    public static function getIstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
}
