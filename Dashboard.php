<?php
require_once("core/global/php/CyTechPhp.php");
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
  <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="core/images/cy icon.ico" type="image/x-icon">
  <link rel="stylesheet" href="vendors/FontAwesome/css/all.min.css">
  <link href="Bootstrap/css/dashboard.css" rel="stylesheet">
  <link href="Vendors/DataTables/datatables.min.css" rel="stylesheet">
  <link href="Vendors/Alertify/css/alertify.min.css" rel="stylesheet">
  <link href="Vendors/Alertify/css/bootstrap.min.css" rel="stylesheet">
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
  <link href="Bootstrap/css/dashboard.css" rel="stylesheet">
</head>

<body>
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
        <!-- menu superior dentro de la pagina -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Centro de control</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">menu1</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">menu2</button>
            </div>
          </div>
        </div>

        <!-- contenido de la pagina -->
        <div class="row">
          <div class="col-sm-6 col-lg-6">
            <div class="card">
              <div class="card-header"><h4>Máquinas con mas fallas</h4></div>
              <div class="card-body">
                <ol class="list-group">
                  <?php
                  $masFAllas = new MysqlObj("SELECT r.id_maquina_fk as idmaquinatemp, COUNT(id_reporte) AS total, m.*, mo.* FROM reportes r
                    inner join maquinas m on m.id_maquina = r.id_maquina_fk
                    inner join  modelos mo on mo.id_modelo = m.id_modelo_fk
                    GROUP BY id_maquina_fk ORDER BY total DESC LIMIT 5");
                  while($masdañadasrow = $masFAllas->FetchData()){
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                      '.$masdañadasrow["uid_maquina"].' - '.$masdañadasrow["producto_modelo"].'
                      <span class="text-danger">Total de reportes <i class="fa-solid fa-circle-exclamation fa-beat"></i> '.$masdañadasrow["total"].'</span>
                      </li>';
                  }
                  ?>
                </ol>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-6">
            <div class="card text-white bg-primary">
              <div class="card-header"><h4>Reporte diario</h4></div>
              <div class="card-body">
                <ul>
                  <?php
                    $reporte = new MysqlObj("SELECT * from maquinas m inner join modelos mo on mo.id_modelo = m.id_modelo_fk 
                    inner join proveedores p on p.id_proveedor = mo.id_proveedor_fk
                    inner join reportes r on r.id_maquina_fk = m.id_maquina
                    where m.operativa_maquina = 0 and p.id_casino_fk = '{$CyDatos->IdCasino}'");
                    while($reporteRow = $reporte->FetchData()){
                      echo '<li>UID: <strong>'.$reporteRow["uid_maquina"].'</strong> - '.$reporteRow["producto_modelo"].' - '.$reporteRow["descripcion_reporte"].'</li>';
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <p></p>

          <hr class="hr" />

          <div class="col-sm-6 col-lg-6">
            <div class="card text-white bg-warning">
              <div class="card-header"><h4> Reportes de hoy...</h4></div>
              <div class="card-body">
                <ul>
                  <?php
                    $reporte = new MysqlObj("SELECT * FROM reportes r
                    inner join maquinas m on r.id_maquina_fk = m.id_maquina
                    inner join modelos mo on mo.id_modelo = m.id_modelo_fk
                    inner join proveedores p on p.id_proveedor = mo.id_proveedor_fk
                    inner join usuarios u on u.id_usuario = r.id_usuario_fk
                    where r.f_reporte = curdate() and p.id_casino_fk = '{$CyDatos->IdCasino}'");
                    while($reporteRow = $reporte->FetchData()){
                      echo '<li><strong>'.$reporteRow["nombre_usuario"].' </strong> UID: <strong>'.$reporteRow["uid_maquina"].'</strong> - '.$reporteRow["producto_modelo"].' - '.$reporteRow["descripcion_reporte"].'</li>';
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>

  <script src="Core/global/js/JQuery.js"></script>
  <script src="Vendors/Alertify/alertify.min.js"></script>
  <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendors/FontAwesome/js/all.min.js"></script>
  <script src="Vendors/DataTables/datatables.min.js"></script>
  <script src="Core/global//js/CyTechJS.js"></script>
  <script>
    CyTech.init();
  </script>
</body>

</html>