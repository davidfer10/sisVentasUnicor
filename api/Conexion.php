<?php
class Conexion
{
    private static $dbName = 'u9264487_ventas';
    private static $dbHost = '127.0.0.1';
    private static $dbUsername = 'u9264487_usventas';
    private static $dbUserPassword = '(+DcdpJh#9D,';

    private static $cont = null;

    public function __construct() {
        die('Fallo la conexion');
    }

    public static function connect() {
        if (null === self::$cont) {
            try {
                self::$cont =  new PDO('mysql:host='.self::$dbHost.'; dbname='.self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch(PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect() {
        self::$cont = null;
    }
}
