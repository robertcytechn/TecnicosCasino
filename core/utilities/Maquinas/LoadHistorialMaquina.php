<?php
require_once("../../global/php/CyTechPhp.php");
$CyDatos = new CyTech();

$verificarReportes = new MysqlObj("SELECT * FROM reportes r inner join usuarios u on r.id_usuario_fk = u.id_usuario where id_maquina_fk = '{$_POST["id"]}' order by id_reporte desc");
$countReportes = 1;
if($verificarReportes->NumeroFilas() == 0){
    $contend = '<div class="alert alert-danger" role="alert">
    No hay reportes que mostrar para esta maquina
  </div>';
}
else{
    $contend = ' <div class="accordion" id="HistorialMaquina">';
    $infoMaquina = new MysqlObj("SELECT * FROM maquinas m inner join modelos mo on m.id_modelo_fk = mo.id_modelo where id_maquina = '{$_POST["id"]}'");
    $infoMaquina = $infoMaquina->FetchData();
    $contend .= '<h2 class="text-center">Maquina: '.$infoMaquina["uid_maquina"].' / '.$infoMaquina["producto_modelo"].' </h2>';
    while($reportes = $verificarReportes->FetchData()){
        $estatusreporte = "";
        switch ($reportes["proceso_reporte"]) {
            case '1':
                $estatusreporte = ' <span class="badge bg-danger">Iniciado</span>';
                break;
            case '0':
                $estatusreporte = ' <span class="badge bg-success">Finalizado</span>';
                break;
            case '2':
                $estatusreporte = ' <span class="badge bg-primary">Cancelado</span>';
                break;
            case '3':
                $estatusreporte = ' <span class="badge bg-warning">En proceso</span>';
                break;
            default:
                $estatusreporte = ' <span class="badge bg-secondary">Indeterminado</span>';
                break;
        }
        $contend .= '
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading'.$countReportes.'">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$countReportes.'" aria-expanded="false" aria-controls="collapse'.$countReportes.'">
                    Reporte: '.$reportes["f_reporte"].' / '.$reportes["h_reporte"].' / - '.$estatusreporte.'
                </button>
            </h2>
            <div id="collapse'.$countReportes.'" class="accordion-collapse collapse" aria-labelledby="heading'.$countReportes.'" data-bs-parent="#HistorialMaquina">
            <div class="accordion-body">
                <ol class="list-group list-group-numbered">';
        $historialPruebas = new MysqlObj("SELECT * FROM pruebas_realizadas p inner join usuarios u on p.id_usuario_fk = u.id_usuario where id_reporte_fk = '{$reportes["id_reporte"]}' order by p.id_prueba desc");
        while($pruebas = $historialPruebas->FetchData()){
            $contend .= '<li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
        <div class="fw-bold">'.$pruebas["nombre_usuario"].' <span>'.$pruebas["f_prueba"].' / '.$pruebas["h_prueba"].'</span></div>
            '.$pruebas["descripcion_prueba"].'
        </div>
        </li>';
    }
        $contend .= '<li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">'.$reportes["nombre_usuario"].' (Fecha de creación del reporte)</div>'.$reportes["descripcion_reporte"].'
    </div>
    </li>';
        $contend .= '</ol></div></div>';
        $countReportes += 1;
    }

$contend .= '</div>';
}
echo $contend;
