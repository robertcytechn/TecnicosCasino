<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

$Maquina = new MysqlObj("SELECT * FROM casino.reportes_bugs WHERE id_reporte_bug = '".$_POST["id"]."'");

$rows = $Maquina->FetchData();
$estatus = ($rows["estatus_reporte_bug"] == 1)?"<span class='badge bg-success'>terminado</span>":"<span class='badge bg-danger'>Pendiente de reparar</span>";

$informacion = '<p class="text-dark">Descriptcion:  <span class="text-primary font-weight-bold">'.$rows["descripcion_reporte_bug"].'</span></p>';
$informacion .= '<p class="text-dark">Contenido:  <span class="text-primary font-weight-bold">'.$rows["contenido_reporte_bug"].'</span></p>';
$informacion .= '<p class="text-dark">Estatus:  <span class="text-primary font-weight-bold">'.$estatus.'</span></p>';




echo $informacion;

?>