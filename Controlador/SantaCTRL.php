<?php
session_start();
if(isset($_GET['santa'])){
    require('../Modelo/UsuarioCRUD.php');
    require('../Modelo/Usuario.php');
    $usuario = new UsuarioClass();
    $crud = new CRUD();
    $lista = $crud->getUsuario($_GET['persona']);
    //Cambiar estado de Match a la persona de la ruleta
    foreach ($lista as $usuario) {
        $Nombre = $usuario->getNombre();
        $id = $usuario->getId_Us();
    }
    $registro = $crud->setSanta($Nombre, $id, $_SESSION['id'], $_SESSION['nombre']);
    
    if ($registro) {
        header('location: ../Vista/Usuario.php?persona=' . $usuario->getNombre() . '');
    }
}