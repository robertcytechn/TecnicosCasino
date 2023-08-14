<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

$operativa = (isset($_POST["switchOperativa"]))?1:0;
//insertamos una prueba realizada
$prueba = new MysqlObj("INSERT INTO `casino`.`pruebas_realizadas` (`descripcion_prueba`, `id_reporte_fk`, `id_usuario_fk`) 
VALUES ('{$_POST["areaTextDescripcionPrueba"]}', '{$_POST["id_report"]}', '{$CyDatos->IdUser}')");
//actualizamos el reporte
if($operativa == 1){
  if($reporte = new MysqlObj("UPDATE reportes SET proceso_reporte = 0 WHERE id_reporte = '".$_POST["id_report"]."'")){
    echo '{"estatus":"success", "mensaje":"Prueba agregada correctamente", "reload":"true"}';
  }else{
    echo '{"estatus":"danger", "mensaje":"Error al agregar prueba, intente de nuevo", "reload":"null"}';
  }
//actualizamos la maquina
$maquina = new MysqlObj("UPDATE maquinas SET operativa_maquina = '".$operativa."' WHERE id_maquina = '".$_POST["id_maquina_report"]."'");
}else{
  if($reporte = new MysqlObj("UPDATE reportes SET proceso_reporte = 3 WHERE id_reporte = '".$_POST["id_report"]."'")){
    echo '{"estatus":"success", "mensaje":"Prueba agregada correctamente", "reload":"true"}';
  }
  else{
    echo '{"estatus":"danger", "mensaje":"Error al agregar prueba, intente de nuevo", "reload":"null"}';
  }
}
?>