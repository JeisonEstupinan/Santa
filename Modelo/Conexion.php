<?php
class Conexion
{
    function __construct()
    {
    }
    public static function getConexion()
    {
        $con = null;

        try {

            // Conexión
            $con = new PDO('mysql:https://databases.000webhost.com/db_structure.php?server=1&db=id18112597_santa_secreto; dbname=id18112597_santa_secreto', 'id18112597_rolo0908', '_i3OdtaI[N/Ypgu4');

            // Errores
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Caracteres utf8
            $con->exec("SET CHARACTER SET utf8");

        } catch (Exception $e) {

            $con = "ERROR";

        } finally {

            return $con;

        }
    }
}