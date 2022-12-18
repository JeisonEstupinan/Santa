<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santos Registros</title>
</head>

<body>
    <form method="post" action="../Controlador/RegistroCTRL.php">
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
                    
                <tr>
                    <td><label for="pass2"> Confirme Contraseña</label></td>
                        <td>
                        <input type="password" name="pass2" required>
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="submit" name="Registrar" value="Registrarme">        
    </form>
    <a href=".."><input type="button" name="Volver" value="Volver"></a>

</body>

</html>