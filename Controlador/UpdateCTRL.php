<?php
if (isset($_POST['Update']) && isset($_POST['link'])&& isset($_POST['Desc'])) {
    require_once('../Modelo/UsuarioCRUD.php');
    require_once('../Modelo/Usuario.php');
    $Read = new CRUD();
    $validacion = $Read->validateUsu($_POST['nombre'], $_POST['apellido'], $_POST['id']);

    if ($validacion === 1) {
        $result=$Read->regalos($_POST['id'], $_POST['link'], $_POST['Desc']);
        if($result){
            session_start();
            $match = $Read->validateMatch($_POST['nombre']) ;
            if($match==0){
            header('location:../Vista/Ruleta.php?id=' . $_POST['nombre'] . '');
            }else{
                $usu=$Read->getMatch($_POST ['nombre']); 
                header('location:../Vista/Usuario.php?persona='.$usu.'');
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