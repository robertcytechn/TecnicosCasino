<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$estatus = (isset($_POST["switchEstatus"]))?1:0;
$operativa = (isset($_POST["switchOperativa"]))?1:0;

$duplicado_UID  = new MysqlObj("SELECT * FROM maquinas ma
INNER JOIN modelos mo ON mo.id_modelo = ma.id_modelo_fk
INNER JOIN proveedores p ON p.id_proveedor = mo.id_proveedor_fk
WHERE ma.uid_maquina = '{$_POST["uid_maquina"]}' AND p.id_casino_fk = '{$CyDatos->IdCasino}}' AND ma.estatus_maquina = '1'");
if($duplicado_UID->NumeroFilas() > 0){
    echo '{"estatus":"danger", "mensaje":"Ya existe una maquina con ese UID y no puedo ser agregada, Error en datos duplicados", "reload":"null"}';
    exit;
}

$duplicado_IP = new MysqlObj("SELECT * FROM maquinas ma
INNER JOIN modelos mo ON mo.id_modelo = ma.id_modelo_fk
INNER JOIN proveedores p ON p.id_proveedor = mo.id_proveedor_fk
WHERE ip_maquina = '{$_POST["ip_maquina"]}' AND p.id_casino_fk = '{$CyDatos->IdCasino}}' AND ma.estatus_maquina = '1'");
if($duplicado_IP->NumeroFilas() > 0){
    echo '{"estatus":"danger", "mensaje":"Ya existe una maquina con esa IP y no puedo ser agregada, la ip ya esta en uso", "reload":"null"}';
    exit;
}

$duplicado_Serie = new MysqlObj("SELECT * FROM maquinas WHERE serie_maquina = '{$_POST["serie_maquina"]}'");
if($duplicado_Serie->NumeroFilas() > 0){
    echo '{"estatus":"danger", "mensaje":"Ya existe una maquina con ese numero de serie y no puede ser agregada, verifica que los datos sean correctos", "reload":"null"}';
    exit;
}

if(!filter_var($_POST["ip_maquina"], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
    echo '{"estatus":"danger", "mensaje":"La IP no es valida, verifica que sea correcta", "reload":"null"}';
    exit;
  }

$query = "INSERT INTO `maquinas` (`uid_maquina`, `ip_maquina`, `serie_maquina`, `juego_maquina`, `estatus_maquina`, `operativa_maquina`, `id_modelo_fk`) 
VALUES ('{$_POST["uid_maquina"]}', '{$_POST["ip_maquina"]}', '{$_POST["serie_maquina"]}', '{$_POST["juego_maquina"]}', '{$estatus}', '{$operativa}', '{$_POST["id_modelo_select"]}');";

if($agregarMaquina = new MysqlObj($query)){
    echo '{"estatus":"success", "mensaje":"Maquina agregada correctamente", "reload":"true"}';
}else{
    echo '{"estatus":"error", "mensaje":"Error al agregar la maquina contacta al administrador de sistemas, ['.$agregarMaquina->error.']", "reload":"null"}';
}
?>