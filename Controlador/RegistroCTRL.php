<?php
if (isset($_POST['Registrar']) && $_POST['pass'] === $_POST['pass2']) {
    require_once('../Modelo/UsuarioCRUD.php');
    require_once('../Modelo/Usuario.php');
    $Read = new CRUD();
    $validacion = $Read->validateUsu($_POST['nombre'], $_POST['apellido'], $_POST['id']);

    if ($validacion === 1) {
        $Read->insert($_POST['pass'], $_POST['id']);
        header('location:../Vista/Ruleta.php?id=' . $_POST['nombre'] . '');
    }

} else {
    header('location: ..');
}