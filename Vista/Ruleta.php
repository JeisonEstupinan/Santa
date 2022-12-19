<?php
session_start();
if($_SESSION['nombre'] != NULL && $_SESSION['id']!= NULL){
    require_once("../Modelo/UsuarioCRUD.php");
    require_once("../Modelo/Usuario.php");
    $read = new CRUD();
    $Familia = new UsuarioClass();
    $listaFamilia = $read->Read($_GET['id']);
    $num = count($listaFamilia);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Santa Secreto</title>
        <script type="text/javascript" src="../js/Winwheel.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    </head>
    
    <body>
        <br /><br />
        <canvas id="canvas" width="400" height="400"></canvas>
        <input type="button" id="spin_button" value="Girar" alt="Spin" onClick="startSpin();" />
        <a href="../Modelo/CerrarSesion.php"><input type="button" id="logout" value="Salir"/></a>
        <script>
            let theWheel = new Winwheel({
                'numSegments': <?php echo $num; ?>,
                'outerRadius'  : 170,
                'segments'     : [<?php
                foreach ($listaFamilia as $Familia) {
                    echo "
                        {'fillStyle':'#f9b1c3 ','text':'" . $Familia->getNombre() . "'},
                        ";
                } ?>
                ],
            'animation' :
            {
                'type'     : 'spinToStop',
                    'duration' : 2,
                        'spins'    : 8,
                            'callbackFinished' : alertPrize,
                                'callbackAfter': 'dibujarIndicador()'
    
            }
                });
            let wheelSpinning = false;
    
            dibujarIndicador();
            function dibujarIndicador() {
                var ctx = theWheel.ctx;
                ctx.strokeStyle = 'navy';
                ctx.fillStyle = 'black';
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
                window.alert("Es santa secreto de " + indicatedSegment.text);
                var dato = indicatedSegment.text;
                window.location.href="../Controlador/SantaCTRL.php?persona="+dato+"&a=santa";
            }
        </script>
    </body>
    </html>
<?php
}