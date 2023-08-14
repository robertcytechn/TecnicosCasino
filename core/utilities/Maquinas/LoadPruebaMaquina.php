<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

$reporte = new MysqlObj("SELECT * FROM reportes WHERE id_maquina_fk = '".$_POST["id"]."' AND proceso_reporte != 0");
$infoReporte = $reporte->FetchData();

$maquina = new MysqlObj("SELECT * FROM maquinas WHERE id_maquina = '".$_POST["id"]."'");
$infoMaquina = $maquina->FetchData();

$formulario = '<input type="hidden" name="id_report" value="'.$infoReporte["id_reporte"].'">
<input type="hidden" name="id_maquina_report" value="'.$infoMaquina["id_maquina"].'">
<p class="text-dark">Preuba realizada para el reporte levantado el dia: <span class="text-danger">'.$infoReporte["f_reporte"].' y  en la hora: '.$infoReporte["h_reporte"].'</span></p>
<div class="form-group">
  <label for="areaTextDescripcionPrueba">Descripción de las pruebas realizadas a la maquina con UID: '.$infoMaquina["uid_maquina"].'</label>
  <textarea class="form-control" id="areaTextDescripcionPrueba" name="areaTextDescripcionPrueba" rows="5" required></textarea>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="switchOperativa" name="switchOperativa">
  <label class="form-check-label" for="switchOperativa">La máquina quedó operativa?</label>
</div>';

echo $formulario;
?>