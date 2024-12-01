<?php
if (isset($_POST['Update']) && isset($_POST['link'])&& isset($_POST['desc'])) {
    session_start();
    require_once('../Modelo/UsuarioCRUD.php');
    require_once('../Modelo/Usuario.php');
    $Read = new CRUD();
    $validacion = $Read->validateUsu($_SESSION['nombre'], $_SESSION['apellido'], $_SESSION['id']);

    $_SESSION['link']=$_POST['link'];
    $_SESSION['desc']=$_POST['desc'];

    if ($validacion === 1) {
        $result=$Read->regalos($_SESSION['id'], $_POST['link'], $_POST['desc']);
        if($result){
            $match = $Read->validateMatch($_SESSION['nombre']) ;
            if($match==0){
            header('location:../Vista/Ruleta.php');
            }else{
                header('location:../Vista/Usuario.php');
            }
        }else{
            header('location: ..');
        }
    }else{
        header('location: ..');
    }
} else {
    header('location: ..');
}