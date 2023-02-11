<?php
require("classes.php");

/**
 *
 * @Descripcion Testeando la clase de datos
 *
*/
$datos = new datos();
echo "Fecha: ".$datos->hora_fecha[0];
echo "\n<br>Hora: ".$datos->hora_fecha[1];
echo "\n<br>URL de sistema: ".$datos->url;

echo "\n<br>Creando objeto query con: SELECT * FROM usuarios";
$usuarios = new ejecutarQuery("SELECT * FROM usuarios");
echo "\n<br>Ejecutando....";
echo "\n<br>Resultado de ejecución: ".$usuarios->estatus;
echo "\n<br>Numero de resultados: ".$usuarios->numeroFilas();
echo "\n<br>Creando fetch_assoc.....";
$usuarios->fetch_assoc();

echo "\n<br>Encriptando numero 123 ..... ".encriptar("123");

echo " \n<br>Verificando inicios de sesion activos....";
if(check_session()){
    echo "Sesion iniciada";
    echo "\n imprimiendo el json access";
    echo "\n". $_COOKIE["access"];
}
else{
    echo "Sin sesion activa";
}

echo "<br><br>";
echo "\nCreando formulario a partir de json";
$json_cont = '{
    "1":{"id":"nombre", "nombre":"Nombre del proveedor: ", "icon":"fa fa-user-plus fa-lg", "type":"text", "placeholder":"Ejemplo: [Proveedor de jabon]", "req":"required"},
    "2":{"id":"email", "nombre":"Email de contacto del proveedor: ", "icon":"fa fa-user-plus fa-lg", "type":"text", "placeholder":"Ejemplo: [prov@veedor.com]", "req":"required"}
}';
echo "<br>\n imprimiendo numero de objetos: ".count(json_decode($json_cont,true));

crear_form("gg","ggg","ggg","gg",$json_cont);
?>