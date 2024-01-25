<?php
class Connect
{
    private static $instance = null, $conn = null;
    private function __construct($config)
    {
        $hostname = $config['host'];
        $username = $config['user'];
        $db_name = $config['db_name'];
        if (empty($config['password'])) {
            $password = "";
        } else {
            $password = $config['password'];
        }
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $dbh = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password, $options);
            self::$conn = $dbh;
        } catch (Exception $exception) {
            $msg = $exception->getMessage();
            echo $msg;

        }

    }
    public static function getInstance($config)
    {

        if (self::$instance == null) {
            $connections = new Connect($config);
            self::$instance = self::$conn;
        }
        return self::$instance;
    }
}
