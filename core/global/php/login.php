<?php
require("CyTechPhp.php");
$user = new MysqlObj("SELECT u.*, rl.id_roles, rl.nombre_roles, c.id_casinos, c.nombre_casinos FROM usuarios u
inner join roles_usuarios rl on u.id_roles_fk = rl.id_roles
inner join casinos c on rl.id_casinos_fk = c.id_casinos
where u.estatus_usuarios = 1 and rl.estatus_roles = 1 and c.estatus_casinos = 1 and u.nick_usuarios = '{$_POST["nick"]}' and u.contra_usuarios = '{$_POST["contra"]}'");

if ($user->NumeroFilas() == 1){
    echo '{"estatus":"success", "mensaje":"Iniciando sesion", "redirect":"'.URLSERVER.'"}';
    $fetch = $user->FetchData();
    $json = '{
        "userid":"'.$fetch["id_usuarios"].'",
        "idrol":"'.$fetch["id_roles"].'",
        "nombreusuario":"'.$fetch["nombre_usuarios"].'",
        "nombrerol":"'.$fetch["nombre_roles"].'",
        "idcasino":"'.$fetch["id_casinos"].'",
        "nombrecasino":"'.$fetch["nombre_casinos"].'"
    }';

    setcookie("CyTechnologies", base64_encode($json), time() + 86400, "/");
}
else{
    echo '{"estatus":"error", "mensaje":"Los datos proporcionados no son correctos", "redirect":"null"}';
}
?>