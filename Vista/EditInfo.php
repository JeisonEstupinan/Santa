<?php
session_start();
if ($_SESSION['nombre'] == NULL || $_SESSION['id'] == NULL) {
    header('location: ..');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Registro</title>
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
            <form method="post" action="../Controlador/UpdateCTRL.php">
                <table class="table table-dark table-hover">
                    <tbody>
                        <tr>
                            <td><label for="Desc"> ¿Qué desea de regalo?</label></td>
                            <td>
                                <input type="text" name="desc" value="<?php echo $_SESSION['desc']; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="link"> ¿Dónde se puede encontrar?</label></td>
                            <td>
                                <input type="text" name="link" value="<?php echo $_SESSION['link']; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="Update" value="Actualizar" class="btn btn-primary">
                            </td>
                            <td><a href="Ruleta.php"><input type="button" name="Volver" value="Volver" class="btn btn-primary"></a></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </html>
<?php
}
?>