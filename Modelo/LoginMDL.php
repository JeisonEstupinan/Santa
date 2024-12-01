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
        $sql = $this->Db->prepare("SELECT * FROM user WHERE id_user= :ID AND user_name=:NOMB AND lastname1= :APEL AND credentials = MD5(:PASS)");
        $sql->execute(array(':ID' => $id, ':NOMB' => $nombre, ':APEL' => $apellido, ':PASS' => $pass));
        $consulta = $sql->rowCount();
        return $consulta;
    }
}