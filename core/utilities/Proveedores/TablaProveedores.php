<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$proveedores =  new MysqlObj("SELECT * FROM proveedores where id_casino_fk ='".$CyDatos->IdCasino."'");

$resultado = '{"data":[';
$cont = 0;

while ($rows = $proveedores->FetchData()){
    if($cont > 0){
        $resultado .= ',';
    }
    $btn_estatus = ($rows["estatus_proveedor"] == 1) ?
        "<input data-estatus='1' data-id='{$rows["id_proveedor"]}' data-urlAction='core/utilities/Proveedores/cambiarEstatusProveedores.php' class='btnCambiarEstatus form-check-input' type='checkbox' id='switchEstatus' checked> <label class='form-check-label' for='switchEstatus'> Activo</label>" :
        "<input data-estatus='0' data-id='{$rows["id_proveedor"]}' data-urlAction='core/utilities/Proveedores/cambiarEstatusProveedores.php' class='btnCambiarEstatus form-check-input' type='checkbox' id='switchEstatus'> <label class='form-check-label' for='switchEstatus'> Eliminado</label>" ;
    $resultado .= '[
        "'.$rows["nombre_proveedor"].'",
        "'.$rows["telefono_proveedor"].'",
        "'.$rows["email_proveedor"].'",
        "'.$rows["razon_social_proveedor"].'",
        "'.$btn_estatus.'"
        ]';
    $cont +=1;
}
$resultado .=']}';
echo $resultado;
?>