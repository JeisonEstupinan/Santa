<?php
session_start();
if ($_SESSION['nombre'] == NULL || $_SESSION['id'] == NULL) {
    header('location: ..');
} else {
    require_once("../Modelo/UsuarioCRUD.php");
    require_once("../Modelo/Usuario.php");
    $read = new CRUD();
    $Familia = new UsuarioClass();
    $listaFamilia = $read->Read($_SESSION['nombre']);
    $num = count($listaFamilia);
    $Crud = new CRUD();
    $_SESSION['match'] = $Crud->getMatch($_SESSION['nombre']);
    $consultaMatch = $Crud->validateMatch($_SESSION['nombre']);
    if ($consultaMatch == 1) {
        header('location: ../Vista/Usuario.php');
    } else {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Regalo Secreto</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script type="text/javascript" src="../js/Winwheel.js"></script>
            <script type="text/javascript" src="../js/TweenMax.min.js"></script>
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
            <center>
                <div class="container">
                    <canvas id="canvas" width="400" height="400"></canvas><br>
                </div></center>
                <center>
                <div class="container">
                    <input type="button" id="spin_button" value="Girar" alt="Spin" class="btn btn-light" onClick="startSpin()" />
                    <a href="../Modelo/CerrarSesion.php"><input type="button" id="logout" class="btn btn-light" value="Salir" /></a>
                </div></center>
            <script>
                let theWheel = new Winwheel({
                    'numSegments': <?php echo $num; ?>,
                    'outerRadius': 170,
                    'segments': [<?php
                                    foreach ($listaFamilia as $Familia) {
                                        echo "
                        {'fillStyle':'#00FFEE','text':'" . $Familia->getNombre() . "'},
                        ";
                                    } ?>],
                    'animation': {
                        'type': 'spinToStop',
                        'duration': 2,
                        'spins': 8,
                        'callbackFinished': alertPrize,
                        'callbackAfter': 'dibujarIndicador()'

                    }
                });
                let wheelSpinning = false;

                dibujarIndicador();

                function dibujarIndicador() {
                    var ctx = theWheel.ctx;
                    ctx.strokeStyle = 'navy';
                    ctx.fillStyle = 'gray';
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.moveTo(170, 0);
                    ctx.lineTo(230, 0);
                    ctx.lineTo(200, 40);
                    ctx.lineTo(171, 0);
                    ctx.stroke();
                    ctx.fill();
                }

                function startSpin() {
                    if (wheelSpinning == false) {
                        theWheel.animation.spins = 8;
                        theWheel.startAnimation();
                        theWheel.rotationAngle = 0;
                        wheelSpinning = false;
                    }
                }

                function alertPrize(indicatedSegment) {
                    window.alert("Le salió " + indicatedSegment.text);
                    var dato = indicatedSegment.text;
                    window.location.href = "../Controlador/SantaCTRL.php?persona=" + dato + "&a=santa";
                }
            </script>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        </html>
<?php
    }
}
