<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

$Maquina = new MysqlObj("SELECT * FROM maquinas m
inner join modelos mo on m.id_modelo_fk = mo.id_modelo
inner join proveedores p on p.id_proveedor = mo.id_proveedor_fk
where m.id_maquina = '".$_POST["id"]."'");

$rows = $Maquina->FetchData();
$operativa = ($rows["operativa_maquina"] == 1)?"<span class='badge bg-success'>Operativa</span>":"<span class='badge bg-danger'>Dañada</span>";
$estatus = ($rows["estatus_maquina"] == 1)?"<span class='badge bg-success'>Activa</span>":"<span class='badge bg-danger'>Inactiva</span>";

$informacion = '<p class="text-dark">UID:  <span class="text-primary font-weight-bold">'.$rows["uid_maquina"].'</span></p>';
$informacion .= '<p class="text-dark">Modelo:  <span class="text-primary font-weight-bold">'.$rows["nombre_modelo"].'</span></p>';
$informacion .= '<p class="text-dark">Producto:  <span class="text-primary font-weight-bold">'.$rows["producto_modelo"].'</span></p>';
$informacion .= '<p class="text-dark">IP:  <span class="text-primary font-weight-bold">'.$rows["ip_maquina"].'</span></p>';
$informacion .= '<p class="text-dark">Serie:  <span class="text-primary font-weight-bold">'.$rows["serie_maquina"].'</span></p>';
$informacion .= '<p class="text-dark">Proveedor:  <span class="text-primary font-weight-bold">'.$rows["nombre_proveedor"].'</span></p>';
$informacion .= '<p class="text-dark">Operativa:  <span class="text-primary font-weight-bold">'.$operativa.'</span></p>';
$informacion .= '<p class="text-dark">Estatus:  <span class="text-primary font-weight-bold">'.$estatus.'</span></p>';




echo $informacion;

?>