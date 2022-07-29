<?php
/*
* This class is used to save messages into the database as logs
* Adriano Oliveira - adrianooliveira2332@gmail.com
*/

class History {

    private $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=logs;host=localhost", "", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    /*
    * @param string $message
    */
    public function register($message){
        $ip = $_SERVER['REMOTE_ADDR'];

        $sql = "INSERT INTO saved_logs SET ip = :ip, date = NOW(), message = :message";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':ip', $ip);
        $sql->bindValue(':message', $message);
        $sql->execute();

    }
}