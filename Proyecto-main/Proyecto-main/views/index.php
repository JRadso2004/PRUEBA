<?php
define('RUTA', 'http://18.218.6.249'); // Asegúrate de que RUTA esté definida
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Registro de asistencia</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="<?php echo RUTA . 'assets/css/snackbar.min.css'; ?>">
    <link href="<?php echo RUTA . 'assets/index/css/styles.css'; ?>" rel="stylesheet" />

    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>

</head>

<body>
    <img class="bg-video" src="<?php echo RUTA . 'assets/images/bg.jpg'; ?>" alt="">
    <!-- Masthead-->
    <div class="masthead">
        <div class="masthead-content text-white">
            <div class="container-fluid px-lg-0">
                <div class="widget">
                    <div class="fecha">
                        <p id="diaSemana" class="diaSemana"></p>
                        <p id="dia" class="dia"></p>
                        <p>de </p>
                        <p id="mes" class="mes"></p>
                        <p>del </p>
                        <p id="year" class="year"></p>
                    </div>
                    <div class="reloj">
                        <p id="horas" class="horas"></p>
                        <p>:</p>
                        <p id="minutos" class="minutos"></p>
                        <p>:</p>
                        <div class="caja-segundos">
                            <p id="segundos" class="segundos"></p>
                            <p id="ampm" class="ampm"></p>
                        </div>
                    </div>
                </div>
                <h1 class="fst-italic lh-1 mb-4">ASSISCOR</h1>
                <p class="mb-5">Entradas y salidas de los usuarios</p>
                <form id="contactForm" autocomplete="off">
                    <!-- Email address input-->
                    <div class="row input-group-newsletter">
                        <div class="col"><input class="form-control" id="codigo" name="codigo" type="text" placeholder="Ingrese código" /></div>
                        <div class="col-auto"><button class="btn btn-primary" id="submitButton" type="submit">Registrar</button></div>
                    </div>
                    <div>
                        <!-- Botón para abrir la cámara -->
                        <button id="abrirCamara">Escanear QR</button>

                        <!-- Div donde se mostrará la cámara -->
                        <div id="qr-reader" style="width:500px; display: none;"></div>
                        <div id="qr-result">Resultado: <span id="result"></span></div>

                        <script>
                            // Función para abrir la cámara al hacer clic en el botón
                            document.getElementById("abrirCamara").addEventListener("click", function() {
                                const qrReader = document.getElementById("qr-reader");
                                qrReader.style.display = "block"; // Mostrar el lector de QR

                                const html5QrCode = new Html5Qrcode("qr-reader");

                                html5QrCode.start(
                                    { facingMode: "environment" }, // Usar la cámara trasera
                                    {
                                        fps: 10,    // Número de frames por segundo
                                        qrbox: { width: 250, height: 250 }  // Tamaño de la caja del QR
                                    },
                                    qrCodeMessage => {
                                        // Mostrar el resultado del QR
                                        document.getElementById("result").innerText = qrCodeMessage;
                                        // Detener el lector de QR una vez escaneado
                                        html5QrCode.stop().then(() => {
                                            qrReader.style.display = "none";  // Ocultar la cámara
                                        });
                                    },
                                    errorMessage => {
                                        // Puedes mostrar los errores de escaneo aquí
                                        console.log(`Error escaneando: ${errorMessage}`);
                                    })
                                    .catch(err => {
                                        // Muestra el error si falla el inicio de la cámara
                                        console.error(`Error al iniciar la cámara: ${err}`);
                                    });
                            });
                        </script>
                    </div>
                    <!-- Social Icons-->
                    <div class="social-icons">
                        <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                            <div>
                                <label>
                                    <input type="radio" name="radio" value="entrada" checked />
                                    <span>Entrada</span>
                                </label>
                                <label>
                                    <input type="radio" name="radio" value="salida" />
                                    <span>Salida</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="social-icons">
        <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
            <a class="btn btn-primary" href="plantilla.php?pagina=login">Login</a>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?php echo RUTA . 'assets/'; ?>js/snackbar.min.js"></script>
    <script src="<?php echo RUTA . 'assets/'; ?>js/axios.min.js"></script>
    <script>
        const ruta = '<?php echo RUTA; ?>';

        function message(tipo, mensaje) {
            Snackbar.show({
                text: mensaje,
                pos: 'top-right',
                backgroundColor: tipo == 'success' ? '#079F00' : '#FF0303',
                actionText: 'Cerrar'
            });
        }
    </script>
    <script src="<?php echo RUTA . 'assets/index/'; ?>js/scripts.js"></script>

</body>

</html>
