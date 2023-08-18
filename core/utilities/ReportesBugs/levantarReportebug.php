<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

//agregamos un reporte bug a la tabla en base de datos

$reportebug = "INSERT INTO `reportes_bugs` (`descripcion_reporte_bug`, `contenido_reporte_bug`, `estatus_reporte_bug`, `id_usuario_fk`, `id_casino_fk`) 
               VALUES ('{$_POST["descripcioncorta"]}', '{$_POST["descripcionlargaReporte"]}', '0', '{$CyDatos->IdUser}', '{$CyDatos->IdCasino}');";
if($reportebug = new MysqlObj($reportebug)){
    echo '{"estatus":"success", "mensaje":"El reporte del problema fue enviada correctamente, gracias!", "redirect":"reset"}';
}else{
    echo '{"estatus":"error", "mensaje":"Error al enviar el reporte el reporte bug", "redirect":"null"}';
}

?>