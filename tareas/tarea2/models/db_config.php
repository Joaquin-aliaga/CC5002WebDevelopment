<?php
/* 
Clase DBConfig para crear conexion a base de datos
*/

class DBConfig {
    private static $db_host = "localhost";
    private static $db_port = 3306;
    private static $db_name = "tarea2";
    private static $db_user = "cc5002";
    private static $db_pass = "programacionweb";

    public static function getConnection (){
        $mysqli = new mysqli(self::$db_host,self::$db_user,self::$db_pass,self::$db_name,self::$db_port);
        
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $mysqli -> set_charset("utf8");
        return $mysqli;
    }
}
?>