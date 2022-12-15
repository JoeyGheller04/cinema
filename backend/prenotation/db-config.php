<?php
/*
CREATE DATABASE IF NOT EXISTS `cinema`;
CREATE TABLE IF NOT EXISTS `cinema`.`film` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `titolo` VARCHAR(30) NOT NULL ,  
    `descrizione` VARCHAR(100), 
    `durata` VARCHAR(25) NOT NULL , 
    `direttore` VARCHAR(25) NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cinema`.`prenotations` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `titolo` VARCHAR(30) NOT NULL ,  
    `email` VARCHAR(40) NOT NULL, 
    `data` VARCHAR(25) NOT NULL ,
    `ora` VARCHAR(25) NOT NULL ,
    `posto` VARCHAR(3) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

*/
function connectToDB() {

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','cinema');
    
    try
    {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    }
    catch (PDOException $e)
    {
        exit("Error: " . $e->getMessage());
    }

    return $pdo;
}


