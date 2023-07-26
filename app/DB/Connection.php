<?php
class Connection
{
    private static $dsn = 'mysql:host=localhost;dbname=trungtamso';
    private static $username = "root";
    private static $password = "";
    private static $options = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ];

    private static $db;

    public static function getDB()
    {
        try {
            self::$db = new \PDO(self:: $dsn, self::$username, self::$password, self::$options);
            return self::$db;
        } catch (PDOException $e) {
            echo "Error connect Database: " . $e->getMessage();
        }
    }
}