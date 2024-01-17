<?php

class Database extends PDO {
    private const DB_HOST = "localhost";
    private const DB_USER = 'root';
    private const DB_PASS = 'root';
    private const DB_NAME = 'fpview';

    public function __construct() {
        try {            
            parent::__construct("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME,self::DB_USER,self::DB_PASS);
        } catch (PDOException $e) {            
            exit("Error: " . $e->getMessage());
        }
    }
}
?>