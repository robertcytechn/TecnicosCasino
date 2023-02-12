<?php
require("CyTechPhp.php");
$user = new MysqlObj("SELECT u.*, r.id_roles, r.nombre_roles, c.id_casinos, c.nombre_casinos FROM usuarios u inner join roles_usuarios r on u.id_roles_roles = r.id_roles inner join casinos c on r.id_casinos_fk = c.id_casinos
where u.nick_usuarios = '{$_POST['nick']}' and u.contra_usuarios = '{$_POST['contra']}' and u.estatus_usuarios = 1 and r.estatus_roles = 1 and c.estatus_casinos =1");
if ($user->NumeroFilas() == 1){
    echo '{"resultado":"ok", "estatus":"alert alert-success", "mensaje":"Iniciando sesion", "redirect":"'.URLSERVER.'", "delay":"1000"}';
    $fetch = $user->FetchData();
    $json = '{
        "user":"'.$fetch["id_usuarios"].'",
        "idrol":"'.$fetch["id_roles"].'",
        "nombreUsuario":"'.$fetch["nombre_usuarios"].'",
        "nombreRol":"'.$fetch["nombre_roles"].'",
        "idCasino":"'.$fetch["id_casinos"].'",
        "nombreCasino":"'.$fetch["nombre_casinos"].'"
    }';

    setcookie("CyTechnologies", base64_encode($json), time() + 86400, "/");
}
else{
    echo '{"resultado":"error", "estatus":"alert alert-danger", "mensaje":"Los datos proporcionados no son correctos", "redirect":"null", "delay":"null"}';
}
?>