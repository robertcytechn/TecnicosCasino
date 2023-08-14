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
  <link rel="stylesheet" href="../Vendors/FontAwesome/css/all.min.css">
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
          <h5 class="modal-title" id="exampleModalLabel">Agregar una maquina</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="alert alert-warning" role="alert">
            <i class="fas fa-exclamation-triangle"></i> <strong>¡Atención!</strong> Los datos que se agreguen a
            continuación serán guardados en la base de datos, por lo que no se podrán modificar. Verifique que los datos
            sean correctos antes de continuar.
          </div>
          <form action="/core/utilities/Maquinas/AgregarNuevaMaquina.php" class="form cytech-formAlterTable" data-table="tablaMisMaquinas" data-modal="ModalAgregarMaquina">
            <label class="form-label">UID de la maquina</label>
            <input type="number" class="form-control" name="uid_maquina" placeholder="Ejemplo: 325" required
              autocomplete="off">
            <label class="form-label">IP de la maquina</label>
            <input type="text" class="form-control" name="ip_maquina" placeholder="Ejemplo: 172.16.5.23" required
              autocomplete="off">
            <label class="form-label">Serie de la maquina</label>
            <input type="text" class="form-control" name="serie_maquina" placeholder="Ejemplo: WMS2245785" required
              autocomplete="off">
            <label class="form-label">Juego de la maquina</label>
            <input type="text" class="form-control" name="juego_maquina" placeholder="Ejemplo: Multi-juegos" required>

            <label class="form-label">Proveedor de la maquina</label>
            <select class="form-select select-option-change"
              data-link="core/utilities/Maquinas/cargar_modelos_select.php" name="id_proveedor" id="id_proveedor_select"
              required>
              <option selected value="">Selecciona un proveedor</option>
              <?php
            $proveedores_opciones = new MysqlObj("select * from proveedores where estatus_proveedor = 1 and id_casino_fk = ".$CyDatos->IdCasino." order by nombre_proveedor asc");
            while($proveedor = $proveedores_opciones->FetchData()){
              echo '<option value="'.$proveedor['id_proveedor'].'">'.$proveedor['nombre_proveedor'].'</option>';
            }
            ?>
            </select>
            <label class="form-label">Modelo de la maquina</label>
            <select class="form-select select-option-load" name="id_modelo_select" id="id_modelo_select" required>
              <option selected value="">Selecciona un Proveedor</option>
            </select>
            <hr>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="switchEstatus" name="switchEstatus" checked>
              <label class="form-check-label" for="switchEstatus">La máquina está activa</label>
            </div>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="switchOperativa" name="switchOperativa" checked>
              <label class="form-check-label" for="switchOperativa">La máquina está operativa</label>
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
  <!-- Modal para editar maquinas -->
  <div class="modal fade" id="ModalEditarMaquina" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar maquina</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="alert alert-warning" role="alert">
            <i class="fas fa-exclamation-triangle"></i> <strong>¡Atención!</strong>
            Estas apunto de actualizar los datos de la maquina, verifica que los datos sean correctos antes de
            continuar.
          </div>
          <form action="/core/utilities/Maquinas/EditarMaquina.php" class="form cytech-formAlterTable" data-table="tablaMisMaquinas" data-modal="ModalEditarMaquina">
            <div id="load-edit-div"></div>
            <label class="form-label">Proveedor de la maquina</label>
            <select class="form-select select-option-change"
              data-link="core/utilities/Maquinas/cargar_modelos_select.php" name="id_proveedor" id="id_proveedor_select"
              required>
              <option selected value="">Selecciona un proveedor</option>
              <?php
            $proveedores_opciones = new MysqlObj("select * from proveedores where estatus_proveedor = 1 and id_casino_fk = ".$CyDatos->IdCasino." order by nombre_proveedor asc");
            while($proveedor = $proveedores_opciones->FetchData()){
              echo '<option value="'.$proveedor['id_proveedor'].'">'.$proveedor['nombre_proveedor'].'</option>';
            }
            ?>
            </select>
            <label class="form-label">Modelo de la maquina</label>
            <select class="form-select select-option-load" name="id_modelo_select" id="id_modelo_select" required>
              <option selected value="">Selecciona un Proveedor</option>
            </select>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- Modal para ver informacion de la maquinas -->
  <div class="modal fade" id="ModalVerMaquina" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">información de la maquina</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="#$" class="form cytech-form">
            <div id="load-ver-div"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal para crear un reporte maquinas -->
  <div class="modal fade" id="ModalReporteMaquina" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Generar un reporte para la maquina</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/core/utilities/Maquinas/ReportarMaquina.php" class="form cytech-formAlterTable" data-table="tablaMisMaquinas" data-modal="ModalReporteMaquina">
            <div id="load-reporte-div"></div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-danger">Reportar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal para crear una prueba para una maquina maquinas -->
  <div class="modal fade" id="ModalPruebaMaquina" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Generar una prueba para la maquina</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/core/utilities/Maquinas/PruebaMaquina.php" class="form cytech-formAlterTable" data-table="tablaMisMaquinas" data-modal="ModalPruebaMaquina">
            <div id="load-prueba-div"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-danger">Agregar Prueba</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal para ver el historial de una maquina maquinas -->
  <div class="modal fade modal-lg" id="ModalHistorialMaquina" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Historial de reportes de la máquina</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="load-historial-div"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Control Casinos</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
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
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Mis Maquinas</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#ModalAgregarMaquina">Agregar</button>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <div id="botones_especiales"></div>
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <table id="tablaMisMaquinas" data-link="core/utilities/Maquinas/TablaMisMaquinas.php"
                class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Modelo</th>
                    <th>Producto</th>
                    <th>IP</th>
                    <th>Serie</th>
                    <th>Proveedor</th>
                    <th>operativa</th>
                    <th>Acciones</th>
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
  <script src="../Vendors/FontAwesome/js/all.min.js"></script>
  <script src="../Vendors/DataTables/datatables.js"></script>
  <script src="../Core/global//js/CyTechJS.js"></script>
  <script>
    CyTech.init();
    CyTech.DataTables($("#tablaMisMaquinas"), $("#botones_especiales"));
  </script>
</body>

</html>