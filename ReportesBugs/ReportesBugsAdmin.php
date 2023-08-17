<?php
require_once("../core/global/php/CyTechPhp.php");
$CyDatos = new CyTech();
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Escritorio de comandos técnicos">
    <meta name="author" content="Cy Technologies">
    <title>Control Casino | Escritorio</title>
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../core/images/cy icon.ico" type="image/x-icon">
    <link rel="../stylesheet" href="vendors/FontAwesome/css/all.min.css">
    <link href="../Bootstrap/css/dashboard.css" rel="stylesheet">
    <link href="../Vendors/DataTables/datatables.min.css" rel="stylesheet">
    <link href="../Vendors/Alertify/css/alertify.min.css" rel="stylesheet">
    <link href="../Vendors/Alertify/css/bootstrap.min.css" rel="stylesheet"> 
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="../Bootstrap/css/dashboard.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Control Casinos</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav d-none d-md-block">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3 cytech-cerrarSesionButton" href="#">Cerrar Sesión</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <?php $CyDatos->getMenus(); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- menu superior dentro de la pagina -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Realizar un reporte de una falla en la plataforma</h1>
                </div>
                <section style="background-color: #eee;">
                    <div class="container py-5">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">

                                        <form action="core/utilities/ReportesBugs/levantarReportebug.php" class="form cytech-form">
                                            <label class="form-label">Descripcion corta del problema:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="descripcionReporte"><i class="fa-solid fa-meteor fa-xl"></i></span>
                                                </div>
                                                <input aria-describedby="descripcionReporte" type="text" class="form-control" name="nueva_contra" placeholder="Ejemplo: No se agregan proveedores" required minlength="8">
                                            </div>

                                            <label class="form-label">Descripcion detallada del problema:</label>
                                            <textarea name="descripcionlargaReporte" class="form-control" cols="30" rows="10" required placeholder="Muestra un error en pantalla...."></textarea>
                                            <hr class="hr">
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="bg-info">¡Hola! En esta ventana podrás reportar alguna falla en la plataforma te dejamos un ejemplo de como deberá ser rellenado el formulario
                                    <br>
                                    Descripción corta: No se puede agregar proveedores
                                    <br><br>
                                    Descripción larga: al momento de tratar de añadir un nuevo proveedor
                                    <br>•	La pantalla muerta un error al comunicarse con el servidor de datos
                                    <br>•	La pantalla muestra un error en rojo que no se puede leer
                                    <br>•	La pantalla no muestra nada en pantalla y tampoco se agrega un proveedor
                                    <br>•	Esta falla comenzó en la última actualización
                                    <br>•	Funcionaba bien en la versión 1.2.3
                                </p>

                                <p class="bg-dark"></p>
                            </div>

                        </div>
                    </div>
                </section>

            </main>
        </div>
    </div>

    <script src="../Core/global/js/JQuery.js"></script>
    <script src="../Vendors/Alertify/alertify.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendors/FontAwesome/js/all.min.js"></script>
    <script src="../Vendors/DataTables/datatables.min.js"></script>
    <script src="../Core/global//js/CyTechJS.js"></script>
    <script>
        CyTech.init();
    </script>
</body>

</html>