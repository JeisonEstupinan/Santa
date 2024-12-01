<?php
class CRUD
{
    private $Db;
    function __construct()
    {
        require_once("Conexion.php");
        $this->Db = Conexion::getConexion();
    }

    public function regalos($id,$link, $desc){
        $sql = $this->Db->prepare('UPDATE user SET link=:LINK, description=:DESCRIP WHERE id_user=:ID');
        $resultado=$sql->execute(array(':LINK' => $link, ':ID' => $id,':DESCRIP'=>$desc));
        return $resultado;
    }
    
    public function insert($pass, $id)
    {
        $sql = $this->Db->prepare('UPDATE user SET credentials=MD5(:PASS) WHERE id_user=:ID');
        $resultado=$sql->execute(array(':PASS' => $pass, ':ID' => $id));
        return $resultado;
    }

    public function Read($Nombre)
    {
        $sql = $this->Db->prepare('SELECT * FROM user WHERE state=0 AND user_name!= :NOMB');
        $sql->execute(array(':NOMB' => $Nombre));
        $Usuario = [];
        foreach ($sql->fetchAll() as $usuario) {
            $Familia = new UsuarioClass();
            $Familia->setId_Us($usuario['id_user']);
            $Familia->setNombre($usuario['user_name']);
            $Familia->setApellido($usuario['lastname1']);
            $Familia->setDescripcion($usuario['description']);
            $Familia->setLink($usuario['link']);
            $Familia->setEstado($usuario['state']);
            $Usuario[] = $Familia;
        }
        return $Usuario;
    }
    public function getUsuario($nombUsu)
    {
        $sql = $this->Db->prepare('SELECT * FROM user WHERE user_name=:NOMBRE');
        $sql->execute(array(':NOMBRE' => $nombUsu));
        $Usuario = [];
        foreach ($sql->fetchAll() as $usuario) {
            $Familia = new UsuarioClass();
            $Familia->setId_Us($usuario['id_user']);
            $Familia->setNombre($usuario['user_name']);
            $Familia->setApellido($usuario['lastname1']);
            $Familia->setDescripcion($usuario['description']);
            $Familia->setLink($usuario['link']);
            $Familia->setEstado($usuario['state']);
            $Usuario[] = $Familia;

        }
        return $Usuario;
    }
    public function setSanta($nombre1, $id1, $id2, $nombre2)
    {
        $sql = $this->Db->prepare("UPDATE user SET state=1 WHERE id_user=:ID AND user_name=:NOMB");
        $sql->execute(array(':ID' => $id1, ':NOMB' => $nombre1));
        $sql2 = $this->Db->prepare('INSERT INTO santa(id_persona1,id_persona2) VALUES (:PER1,:PER2)');
        $sql2->execute(array(':PER1' => $nombre2, ':PER2' => $id1));
        if ($sql == true && $sql2 == true) {
            return true;
        } else {
            return false;
        }
    }

    public function validateMatch($Nombre)
    {
        $sql = $this->Db->prepare('SELECT * FROM santa WHERE id_persona1=:NOMBRE ');
        $sql->execute(array(':NOMBRE' => $Nombre));
        $resultado = $sql->rowCount();
        return $resultado;

    }

    public function getMatch($nombre)
    {
        $Usuario1=null;
        $sql = $this->Db->prepare('SELECT user.user_name FROM user INNER JOIN santa ON santa.id_persona2=user.id_user WHERE santa.id_persona1=:NOMB');
        $sql->execute(array(':NOMB' => $nombre));
        foreach ($sql->fetchAll() as $usuario) {
            $Usuario1 = $usuario['user_name'];
        }
        return $Usuario1;

    }

    public function validateUsu($nomb, $apell, $id)
    {
        $sql = $this->Db->prepare('SELECT * FROM user WHERE user_name=:NOMBRE AND id_user=:ID AND lastname1=:APEL');
        $sql->execute(array(':NOMBRE' => $nomb, ':ID' => $id, ':APEL' => $apell));
        $consulta = $sql->rowCount();
        return $consulta;
    }
}