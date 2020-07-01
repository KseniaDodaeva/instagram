<?php
class login
{
    public static $dsn = 'mysql:dbname=inst; host=localhost:3306';
    public static $user = 'root';
    public static $pass = 'root';

    public static $dbh = null;
    public static $sth = null;

    public static function getDbh()
    {
        if (!self::$dbh) {
            try {
                self::$dbh = new PDO
                (
                    self::$dsn,
                    self::$user,
                    self::$pass,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
                );
                self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            } catch (PDOException $e) {
                exit('Error connecting to database: ' . $e->getMessage());
            }
        }
        return self::$dbh;
    }
}
