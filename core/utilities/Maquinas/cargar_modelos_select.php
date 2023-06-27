<?php
require_once("../../global/php/CyTechPhp.php");
echo '<option selected value="">Selecciona el modelo de la maquina</option>';
$CyDatos = new CyTech();
$Modelos = new MysqlObj("SELECT * FROM casino.modelos_maquinas WHERE id_proveedor_fk = '{$_POST["id"]}' AND estatus_modelo = '1'");
while($Modelo = $Modelos->FetchData()){
    echo '<option value="'.$Modelo["id_modelo"].'">'.$Modelo["nombre_modelo"].'</option>';
}
?>