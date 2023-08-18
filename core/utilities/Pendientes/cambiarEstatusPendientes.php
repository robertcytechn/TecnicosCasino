<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

$est = ($_POST['estatus'] == "0") ? "1":"0";
$query = new MysqlObj("UPDATE `reportes_bugs` SET `estatus_reporte_bug` = '{$est}' WHERE id_reporte_bug = '".$_POST["id"]."'");

if($query->res){
    echo '{"estatus":"success", "mensaje":"Estatus del pendiente ha sido cambiado", "reload":"true"}';
}
else{
    echo '{"estatus":"error", "mensaje":"Error al cambiar el estatus del pendiente", "reload":"null"}';
}
?>