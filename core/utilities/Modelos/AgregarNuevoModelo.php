<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$fechah = $CyDatos->HoraFecha();
$estatus = (isset($_POST["switchEstatus"]))?1:0;

$duplicado = new MysqlObj("SELECT * FROM `modelos_maquinas` WHERE `nombre_modelo` LIKE '{$_POST["nombre_modelo"]}' AND `id_proveedor_fk` = '{$_POST["id_proveedor"]}'");
if($duplicado->NumeroFilas() > 0){
    echo '{"estatus":"warning", "mensaje":"Ya existe un modelo con ese nombre para ese proveedor y no puedo ser agregado", "redirect":"null"}';
    exit;
}

$query = "INSERT INTO `casino`.`modelos_maquinas` (`nombre_modelo`, `descripcion_modelo`, `producto_modelo`, `estatus_modelo`, `fecha_c_modelo`, `hora_c_modelo`, `id_proveedor_fk`, `id_usuario_fk`)
VALUES ('".$_POST["nombre_modelo"]."', '".$_POST["descripcion_modelo"]."', '".$_POST["producto_modelo"]."', '".$estatus."', '".$fechah[0]."', '".$fechah[1]."', '".$_POST["id_proveedor"]."', '".$CyDatos->IdUser."')";

if($agregarModelo =  new MysqlObj($query)){
    echo '{"estatus":"success", "mensaje":"Modelo agregado correctamente", "redirect":"'.URLSERVER.'/Modelos/"}';
}else{
    echo '{"estatus":"error", "mensaje":"Error al agregar modelo", "redirect":"null"}';
}
?>