<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

$est = ($_POST['estatus'] == "0") ? "1":"0";
$query = new MysqlObj("UPDATE proveedores SET estatus_proveedores = '".$est."' WHERE id_proveedores = '".$_POST["id"]."'");

if($query->res){
    echo '{"estatus":"success", "mensaje":"Estatus del proveedor ha sido cambiado", "redirect":"null"}';
}
else{
    echo '{"estatus":"error", "mensaje":"Error al cambiar el estatus del proveedor", "redirect":"null"}';
}
?>