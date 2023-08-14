<?php
require("CyTechPhp.php");
//eliminamos la sesion y redireccionamos al login
setcookie("CyTechnologies", "", time() - 88800, "/");
echo '{"estatus":"success", "mensaje":"Se cerro la sesion corectamente, saliendo......", "redirect":"'.URLSERVER.'/login"}';
exit;
?>