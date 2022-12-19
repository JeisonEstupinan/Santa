<?php
if (isset($_POST['Registrar']) && $_POST['pass'] === $_POST['pass2'] && isset($_POST['link'])&& isset($_POST['Desc'])) {
    require_once('../Modelo/UsuarioCRUD.php');
    require_once('../Modelo/Usuario.php');
    $Read = new CRUD();
    $validacion = $Read->validateUsu($_POST['nombre'], $_POST['apellido'], $_POST['id']);

    if ($validacion === 1) {
        $resultIns=$Read->insert($_POST['pass'], $_POST['id']);
        $result=$Read->regalos($_POST['id'], $_POST['link'], $_POST['Desc']);
        if($result && $resultIns){
            header('location:../Vista/Ruleta.php?id=' . $_POST['nombre'] . '');
        }else{
            header('location: ..');
        }
    }else{
        header('location: ..');
    }
} else {
    header('location: ..');
}