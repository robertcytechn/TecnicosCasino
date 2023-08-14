<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

$Maquina = new MysqlObj("SELECT * FROM maquinas m
inner join modelos mo on m.id_modelo_fk = mo.id_modelo
inner join proveedores p on p.id_proveedor = mo.id_proveedor_fk
where m.id_maquina = '".$_POST["id"]."'");

$rows = $Maquina->FetchData();
$estatus = ($rows["estatus_maquina"] == 1)?"checked":"";

$operativa = ($rows["operativa_maquina"] == 1)?"checked":"";

$formualrio = '<label class="form-label">UID de la maquina</label>
<input type="text" name="id_maquina_edit" required  value="'.$rows["id_maquina"].'" hidden>
<input type="number" class="form-control" name="uid_maquina_edit" placeholder="Ejemplo: 325" required autocomplete="off" value="'.$rows["uid_maquina"].'">
<label class="form-label">IP de la maquina</label>
<input type="text" class="form-control" name="ip_maquina_edit" placeholder="Ejemplo: 172.16.5.23" required autocomplete="off" value="'.$rows["ip_maquina"].'">
<label class="form-label">Serie de la maquina</label>
<input type="text" class="form-control" name="serie_maquina_edit" placeholder="Ejemplo: WMS2245785" required autocomplete="off" value="'.$rows["serie_maquina"].'">
<label class="form-label">Juego de la maquina</label>
<input type="text" class="form-control" name="juego_maquina_edit" placeholder="Ejemplo: Multi-juegos"required value="'.$rows["juego_maquina"].'">

<label class="form-label danger">Proveedor de la maquina no es posible cambiarlo</label>
<hr>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="switchEstatus_edit" name="switchEstatus_edit" '.$estatus.'>
  <label class="form-check-label" for="switchEstatus">La máquina está activa</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="switchOperativa_edit" name="switchOperativa_edit" '.$operativa.'>
  <label class="form-check-label" for="switchOperativa">La máquina está operativa</label>
</div>';
echo $formualrio;
?>