<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();


$duplicado_UID = new MysqlObj("SELECT * FROM maquinas ma
INNER JOIN modelos mo ON mo.id_modelo = ma.id_modelo_fk
INNER JOIN proveedores p ON p.id_proveedor = mo.id_proveedor_fk
WHERE ma.uid_maquina = '{$_POST["uid_maquina_edit"]}' 
AND p.id_casino_fk = '{$CyDatos->IdCasino}}' AND ma.estatus_maquina = '1'
AND ma.id_maquina != '{$_POST["id_maquina_edit"]}'");

if($duplicado_UID->NumeroFilas() > 0){
    echo '{"estatus":"danger", "mensaje":"No se puede actualizar maquina ya que se duplicara su UID, ya que se esta utilizando en otra maquina activa", "reload":"null"}';
    exit;
}

$duplicado_IP = new MysqlObj("SELECT * FROM maquinas ma 
INNER JOIN modelos mo ON mo.id_modelo = ma.id_modelo_fk
INNER JOIN proveedores p ON p.id_proveedor = mo.id_proveedor_fk
WHERE ip_maquina = '{$_POST["ip_maquina_edit"]}'
AND p.id_casino_fk = '{$CyDatos->IdCasino}}' AND ma.estatus_maquina = '1'
AND ma.id_maquina != '{$_POST["id_maquina_edit"]}'");
if($duplicado_IP->NumeroFilas() > 0){
    echo '{"estatus":"danger", "mensaje":"No se puede actualizar maquina ya que se duplicara su IP, ya se esta utilizando en otra maquina activa", "reload":"null"}';
    exit;
}

$duplicado_Serie = new MysqlObj("SELECT * FROM maquinas WHERE serie_maquina = '{$_POST["serie_maquina_edit"]}' AND id_maquina != '{$_POST["id_maquina_edit"]}'");
if($duplicado_Serie->NumeroFilas() > 0){
    echo '{"estatus":"danger", "mensaje":"No se puede actualizar maquina ya que se duplicara su numero de serie, ya se esta utilizando en otra maquina", "reload":"null"}';
    exit;
}

if(!filter_var($_POST["ip_maquina_edit"], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
    echo '{"estatus":"danger", "mensaje":"La IP no es valida, verifica que sea correcta", "reload":"null"}';
    exit;
}

$estatus = (isset($_POST["switchEstatus_edit"]))?1:0;
$operativa = (isset($_POST["switchOperativa_edit"]))?1:0;

$query = "UPDATE `maquinas` SET `uid_maquina` = '{$_POST["uid_maquina_edit"]}', `ip_maquina` = '{$_POST["ip_maquina_edit"]}', `serie_maquina` = '{$_POST["serie_maquina_edit"]}', `juego_maquina` = '{$_POST["juego_maquina_edit"]}', `estatus_maquina` = '{$estatus}', `operativa_maquina` = '{$operativa}', `id_modelo_fk` = '{$_POST["id_modelo_select"]}' WHERE `maquinas`.`id_maquina` = '{$_POST["id_maquina_edit"]}';";

if($editarMaquina = new MysqlObj($query)){
    echo '{"estatus":"success", "mensaje":"Maquina actualizada correctamente", "reload":"true"}';
}else{
    echo '{"estatus":"error", "mensaje":"Error al actualizar la maquina contacta al administrador de sistemas, ['.$editarMaquina->error.']", "reload":"null"}';
}


?>