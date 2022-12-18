<?php
class Login
{
    private $Db;
    public function __construct()
    {
        require_once("Conexion.php");
        $this->Db = Conexion::getConexion();
    }

    public function validateSesion($id, $nombre, $apellido, $pass)
    {
        $sql = $this->Db->prepare('SELECT * FROM persona WHERE id_persona= :ID AND Nombre=:NOMB AND Apellido= :APEL AND Contrasena = MD5(:PASS)');
        $sql->execute(array(':ID' => $id, ':NOMB' => $nombre, ':APEL' => $apellido, ':PASS' => $pass));
        $consulta = $sql->rowCount();
        return $consulta;
    }
}