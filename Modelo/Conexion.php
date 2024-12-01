<?php
class Conexion
{
    function __construct() {}
    public static function getConexion()
    {
        $dotenv = fopen('../.env', 'r');
        if ($dotenv) {
            while (($line = fgets($dotenv)) !== false) {
                putenv(trim($line));
            }
            fclose($dotenv);
        } // Obtener las variables de entorno 
        $host = getenv('DB_HOST');
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASS');
        $dbname = getenv('DB_NAME');
        try {

            // Conexión
            $con = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);

            // Errores
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Caracteres utf8
            $con->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {

            $con = "ERROR" . $e->getMessage();
        } finally {

            return $con;
        }
    }
}
