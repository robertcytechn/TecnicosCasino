<?php
require("CyTechPhp.php");
$user = new MysqlObj("SELECT * FROM usuarios u
inner join roles_usuarios r on u.id_rol_fk = r.id_rol
inner join casinos c on r.id_casino_fk = c.id_casino
where c.estatus_casino = 1 and r.estatus_rol = 1 and u.estatus_usuario = 1 and  u.nick_usuario = '{$_POST["nick"]}' and u.contra_usuario = '{$_POST["contra"]}'");

if ($user->NumeroFilas() == 1){
    echo '{"estatus":"success", "mensaje":"Iniciando sesión", "redirect":"'.URLSERVER.'"}';
    $fetch = $user->FetchData();
    $json = '{
        "userid":"'.$fetch["id_usuario"].'",
        "idrol":"'.$fetch["id_rol"].'",
        "nombreusuario":"'.$fetch["nombre_usuario"].'",
        "nombrerol":"'.$fetch["nombre_rol"].'",
        "idcasino":"'.$fetch["id_casino"].'",
        "nombrecasino":"'.$fetch["nombre_casino"].'"
    }';

    setcookie("CyTechnologies", base64_encode($json), time() + 86400, "/");
}
else{
    echo '{"estatus":"error", "mensaje":"Los datos proporcionados no son correctos", "redirect":"null"}';
}
?>