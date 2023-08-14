<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

$Maquinas = new MysqlObj("SELECT * FROM maquinas m 
INNER JOIN reportes r ON r.id_maquina_fk = m.id_maquina
WHERE m.id_maquina = '".$_POST["id_maquina_report"]."' AND r.proceso_reporte != '0'");
if($Maquinas->NumeroFilas() > 0){
    echo '{"estatus":"danger", "mensaje":"Ya hay un reporte abierto apra esta maquina, recomendamos recargar la pagina para lebantar una prueba reañizada", "redirect":"null"}';
    exit;
}
$operativa = (isset($_POST["switchOperativa"]))?1:0;
$procesoReporte = ($operativa == 1)?0:1;
$crearReporte = "INSERT INTO `reportes` (`id_maquina_fk`, `descripcion_reporte`,  `proceso_reporte`, `id_usuario_fk`)
VALUES ('".$_POST["id_maquina_report"]."', '".$_POST["areaTextDescripcionReporte"]."', '".$procesoReporte."', ".$CyDatos->IdUser.");";
if($reporte = new MysqlObj($crearReporte)){
    if($operativa == 0){
        $actualizarMaquina = "UPDATE `maquinas` SET `operativa_maquina` = '0' WHERE `id_maquina` = '".$_POST["id_maquina_report"]."';";
        $actualizarMaquina = new MysqlObj($actualizarMaquina);
    }
    echo '{"estatus":"success", "mensaje":"Reporte levantado con exito", "reload":"true"}';
    exit;
}else{
    echo '{"estatus":"danger", "mensaje":"Error al levantar reporte, intente de nuevo", "reload":"null"}';
    exit;
}

?>