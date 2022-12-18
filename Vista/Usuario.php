<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <td>".$Familia->getNombre()." quiere un(a) ".$Familia->getDescripcion()." y lo puede encontrar en: ".$Familia->getLink()." </td>
    </tr></table> ";
}
?>    
</body>
</html>
