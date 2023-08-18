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
    <title>Control Casino | Perfil de usuario</title>
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
                    <h1 class="h2">Perfil de usuario</h1>
                </div>
                <section style="background-color: #eee;">
                    <div class="container py-5">

                        <div class="row">
                            <div class="col-lg-4">

                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-gear fa-6x"></i>
                                        <h5 class="my-3"><?php echo $CyDatos->UserName ?></h5>
                                        <p class="text-muted mb-1"><?php echo $CyDatos->RolName ?></p>
                                        <p class="text-muted mb-4"><?php echo $CyDatos->CasinoName ?></p>
                                    </div>
                                </div>

                                <div class="card mb-4 mb-lg-0">
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush rounded-3">
                                            <?php
                                            $nunReportes = new MysqlObj("SELECT count(id_usuario_fk) as num from reportes where id_usuario_fk = '{$CyDatos->IdUser}'");
                                            echo ' <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                        <span><i class="fa-solid fa-flag text-danger"></i> Reportes que has abierto</span>
                                                        <p class="mb-0">' . $nunReportes->FetchData()["num"] . '</p>
                                                    </li>';

                                            $numPruebas = new MysqlObj("SELECT count(id_usuario_fk) as num from pruebas_realizadas where id_usuario_fk = '{$CyDatos->IdUser}'");
                                            echo ' <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                        <span><i class="fa-solid fa-hand-holding-hand text-warning"></i> Pruebas que has realizado</span>
                                                        <p class="mb-0">' . $numPruebas->FetchData()["num"] . '</p>
                                                    </li>';
                                            ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                <span><i class="fa-solid fa-triangle-exclamation text-dark"></i> Cargas por error que has reportado</span>
                                                <p class="mb-0">0</p>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                <span><i class="fa-solid fa-list-check text-primary"></i> Pendientes terminados</span>
                                                <p class="mb-0">0</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">

                                <div class="card mb-4">
                                    <?php
                                    $infoUser = new MysqlObj("SELECT * FROM usuarios where id_usuario = '{$CyDatos->IdUser}'");
                                    $infoUser = $infoUser->FetchData();
                                    ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Nombre Completo</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $infoUser["nombre_usuario"] . ' ' . $infoUser["apellidos_usaurio"]; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $infoUser["email_usuario"]; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Teléfono</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $infoUser["tel_usuario"]; ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Estatus</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <?php echo ($infoUser["estatus_usuario"] == 1) ? '<p class="text-muted mb-0 text-success">Activo</p>' : '<p class="text-muted mb-0 text-danger">Inactivo</p>'; ?>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Domicilio</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $infoUser["domicilio_usuario"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card mb-4 mb-md-0">
                                            <div class="card-body">
                                                <h4>Cambiar Contraseña</h4>
                                                <form action="core/utilities/Perfiles/CambiarContraseñaPerfil.php" class="form cytech-form" autocomplete="off">

                                                    <label class="form-label">Nueva Contraseña:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="nuevacntraincon"><i class="fa-solid fa-shield-halved fa-xl"></i></span>
                                                        </div>
                                                        <input aria-describedby="nuevacntraincon" type="password" class="form-control" name="nueva_contra" placeholder="Nueva Contraseña" required minlength="8">
                                                    </div>

                                                    <label class="form-label">Repite Nueva Contraseña:</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text" id="nuevacntrainconrepit"><i class="fa-solid fa-shield fa-xl"></i></span>
                                                        </div>
                                                        <input aria-describedby="nuevacntrainconrepit" type="password" class="form-control" name="nueva_contra_repit" placeholder="Ponla de nuevo aqui!" required minlength="8">
                                                    </div>
                                                    <hr class="hr" />

                                                    <label class="form-label">Contraseña actual:</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text" id="contraAnterior"><i class="fa-solid fa-user-shield fa-xl"></i></span>
                                                        </div>
                                                        <input aria-describedby="contraAnterior" type="password" class="form-control" name="anterior_contra" placeholder="Contraseña actual" required>
                                                    </div>
                                                    <br>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Cambiar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-4 mb-md-0">
                                            <div class="card-body">
                                                <h5>¿Necesitas algun cambio en la plataforma <i class="fa-solid fa-lightbulb text-warning"></i>?</h5>
                                                <form action="core/utilities/Perfiles/PedirCambioPlataforma.php" class="form cytech-form" autocomplete="off">
                                                    <label class="form-label">Explicanos que cambio crees que sea necesario:</label>
                                                    <textarea class="form-control" name="cambio" rows="3" required></textarea>
                                                    <br>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                                    </div>
                                                </form>
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