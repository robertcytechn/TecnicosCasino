<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$fechah = $CyDatos->HoraFecha();
$estatus = (isset($_POST["switchEstatus"]))?1:0;

$duplicado  = new MysqlObj("SELECT * FROM `proveedores` WHERE `nombre_proveedor` LIKE '{$_POST["nombre_proveedor"]}' AND `id_casino_fk` = '{$CyDatos->IdCasino}'");
if($duplicado->NumeroFilas() > 0){
    echo '{"estatus":"warning", "mensaje":"Ya existe un proveedor con ese nombre, no será agregado", "redirect":"null"}';
    exit;
}
$query = "INSERT INTO `proveedores` (`nombre_proveedor`, `telefono_proveedor`, `email_proveedor`, `razon_social_proveedor`, `estatus_proveedor`, `fecha_c_proveedor`, `hora_c_proveedor`, `id_casino_fk`, `id_usuario_fk`)
VALUES ('{$_POST["nombre_proveedor"]}', '{$_POST["telefono_proveedor"]}', '{$_POST["email_proveedor"]}', '{$_POST["razonS_proveedor"]}', '{$estatus}',
'{$fechah[0]}', '{$fechah[1]}', '{$CyDatos->IdCasino}', '{$CyDatos->IdUser}');";

if($agregarProveedor =  new MysqlObj($query)){
    echo '{"estatus":"success", "mensaje":"Proveedor agregado correctamente", "redirect":"'.URLSERVER.'/Proveedores/"}';
}else{
    echo '{"estatus":"error", "mensaje":"Error al agregar proveedor", "redirect":"null"}';
}
?>