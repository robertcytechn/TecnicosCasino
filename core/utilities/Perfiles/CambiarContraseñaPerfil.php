<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

//verificamos que la contraseña actual sea correcta
$verificar = new MysqlObj("SELECT * FROM `usuarios` WHERE `id_usuario` = '{$CyDatos->IdUser}' AND `contra_usuario` = '".$_POST["anterior_contra"]."'");
if($verificar->NumeroFilas() == 0){
    echo '{"estatus":"warning", "mensaje":"La contraseña actual no es correcta", "redirect":"null"}';
    exit;
}

//verificamos que la nueva contraseña sea igual a la confirmacion
if($_POST["nueva_contra"] != $_POST["nueva_contra_repit"]){
    echo '{"estatus":"warning", "mensaje":"La nueva contraseña no coincide con la confirmación, verifica sean iguales y correctas", "redirect":"null"}';
    exit;
}

//actualizamos la contraseña
if($actualizar = new MysqlObj("UPDATE `usuarios` SET `contra_usuario` = '".$_POST["nueva_contra"]."' WHERE `id_usuario` = '{$CyDatos->IdUser}'")){
    echo '{"estatus":"success", "mensaje":"La contraseña se actualizo correctamente", "redirect":"reset"}';
    exit;
}else{
    echo '{"estatus":"error", "mensaje":"Ocurrio un error al actualizar la contraseña, intenta de nuevo", "redirect":"null"}';
    exit;
}

?>