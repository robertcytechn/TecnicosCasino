<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$Maquinas = new MysqlObj("SELECT m.*, p.nombre_proveedor, mo.nombre_modelo FROM maquinas m inner join modelos_maquinas mo on m.id_modelo_fk = mo.id_modelo
inner join proveedores p on mo.id_proveedor_fk = p.id_proveedor
inner join usuarios u on m.id_usuario_fk = u.id_usuario
inner join roles_usuarios r on u.id_rol_fk = r.id_rol
inner join casinos c on r.id_casino_fk = c.id_casino
where c.id_casino = '".$CyDatos->IdCasino."'");

$resultado = '{"data":[';
$cont = 0;

while ($rows = $Maquinas->FetchData()){
    if($cont > 0){
        $resultado .= ',';
    }
    $resultado .= '[
        "'.$rows["uid_maquina"].'",
        "'.$rows["nombre_modelo"].'",
        "'.$rows["nombre_proveedor"].'",
        "'.$rows["estatus_maquina"].'",
        ';
    $cont +=1;
}
$resultado .=']}';
echo $resultado;
?>