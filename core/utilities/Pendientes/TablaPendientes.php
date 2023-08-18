<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$proveedores =  new MysqlObj("SELECT * FROM reportes_bugs;");

$resultado = '{"data":[';
$cont = 0;


while ($rows = $proveedores->FetchData()){
    if($cont > 0){
        $resultado .= ',';
    }
    $btn_estatus = "<div class='btn-group' role='group' aria-label='Acciónes'>";
    $btn_estatus .= ($rows["estatus_reporte_bug"] == 1) ?
        "<input data-estatus='1' data-id='{$rows["id_reporte_bug"]}' data-urlAction='core/utilities/Pendientes/cambiarEstatusPendientes.php' class='btnCambiarEstatus form-check-input' type='checkbox' id='switchEstatus' checked> <label class='form-check-label badge bg-success' for='switchEstatus'> Terminado</label>" :
        "<input data-estatus='0' data-id='{$rows["id_reporte_bug"]}' data-urlAction='core/utilities/Pendientes/cambiarEstatusPendientes.php' class='btnCambiarEstatus form-check-input' type='checkbox' id='switchEstatus'> <label class='form-check-label badge bg-danger' for='switchEstatus'> Pendiente</label>" ;

    $btn_estatus .= "<button type='button' class='btn btn-sm btn-info cytech-load-content' data-bs-toggle='modal' data-bs-target='#ModalInfoPendiente' data-id='{$rows["id_reporte_bug"]}' data-link='core/utilities/Pendientes/Cargar_aVerPendiente.php' data-div-load='load-ver-div'>Ver</button>";
    $btn_estatus .= "</div>";
    $resultado .= '[
        "'.$rows["descripcion_reporte_bug"].'",
        "'.$rows["contenido_reporte_bug"].'",
        "'.$btn_estatus.'"
        ]';
    $cont +=1;
}
$resultado .=']}';
echo $resultado;

?>