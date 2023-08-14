<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$proveedores =  new MysqlObj("SELECT * FROM modelos m inner join proveedores p on m.id_proveedor_fk = p.id_proveedor where p.id_casino_fk ='".$CyDatos->IdCasino."'");

$resultado = '{"data":[';
$cont = 0;

while ($rows = $proveedores->FetchData()){
    if($cont > 0){
        $resultado .= ',';
    }
    $btn_estatus = ($rows["estatus_modelo"] == 1) ?
        "<input data-estatus='1' data-id='{$rows["id_modelo"]}' data-urlAction='core/utilities/Modelos/cambiarEstatusModelos.php' class='btnCambiarEstatus form-check-input' type='checkbox' id='switchEstatus' checked> <label class='form-check-label badge bg-success' for='switchEstatus'> Activo</label>" :
        "<input data-estatus='0' data-id='{$rows["id_modelo"]}' data-urlAction='core/utilities/Modelos/cambiarEstatusModelos.php' class='btnCambiarEstatus form-check-input' type='checkbox' id='switchEstatus'> <label class='form-check-label badge bg-danger' for='switchEstatus'> Eliminado</label>" ;
    $resultado .= '[
        "'.$rows["nombre_modelo"].'",
        "'.$rows["descripcion_modelo"].'",
        "'.$rows["producto_modelo"].'",
        "'.$rows["nombre_proveedor"].'",
        "'.$btn_estatus.'"
        ]';
    $cont +=1;
}
$resultado .=']}';
echo $resultado;
?>