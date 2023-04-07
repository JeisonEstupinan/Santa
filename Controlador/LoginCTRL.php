<?php
session_start();
if (isset($_POST['Iniciar']) && $_POST['pass'] != null && $_POST['nombre'] != null && $_POST['apellido'] != null && $_POST['id'] != null) {
    require_once('../Modelo/LoginMDL.php');
    $Read = new Login();
    $validacion = $Read->validateSesion($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['pass']);

    if ($validacion === 1) {
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['id'] = $_POST['id'];
        require_once('../Modelo/UsuarioCRUD.php');
        $Crud = new CRUD();
        $lista = $Crud->getMatch($_POST['nombre']);
        $consultaMatch = $Crud->validateMatch($_POST['nombre']);
        if ($consultaMatch == 0) {
            header('location:../Vista/Ruleta.php');
        } else {
            header('location: ../Vista/Usuario.php?persona=' . $lista . '');
        }
    } else {
        header('location: ..');
    }

} else if ($_SESSION['nombre'] != NULL && $_SESSION['id'] != NULL) {
    require_once('../Modelo/UsuarioCRUD.php');
    $Crud = new CRUD();
    $lista = $Crud->getMatch($_SESSION['nombre']);
    header('Location: ../Vista/Usuario.php?persona=' . $lista . '');
}