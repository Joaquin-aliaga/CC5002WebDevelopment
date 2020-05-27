<?php
/* 
Clase DBConfig para crear conexion a base de datos
*/

class DBConfig {
    private static $db_name = "cc500203_db"; //Base de datos de la app
    private static $db_user = "cc500203_u"; //Usuario MySQL
    private static $db_pass = "llentesque"; //Password
    private static $db_host = "localhost"; //este debe quedar igual
    private static $db_port = 3306;
    
    public static function getConnection (){
        $mysqli = new mysqli(self::$db_host,self::$db_user,self::$db_pass,self::$db_name,self::$db_port);
        
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        //echo "conexion exitosa a base de datos";

        $mysqli -> set_charset("utf8");
        return $mysqli;
    }
}
?>