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
    <title>Control Casino | Proveedores</title>
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../core/images/cy icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../FontAwesome/css/all.min.css">
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
  </head>
  <body>

  <!-- Modal para agregar maquinas -->
<div class="modal fade" id="ModalAgregarMaquina" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar un Proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/Bootstrap/hh.php" class="form cytech-form">
          <label class="form-label">Nombre del Proveedor:</label>
          <input type="text" class="form-control" name="nombre_proveedor" placeholder="Ejemplo: Las del sol" required>
          <label class="form-label">Email del proveedor:</label>
          <input type="email" class="form-control" name="email_proveedor" placeholder="Ejemplo: tec@lasdelsol.com" required>
          <label class="form-label">Teléfono del proveedor:</label>
          <input type="number" class="form-control" name="email_proveedor" placeholder="Ejemplo: 4421231234" required>
          <label class="form-label">Razón Social del proveedor:</label>
          <input type="text" class="form-control" name="email_proveedor" placeholder="Ejemplo: Las del sol SA de CV" required>
          <hr>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="switchEstatus" checked>
            <label class="form-check-label" for="switchEstatus">Activar inmediatamente</label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Control Casinos</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav d-none d-md-block">
  <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Cerrar Sesión</a>
  </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <?php $CyDatos->getMenus(); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Proveedores</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#ModalAgregarMaquina">Agregar</button>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header"><div id="botones_especiales"></div></div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <table id="tablaMisProveedores" data-link="core/utilities/TablaProveedores.php" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Nombre del proveedor</th>
                    <th>Teléfono</th>
                    <th>E-Mail</th>
                    <th>Razón social</th>
                    <th>Activo</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
          </blockquote>
        </div>
      </div>

    </main>
  </div>
</div>

    <script src="../Core/global/js/JQuery.js"></script>
    <script src="../Vendors/Alertify/alertify.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../FontAwesome/js/all.min.js"></script>
    <script src="../Vendors/DataTables/datatables.min.js"></script>
    <script src="../Core/global//js/CyTechJS.js"></script>
    <script>
      CyTech.init();
      CyTech.DataTables($("#tablaMisProveedores"),$("#botones_especiales"));
      alertify.alert("¡Bienvenido a la sección de proveedores!", function(){ alertify.success('Ok'); });
    </script>
  </body>
</html>