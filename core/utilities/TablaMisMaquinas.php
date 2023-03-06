<?php
require_once("../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$Maquinas = new MysqlObj("SELECT m.*, p.nombre_proveedores FROM maquinas m inner join proveedores p on m.id_proveedores_fk = p.id_proveedores
inner join usuarios u on m.id_usuarios_fk = u.id_usuarios
inner join roles_usuarios ru on u.id_roles_roles = ru.id_roles
inner join casinos ca on ru.id_casinos_fk = ca.id_casinos
where ca.id_casinos = '".$CyDatos->IdCasino."'");

$resultado = '{"data":[';
$cont = 0;

while ($rows = $Maquinas->FetchData()){
    if($cont > 0){
        $resultado .= ',';
    }
    $resultado .= '[
        "'.$rows["uid_maquinas"].'",
        "'.$rows["modelo_maquinas"].'",
        "'.$rows["nombre_proveedores"].'",
        "'.$rows["estatus_maquinas"].'",
        ';
    $cont +=1;
}
$resultado .=']}';
echo $resultado;
?>