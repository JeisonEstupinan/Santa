<?php
session_start();
if ($_GET['a'] == 'santa') {
    require('../Modelo/UsuarioCRUD.php');
    require('../Modelo/Usuario.php');
    $crud = new CRUD();
    $lista = $crud->getUsuario($_GET['persona']);
    //Cambiar estado de Match a la persona de la ruleta
    $Nombre = $lista[0]->getNombre();
    $id = $lista[0]->getId_Us();
    $registro = $crud->setSanta($Nombre, $id, $_SESSION['id'], $_SESSION['nombre']);

    if ($registro) {
        $_SESSION['match'] = $lista[0]->getNombre();
        header('location: ../Vista/Usuario.php');
    }
}
