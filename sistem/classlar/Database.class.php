<?php

class Database
{
    
    private static $connection;

    private static $settings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    );
    
    public static function connect($host, $username, $password, $dbname) {
        if (!isset(self::$connection)) {
            self::$connection = @new PDO(
                "mysql:host=$host;dbname=$dbname",
                $username,
                $password,
                self::$settings
            );
        }
    }

    // Return the 1st row
    public static function queryAlone($query, $parameters = array()) {
        $result = self::$connection->prepare($query);
        $result->execute($parameters);
        return $result->fetch();
    }

    // Return all rows
    public static function queryAll($query, $parameters = array()) {
        $result = self::$connection->prepare($query);
        $result->execute($parameters);
        return $result->fetchAll();
    }

    // Return the number of affected rows
    public static function query($query, $parameters = array()) {
        $result = self::$connection->prepare($query);
        $result->execute($parameters);
        return $result->rowCount();
    }

}