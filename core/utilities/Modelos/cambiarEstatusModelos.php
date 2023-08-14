<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$est = ($_POST['estatus'] == "0") ? "1":"0";
$query = new MysqlObj("UPDATE modelos SET estatus_modelo = '".$est."' WHERE id_modelo = '".$_POST["id"]."'");
if($query->res){
    echo '{"estatus":"success", "mensaje":"Estatus del modelo ha sido cambiado", "reload":"true"}';
}
else{
    echo '{"estatus":"error", "mensaje":"Error al cambiar el estatus del modelo", "reload":"null"}';
}


?>