<?php
class UsuarioClass
{

    private $id_usuario;
    private $Nombre;
    private $Apellido;
    private $Descripcion;
    private $link;
    private $Estado;

    function __construct()
    {
    }
    public function getId_Us()
    {
        return $this->id_usuario;
    }
    public function setId_Us($id)
    {
        $this->id_usuario = $id;
    }
    public function getNombre()
    {
        return $this->Nombre;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    public function getApellido()
    {
        return $this->Apellido;
    }

    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;
    }

    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getEstado()
    {
        return $this->Estado;
    }

    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

}