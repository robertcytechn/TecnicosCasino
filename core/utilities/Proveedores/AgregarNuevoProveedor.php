<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$fechah = $CyDatos->HoraFecha();
$estatus = (isset($_POST["switchEstatus"]))?1:0;

$duplicado  = new MysqlObj("SELECT * FROM `proveedores` WHERE `nombre_proveedor` LIKE '{$_POST["nombre_proveedor"]}' AND `id_casino_fk` = '{$CyDatos->IdCasino}' AND `estatus_proveedor` = '1'");
if($duplicado->NumeroFilas() > 0){
    echo '{"estatus":"warning", "mensaje":"Ya existe un proveedor con ese nombre, no será agregado", "reload":"null"}';
    exit;
}
$query = "INSERT INTO `proveedores` (`nombre_proveedor`, `tel_proveedor`, `email_proveedor`, `razonsocial_proveedor`, `estatus_proveedor`,  `id_casino_fk`)
VALUES ('{$_POST["nombre_proveedor"]}', '{$_POST["telefono_proveedor"]}', '{$_POST["email_proveedor"]}', '{$_POST["razonS_proveedor"]}', '{$estatus}', '{$CyDatos->IdCasino}');";

if($agregarProveedor =  new MysqlObj($query)){
    echo '{"estatus":"success", "mensaje":"Proveedor agregado correctamente", "reload":"true"}';
}else{
    echo '{"estatus":"error", "mensaje":"Error al agregar proveedor", "reload":"null"}';
}
?>