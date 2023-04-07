<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santos Registros</title>
</head>

<body>
    <form method="post" action="../Controlador/UpdateCTRL.php">
        <table border="1">
            <tbody>
                <tr>
                    <td>
                        <label for="id"> Id</label>
                    </td>
                    <td><input type="text" name="id" value="<?php echo $_GET['id'];?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nombre"> Nombre</label>
                    </td>
                    <td>
                        <input type="text" name="nombre" value="<?php echo $_GET['Nombre'];?>"  required>
                    </td>
                </tr>
                <tr>
                    <td><label for="apellido"> Apellido</label></td>
                    <td>
                        <input type="text" name="apellido" value="<?php echo $_GET['Apellido'];?>"  required>
                    </td>
                </tr>
                <tr>
                    <td><label for="Desc"> ¿Qué desea de regalo?</label></td>
                    <td>
                        <input type="text" name="Desc" value="<?php echo $_GET['Desc'];?>"  required>
                    </td>
                </tr>
                <tr>
                    <td><label for="link"> ¿Dónde se puede encontrar?</label></td>
                    <td>
                        <input type="text" name="link" value="<?php echo $_GET['Link'];?>"  required>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="submit" name="Update" value="Actualizar">
    </form>
    <a href=".."><input type="button" name="Volver" value="Volver"></a>

</body>

</html>