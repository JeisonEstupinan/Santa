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
        $sql = $this->Db->prepare('UPDATE persona SET Link=:LINK, Descripcion=:DESCRIP WHERE id_persona=:ID');
        $resultado=$sql->execute(array(':LINK' => $link, ':ID' => $id,':DESCRIP'=>$desc));
        return $resultado;
    }
    public function insert($pass, $id)
    {
        $sql = $this->Db->prepare('UPDATE persona SET Contrasena=MD5(:PASS) WHERE id_persona=:ID');
        $resultado=$sql->execute(array(':PASS' => $pass, ':ID' => $id));
        return $resultado;
    }
    public function Read($Nombre)
    {
        $sql = $this->Db->prepare('SELECT * FROM persona WHERE Estado="Out_Match" AND Nombre!= :NOMB');
        $sql->execute(array(':NOMB' => $Nombre));
        $Usuario = [];
        foreach ($sql->fetchAll() as $usuario) {
            $Familia = new UsuarioClass();
            $Familia->setId_Us($usuario['id_persona']);
            $Familia->setNombre($usuario['Nombre']);
            $Familia->setApellido($usuario['Apellido']);
            $Familia->setDescripcion($usuario['Descripcion']);
            $Familia->setLink($usuario['Link']);
            $Familia->setEstado($usuario['Estado']);
            $Usuario[] = $Familia;
        }
        return $Usuario;
    }
    public function getUsuario($nombUsu)
    {
        $sql = $this->Db->prepare('SELECT * FROM persona WHERE Nombre=:NOMBRE');
        $sql->execute(array(':NOMBRE' => $nombUsu));
        $Usuario = [];
        foreach ($sql->fetchAll() as $usuario) {
            $Familia = new UsuarioClass();
            $Familia->setId_Us($usuario['id_persona']);
            $Familia->setNombre($usuario['Nombre']);
            $Familia->setApellido($usuario['Apellido']);
            $Familia->setDescripcion($usuario['Descripcion']);
            $Familia->setLink($usuario['Link']);
            $Familia->setEstado($usuario['Estado']);
            $Usuario[] = $Familia;

        }
        return $Usuario;
    }
    public function setSanta($nombre1, $id1, $id2, $nombre2)
    {
        $sql = $this->Db->prepare("UPDATE persona SET Estado='Match' WHERE id_persona=:ID AND Nombre=:NOMB");
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
        $sql = $this->Db->prepare('SELECT persona.Nombre FROM persona INNER JOIN santa ON santa.id_persona2=persona.id_persona WHERE santa.id_persona1=:NOMB');
        $sql->execute(array(':NOMB' => $nombre));
        foreach ($sql->fetchAll() as $usuario) {
            $Usuario1 = $usuario['Nombre'];
        }
        return $Usuario1;

    }

    public function validateUsu($nomb, $apell, $id)
    {
        $sql = $this->Db->prepare('SELECT * FROM persona WHERE Nombre=:NOMBRE AND id_persona=:ID AND Apellido=:APEL');
        $sql->execute(array(':NOMBRE' => $nomb, ':ID' => $id, ':APEL' => $apell));
        $consulta = $sql->rowCount();
        return $consulta;
    }
}