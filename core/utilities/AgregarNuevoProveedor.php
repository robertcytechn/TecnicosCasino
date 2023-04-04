<?php
require_once("../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$fechah = $CyDatos->HoraFecha();
$estatus = (isset($_POST["estatus"]))?1:0;
$query = "INSERT INTO `proveedores` (`id_usuarios_fk`, `nombre_proveedores`, `telefono_proveedores`, `email_proveedores`, `razon_social_proveedor`, `estatus`, `fecha_crecion`, `hora_crecion`)
          VALUES ('{$CyDatos->IdUser}', '{$_POST["nombre_proveedor"]}', '{$_POST["telefono_proveedor"]}', '{$_POST["email_proveedor"]}', '{$_POST["razonS_proveedor"]}', '{$estatus}', '{$fechah[0]}', '{$fechah[1]}');";
if($agregarProveedor =  new MysqlObj($query)){
    echo '{"estatus":"success", "mensaje":"Proveedor agregado correctamente", "redirect":"'.URLSERVER.'/Proveedores/"}';
}else{
    echo '{"estatus":"error", "mensaje":"Error al agregar proveedor", "redirect":"null"}';
}
?>