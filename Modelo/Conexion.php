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
            $con = new PDO('mysql:http://localhost/phpmyadmin/index.php?route=/database/structure&db=santa_secreto; dbname=santa_secreto', 'root', '');

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