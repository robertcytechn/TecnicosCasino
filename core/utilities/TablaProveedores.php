<?php
require_once("../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$proveedores =  new MysqlObj("SELECT p.* FROM proveedores p
inner join usuarios u on p.id_usuarios_fk = u.id_usuarios
inner join roles_usuarios r on r.id_roles = u.id_roles_roles
inner join casinos c on c.id_casinos = r.id_casinos_fk
where c.id_casinos = '".$CyDatos->IdCasino."'");

$resultado = '{"data":[';
$cont = 0;

while ($rows = $proveedores->FetchData()){
    if($cont > 0){
        $resultado .= ',';
    }
    $btn_estatus = ($rows["estatus"] == 1) ?
        "<input data-estatus='1' data-id='{$rows["id_proveedores"]}' data-urlAction='core/utilities/cambiarEstatusProveedores.php' class='btnCambiarEstatus form-check-input' type='checkbox' id='switchEstatus' checked> <label class='form-check-label' for='switchEstatus'> Activo</label>" :
        "<input data-estatus='0' data-id='{$rows["id_proveedores"]}' data-urlAction='core/utilities/cambiarEstatusProveedores.php' class='btnCambiarEstatus form-check-input' type='checkbox' id='switchEstatus'> <label class='form-check-label' for='switchEstatus'> Eliminado</label>" ;
    $resultado .= '[
        "'.$rows["nombre_proveedores"].'",
        "'.$rows["telefono_proveedores"].'",
        "'.$rows["email_proveedores"].'",
        "'.$rows["razon_social_proveedor"].'",
        "'.$btn_estatus.'"
        ]';
    $cont +=1;
}
$resultado .=']}';
echo $resultado;
?>