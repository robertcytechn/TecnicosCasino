<?php
require_once("../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$proveedores =  new MysqlObj("SELECT p.* FROM proveedores p
inner join usuarios u on p.id_usuarios_fk = u.id_usuarios
inner join roles_usuarios r on r.id_roles = u.id_roles_roles
inner join casinos c on c.id_casinos = r.id_casinos_fk
where c.id_casinos = '".$CyDatos->IdCasino."'");

$resultado = '{"data":[';
$cont = 0;

while ($rows = $proveedores->FetchData()){
    if($cont > 0){
        $resultado .= ',';
    }
    $resultado .= '[
        "'.$rows["nombre_proveedores"].'",
        "'.$rows["telefono_proveedores"].'",
        "'.$rows["email_proveedores"].'",
        "'.$rows["razon_social_proveedor"].'"
        ]';
    $cont +=1;
}
$resultado .=']}';
echo $resultado;
?>