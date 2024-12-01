<?php
/* error_reporting(0); */
session_start();
if ($_SESSION['nombre'] == NULL || $_SESSION['id'] == NULL) {
    header('location: ..');
} else {
    require_once("../Modelo/UsuarioCRUD.php");
    require_once("../Modelo/Usuario.php");
    $read = new CRUD();
    $match = $read->getUsuario($_SESSION['match']);
    $user = $read->getUsuario($_SESSION['nombre']);
    $_SESSION['desc'] = $user[0]->getDescripcion();
    $_SESSION['link'] = $user[0]->getLink();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Regalo Secreto</title>
        <script defer src="https://app.embed.im/snow.js"></script>
    </head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .table {
            width: auto;
        }
    </style>

    <body style="background-color:#000000;">
        <div class="container table-container">
            <table class="table table-dark table-hover">
                <tbody>
                    <?php
                    echo "<tr>
                            <td>" . $match[0]->getNombre() . " " . $match[0]->getApellido() . " quiere: " . $match[0]->getDescripcion() . ", y se encuentra en: " . $match[0]->getLink() . "
                            </td>
                        </tr
                        <tr>
                            <td> Usted quiere: " . $user[0]->getDescripcion() . ", y se encuentra: " . $user[0]->getLink() . "
                            </td>
                        </tr>";
                    ?>
                    <tr>
                        <td>
                            <center>
                            <a href="../Modelo/CerrarSesion.php"><input type="button" id="logout" value="Salir" class="btn btn-primary"/></a>
                            <a href="EditInfo.php"><input type="button" id="edit" value="Editar mi información" class="btn btn-primary" /></a>
                            </center>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </html>
<?php
}
