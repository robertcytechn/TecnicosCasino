<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$fechah = $CyDatos->HoraFecha();
$estatus = (isset($_POST["switchEstatus"]))?1:0;

$duplicado = new MysqlObj("SELECT * FROM `modelos` m 
INNER JOIN `proveedores` p ON m.id_proveedor_fk = p.id_proveedor
WHERE `nombre_modelo` LIKE '{$_POST["nombre_modelo"]}' AND `id_proveedor_fk` = '{$_POST["id_proveedor"]}' AND id_casino_fk = '{$CyDatos->IdCasino}' AND m.estatus_modelo = '1'");

if($duplicado->NumeroFilas() > 0){
    echo '{"estatus":"warning", "mensaje":"Ya existe un modelo con ese nombre para ese proveedor y no puede ser agregado", "reload":"null"}';
    exit;
}

$query = "INSERT INTO `modelos` (`nombre_modelo`, `descripcion_modelo`, `producto_modelo`, `estatus_modelo`, `id_proveedor_fk`)
VALUES ('".$_POST["nombre_modelo"]."', '".$_POST["descripcion_modelo"]."', '".$_POST["producto_modelo"]."', '".$estatus."', '".$_POST["id_proveedor"]."')";

if($agregarModelo =  new MysqlObj($query)){
    echo '{"estatus":"success", "mensaje":"Modelo agregado correctamente", "reload":"true"}';
}else{
    echo '{"estatus":"error", "mensaje":"Error al agregar modelo contacta al administardor de sistemas", "reload":"null"}';
}
?>