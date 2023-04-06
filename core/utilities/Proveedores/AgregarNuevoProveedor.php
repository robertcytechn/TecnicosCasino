<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$fechah = $CyDatos->HoraFecha();
$estatus = (isset($_POST["switchEstatus"]))?1:0;

$query = "INSERT INTO `proveedores` (`nombre_proveedores`, `tel_proveedores`, `email_proveedores`, `razonsocial_proveedores`, `estatus_proveedores`, `f_c_proveedores`, `h_c_proveedores`, `id_casinos_fk`, `id_usuarios_fk`) 
VALUES ('{$_POST["nombre_proveedor"]}', '{$_POST["telefono_proveedor"]}', '{$_POST["email_proveedor"]}', '{$_POST["razonS_proveedor"]}', '{$estatus}',
'{$fechah[0]}', '{$fechah[1]}', '{$CyDatos->IdCasino}', '{$CyDatos->IdUser}');";

if($agregarProveedor =  new MysqlObj($query)){
    echo '{"estatus":"success", "mensaje":"Proveedor agregado correctamente", "redirect":"'.URLSERVER.'/Proveedores/"}';
}else{
    echo '{"estatus":"error", "mensaje":"Error al agregar proveedor", "redirect":"null"}';
}
?>