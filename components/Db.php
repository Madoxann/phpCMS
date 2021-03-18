<?php
final class DB{
    private static $db = null;
    private function __construct(){
        require('config/db.php');
        $connection = mysqli_connect($db['host'],$db['user'],$db['password'], $db['database']);
        mysqli_set_charset($connection, 'utf8');
        self::$db = $connection;
    }
    private function __clone(){
    }
    private function __wakeup(){
    }
    private function __sleep(){
    }
    public static function getConnection(){
        if (!self::$db){
            new self();
        }
        return self::$db;
    }
}