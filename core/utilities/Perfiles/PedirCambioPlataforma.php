<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

//insertamos el cambio solicitados a la tabla cambios solicitados con id de usuario e id de casinos
if($insertar = new MysqlObj("INSERT INTO `cambios_solicitados`(`id_usuario_fk`, `id_casino_fk`, `cambio_solicitado`, `estatus_cambio`) 
VALUES ('{$CyDatos->IdUser}', '{$CyDatos->IdCasino}', '{$_POST["cambio"]}', '0')")){
    echo '{"estatus":"success", "mensaje":"Se solicito el cambio de plataforma correctamente, en breve se te notificara el estatus del cambio", "redirect":"reset"}';
    exit;
}else{
    echo '{"estatus":"error", "mensaje":"Ocurrio un error al solicitar el cambio de plataforma, intenta de nuevo", "redirect":"null"}';
    exit;
}

?>