<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

$Maquinas = new MysqlObj("SELECT * FROM maquinas m WHERE m.id_maquina = '".$_POST["id"]."'");
$infoMaquina = $Maquinas->FetchData();
$formulario = '<input type="hidden" name="id_maquina_report" value="'.$_POST["id"].'">
<p class="text-dark">Se levantara reporte para la maquina con UID <span class="text-danger">'.$infoMaquina["uid_maquina"].'</span></p>
<div class="form-group">
  <label for="areaTextDescripcionReporte">Descripción de porque la maquina fallo</label>
  <textarea class="form-control" id="areaTextDescripcionReporte" name="areaTextDescripcionReporte" rows="5"></textarea>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="switchOperativa" name="switchOperativa">
  <label class="form-check-label" for="switchOperativa">La máquina está operativa</label>
</div>';

echo $formulario;
?>