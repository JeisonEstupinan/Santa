<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santa Secreto</title>
</head>
<body>
<form method="post" action="Controlador/LoginCTRL.php">
        <table border="1">
            <tbody>
                <tr>
                    <td>
                        <label for="id"> Id</label></td>
                        <td><input type="text" name="id" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nombre"> Nombre</label></td>
                        <td>
                        <input type="text" name="nombre" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="apellido"> Apellido</label></td>
                        <td>
                        <input type="text" name="apellido" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="pass"> Contraseña</label></td>
                        <td>
                        <input type="password" name="pass" required>
                    </td>
            </tbody>
        </table>
        <input type="submit" name="Iniciar" value="Iniciar Sesion">        
    </form>
    <a href="Vista/Registro.php"><input type="button" name="Registro" value="Registrarse"></a>
</body>
</html>