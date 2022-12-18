<?php
if(isset($_POST['Iniciar']) && $_POST['pass'] != null && $_POST['nombre'] != null && $_POST['apellido'] != null && $_POST['id']!= null)  {
    require_once('../Modelo/LoginMDL.php');
    $Read = new Login();
    $validacion= $Read->validateSesion($_POST['id'],$_POST['nombre'],$_POST['apellido'],$_POST['pass']);

    if($validacion === 1){
        session_start();
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['id'] = $_POST['id'];
        require_once('../Modelo/UsuarioCRUD.php');
        require_once('../Modelo/Usuario.php');
        $Crud= new CRUD();
        $usuaio = new UsuarioClass();
        $lista = $Crud->getMatch($_POST['nombre']);
        $consultaMatch= $Crud->validateMatch($_POST['nombre']);
        if($consultaMatch==0){
            header('location:../Vista/Ruleta.php?id='.$_POST['nombre'].'');
        }else{
            header('location: ../Vista/Usuario.php?persona='.$lista.'');
        }
    } else {
        header('location: ..');
    }

}else{
    header('location: ..');
}