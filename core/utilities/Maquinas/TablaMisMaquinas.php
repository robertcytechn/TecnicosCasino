<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();
$Maquinas = new MysqlObj("SELECT * FROM maquinas m
inner join modelos mo on m.id_modelo_fk = mo.id_modelo
inner join proveedores p on p.id_proveedor = mo.id_proveedor_fk
where p.id_casino_fk = '".$CyDatos->IdCasino."'");

$resultado = '{"data":[';
$cont = 0;

while ($rows = $Maquinas->FetchData()){
    if($cont > 0){
        $resultado .= ',';
    }
    $operativa = ($rows["operativa_maquina"] == 1)?"<span class='badge bg-success'>Operativa</span>":"<span class='badge bg-danger'>Dañada</span>";
    $acciones = "<div class='btn-group' role='group' aria-label='Acciónes'>";

    $acciones .= "<button type='button' class='btn btn-sm btn-warning cytech-load-content' data-bs-toggle='modal' data-bs-target='#ModalEditarMaquina' data-id='{$rows["id_maquina"]}' data-link='core/utilities/Maquinas/Cargar_aEditarMaquina.php' data-div-load='load-edit-div'>Editar</button>";
    $acciones .= "<button type='button' class='btn btn-sm btn-info cytech-load-content' data-bs-toggle='modal' data-bs-target='#ModalVerMaquina' data-id='{$rows["id_maquina"]}' data-link='core/utilities/Maquinas/Cargar_aVerMaquina.php' data-div-load='load-ver-div'>Ver</button>";
    $acciones .= "<button type='button' class='btn btn-sm btn-dark cytech-load-content' data-bs-toggle='modal' data-bs-target='#ModalHistorialMaquina' data-id='{$rows["id_maquina"]}' data-link='core/utilities/Maquinas/LoadHistorialMaquina.php' data-div-load='load-historial-div'>Historial</button>";


    // revisamos que no esten reportes abiertos para esta maquina
    $Reportes = new MysqlObj("SELECT * FROM reportes where id_maquina_fk = '".$rows["id_maquina"]."' and proceso_reporte != 0"); // proceso_reporte = o -> abierto  1 -> cerrado 2 -> cancelado 3 -> en proceso
    if($Reportes->NumeroFilas() > 0){
        $acciones .= "<button type='button' class='btn btn-sm btn-outline-primary cytech-load-content' data-bs-toggle='modal' data-bs-target='#ModalPruebaMaquina' data-id='{$rows["id_maquina"]}' data-link='core/utilities/Maquinas/LoadPruebaMaquina.php' data-div-load='load-prueba-div'>Prueba</button>";
    }else{
        $acciones .= "<button type='button' class='btn btn-sm btn-danger cytech-load-content' data-bs-toggle='modal' data-bs-target='#ModalReporteMaquina' data-id='{$rows["id_maquina"]}'  data-link='core/utilities/Maquinas/LoadCrearReporteMaquina.php' data-div-load='load-reporte-div'>Reporte</button>";
    }
    

    $acciones .= "</div>";

    $resultado .= '[
        "'.$rows["uid_maquina"].'",
        "'.$rows["nombre_modelo"].'",
        "'.$rows["producto_modelo"].'",
        "'.$rows["ip_maquina"].'",
        "'.$rows["serie_maquina"].'",
        "'.$rows["nombre_proveedor"].'",
        "'.$operativa.'",
        "'.$acciones.'"
        ]';
    $cont +=1;
}
$resultado .=']}';
echo $resultado;
?>