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
    <link rel="stylesheet" href="../vendors/FontAwesome/css/all.min.css">
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
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Control Casinos</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
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
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Soporte y ayuda...</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                    </div>
                </div>

                <!-- contenido de la pagina -->
                <section class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="accordion" id="accordionExample">

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="HeadControlCasino">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#AcercaControlCasino" aria-expanded="true"
                                                    aria-controls="AcercaControlCasino">
                                                    Acerca de Control Casino <i class="fa-solid fa-gears fa-spin text-primary"></i>
                                                </button>
                                            </h2>
                                            <div id="AcercaControlCasino" class="accordion-collapse collapse show"
                                                aria-labelledby="HeadControlCasino" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>El software Control Casino</strong> Es un programa diseñado para llevar el control de los errores, fallas y problemas relacionados con las maquinas del casino.
                                                    <br>
                                                    Generar reportes y estadisticas de los problemas mas comunes y frecuentes.
                                                    <br>
                                                    lleva el control de los procesos que realizan los tecnicos, asi como las pruebas que se realizan a las maquinas.
                                                    <br>
                                                    Tambien otorga informacion de las maquinas que estan actualmente en proceso de reparacion, con falla o totalmente operativas.
                                                    <br>
                                                    Informa y genera estadisticas de las fallas mas comunes y de las maquinas que mas fallan
                                                    <br>
                                                    Integra un sistema de control de inventario para los insumos o materiales de tecnicos, por ejemplo cintas, tornillos, piezas, etc.

                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    Accordion Item #2
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>This is the second item's accordion body.</strong> It is
                                                    hidden by default, until the collapse plugin adds the appropriate
                                                    classes that we use to style each element. These classes control the
                                                    overall appearance, as well as the showing and hiding via CSS
                                                    transitions. You can modify any of this with custom CSS or
                                                    overriding our default variables. It's also worth noting that just
                                                    about any HTML can go within the <code>.accordion-body</code>,
                                                    though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    Accordion Item #3
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>This is the third item's accordion body.</strong> It is
                                                    hidden by default, until the collapse plugin adds the appropriate
                                                    classes that we use to style each element. These classes control the
                                                    overall appearance, as well as the showing and hiding via CSS
                                                    transitions. You can modify any of this with custom CSS or
                                                    overriding our default variables. It's also worth noting that just
                                                    about any HTML can go within the <code>.accordion-body</code>,
                                                    though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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