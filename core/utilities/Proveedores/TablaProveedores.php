<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$proveedores =  new MysqlObj("SELECT * FROM casino.proveedores where id_casinos_fk ='".$CyDatos->IdCasino."'");

$resultado = '{"data":[';
$cont = 0;

while ($rows = $proveedores->FetchData()){
    if($cont > 0){
        $resultado .= ',';
    }
    $btn_estatus = ($rows["estatus_proveedores"] == 1) ?
        "<input data-estatus='1' data-id='{$rows["id_proveedores"]}' data-urlAction='core/utilities/Proveedores/cambiarEstatusProveedores.php' class='btnCambiarEstatus form-check-input' type='checkbox' id='switchEstatus' checked> <label class='form-check-label' for='switchEstatus'> Activo</label>" :
        "<input data-estatus='0' data-id='{$rows["id_proveedores"]}' data-urlAction='core/utilities/Proveedores/cambiarEstatusProveedores.php' class='btnCambiarEstatus form-check-input' type='checkbox' id='switchEstatus'> <label class='form-check-label' for='switchEstatus'> Eliminado</label>" ;
    $resultado .= '[
        "'.$rows["nombre_proveedores"].'",
        "'.$rows["tel_proveedores"].'",
        "'.$rows["email_proveedores"].'",
        "'.$rows["razonsocial_proveedores"].'",
        "'.$btn_estatus.'"
        ]';
    $cont +=1;
}
$resultado .=']}';
echo $resultado;
?>