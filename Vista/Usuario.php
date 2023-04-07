<?php
error_reporting(0);
session_start();
if($_SESSION['nombre'] == NULL || $_SESSION['id']== NULL){
    header('location: ..');
}else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santa Secreto</title>
</head>

<body>
    <?php
require_once("../Modelo/UsuarioCRUD.php");
require_once("../Modelo/Usuario.php");
$read = new CRUD();
$Familia = new UsuarioClass();
$listaFamilia = $read->getUsuario($_GET['persona']);
foreach ($listaFamilia as $Familia) {
    echo "<table border='1'><tr>
        <td>".$Familia->getNombre()." ".$Familia->getApellido()." quiere un(a) ".$Familia->getDescripcion()." y lo puede encontrar en: ".$Familia->getLink()." </td>
    </tr></table> ";
}
?>
<a href="../Modelo/CerrarSesion.php"><input type="button" id="logout" value="Salir"/></a> <br></br>
<?php
$listaUsuario = $read->getUsuario($_SESSION['nombre']);
foreach ($listaUsuario as $user) {
    echo "<table border='1'><tr>
        <td> Usted quiere un(a) ".$user->getDescripcion()." y lo puede encontrar en: ".$user->getLink()." </td>
    </tr></table> ";
}
?>
<a href="EditInfo.php?id=<?php echo $_SESSION['id']."&Nombre=".$_SESSION['nombre']."&Apellido=".$user->getApellido()."&Desc=".$user->getDescripcion()."&Link=".$user->getLink();?>"><input type="button" id="edit" value="Editar mi información"/></a>
</body>

</html>
<?php
}