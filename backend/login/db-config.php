<?php
/*
database name: cinema
table name: users

CREATE DATABASE IF NOT EXISTS `cinema`;
CREATE TABLE IF NOT EXISTS `cinema`.`users` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `nome` VARCHAR(30) NOT NULL , 
    `cognome` VARCHAR(30) NOT NULL , 
    `email` VARCHAR(40) NOT NULL , 
    `password` VARCHAR(25) NOT NULL , PRIMARY KEY (`id`)
) ENGINE = InnoDB;

*/
function connectToDB() {

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','cinema');
    
    try
    {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
    }
    catch (PDOException $e)
    {
        exit("Error: " . $e->getMessage());
    }

    return $pdo;
}


