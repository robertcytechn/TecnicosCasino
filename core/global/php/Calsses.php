<?php
/**
 *
 * Este archivo es para el manejo global
 *
 * En este archivo contiene todas las variables globales que controlan el sitio, porfavor no modifique ni altere el codigo a continuación
 * todas las variables que aparecen controlan el sitio completo si modificas algo porfavor comentalo, si quieres modificar los bloques de codigo para personalizarlos 
 * notifica al creador antes de hacerlo, dudas o comentarios comunicate al correo que esta en el bloque de @author
 *
 * @author José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @version 3.0.1
 * @category Control global de la plaicacion
 * @package GLOBAL
 * @copyright 2018-2019 José Roberto Tamayo Montejano
 *
 */
header('Content-Type: text/html; charset=utf-8'); // Header para el uso de caracteres especiales con el iso utf-8
header('Access-Control-Allow-Origin: *');   	  // Header para asignar un acceso total desde cualquier parte
date_default_timezone_set('America/Mexico_City'); // Header para asignar una zaona horaria en este caso Ciudad De México

global $url, $link;
$url = "http://localhost/";
$link = mysqli_connect("localhost","root","root","controlmaquinas") or die(mysqli_error($GLOBALS["link"]));
mysqli_set_charset($GLOBALS["link"],"utf8");


/**
 *
 * @author José Roberto Tamayo
 * @param 0 parametros
 * @return url,link,hora_fecha
 * @version 1.0
 * @copyright 2018-2019 José Roberto Tamayo Montejano
 *
*/
class datos{
    public $url;
    public $link;
    public $hora_fecha;
    public function __construct() {
        $this->url = $GLOBALS["url"];
        $this->link = $GLOBALS["link"];
        $this->hora_fecha = array (date("Y-m-d"),date("H:i:s"));
    }
}

/**
 *
 * @author José Roberto Tamayo
 * @param MySQLConsult String con sentencia MySQl
 * @return sin retornsolas variables se guardan dentro del objeto, numero fila, query, resultado, estatus
 * @version 1.0
 * @copyright 2018-2019 José Roberto Tamayo Montejano
 *
*/
class ejecutarQuery{
	public $query; 				// Query enviado desde la creacion del objeto
	public $resultado;			// Resultado de ejecutar el query
	public $estatus;			// Estatus devuelto por el mysql cuando ejecutamos el query
	function __construct(String $query){
		$this->query = $query;
		$this->ejecutar();
	}

	/**
	 * Ejecuta el query que enviamos al crear el objeto
	 * guarda variables dentro del objeto estatus y resulado
	 */
	private function ejecutar(){
		$this->resultado = mysqli_query($GLOBALS["link"],$this->query);
		$this->estatus = mysqli_sqlstate($GLOBALS["link"]);
		mysqli_next_result($GLOBALS["link"]);
	}
	public function numeroFilas(){
		return mysqli_num_rows($this->resultado);
	}
	public function fetch_assoc(){
		return mysqli_fetch_assoc($this->resultado);
	}
}

/**
 * Encripta una cadena de tipo String con algoritmo propio
 * @author José Roberto Tamayo Montejano
 * @param  String $String Parametro de tipo string base utf-8
 * @return String         Retorna variable String ya codificado sin caracteres especiales
 * @version 2.0 solo encripta numeros
 */
function encriptar($String){
	$String = preg_replace("/[\r\n|\n|\r]+/","",$String);
	$res = "";
	$cont = utf8_decode($String);
	$split = str_split($cont);
	$num = count($split);
	for ($i=0; $i < $num; $i++) {
		switch (utf8_encode($split[$i])) {
			case '0':  $res .= "6H3O"; break;
			case '1':  $res .= "8C7I"; break;
			case '2':  $res .= "3L0G"; break;
			case '3':  $res .= "0W5R"; break;
			case '4':  $res .= "5V1C"; break;
			case '5':  $res .= "9C4L"; break;
			case '6':  $res .= "2I6V"; break;
			case '7':  $res .= "1O8R"; break;
			case '8':  $res .= "7R2W"; break;
			case '9':  $res .= "4G9H"; break;
			default:   $res .= $split[$i];  break;
			}
		}
	return $res;
}
/**
 * Desencript una cadena de tipo String ya encriptada con algoritmo propio
 * @author José Roberto Tamayo Montejano
 * @param  String $String Parametro de tipo String Encriptado sin caracteres especiales
 * @return String         Retorna una cadena desencriptada de tipo String con caracteres ISO utf-8
 */
function desencriptar($String){
	$res = "";
	$cont = utf8_decode($String);
	$split = str_split($cont, 4);
	$num = count($split);

	for ($i=0; $i < $num; $i++) {
		switch (utf8_encode($split[$i])) {
			case '6H3O':  $res .= "0"; break;
			case '8C7I':  $res .= "1"; break;
			case '3L0G':  $res .= "2"; break;
			case '0W5R':  $res .= "3"; break;
			case '5V1C':  $res .= "4"; break;
			case '9C4L':  $res .= "5"; break;
			case '2I6V':  $res .= "6"; break;
			case '1O8R':  $res .= "7"; break;
			case '7R2W':  $res .= "8"; break;
			case '4G9H':  $res .= "9"; break;
			default:      $res .= $split[$i]; break;
		}
	}
	    return $res;
}


/**
 *
 * @author José Roberto Tamayo
 * @param  no requiere parametros
 * @return boolean retorna un boleano si es hay sesion
 * @version 2.0
 * @copyright 2018-2019 José Roberto Tamayo Montejano
 *
*/
function check_session(){
	if(isset($_COOKIE["system"])){
		$system = json_decode($_COOKIE["system"]);
		if(desencriptar($system->user > 0)){
			return true;
		}
		else{
			setcookie("system",NULL,time()-28800,"/");
			setcookie("access",NULL,time()-27800,"/");
			return false;
		}
	}
	else{
		setcookie("system",NULL,time()-28800,"/");
		setcookie("access",NULL,time()-27800,"/");
		return false;
	}
}

/**
 *
 * @author José Roberto Tamayo
 * @param none sin parametros
 * @return String imprime el log in listo para acceder desde cualquier lugar
 * @version 2.1
 * @copyright 2018-2019 José Roberto Tamayo Montejano
 *
*/
function crear_login(){
	echo '';
}

/**
 *
 * @author José Roberto Tamayo
 * @param $xhr url del form $id in del form $class clase del form $btn nombre que aparece en el boton $json_c contenido del form en json
 * @return print imprime el formulario completo y listo pra ser utilizado
 * @version 1.0
 * @copyright 2018-2019 José Roberto Tamayo Montejano
 *
*/
function crear_form($xhr,$id,$class,$btn,$json_c){
	echo '<form action="'.$xhr.'" id="'.$id.'" autocomplete="off" class="'.$class.'"><fieldset class="uk-fieldset">';
	$numeor_elementos = count(json_decode($json_c,true));
	$cont = 1;
	$json = json_decode($json_c);
	while($cont <= $numeor_elementos){
		echo '<div class="uk-margin"><label class="uk-form-label" for="'.$json->$cont->id.'_input">'.$json->$cont->nombre.'</label><div class="uk-form-controls"><div class="uk-inline uk-width-3-4@l uk-width-1-1@s"><span class="uk-form-icon '.$json->$cont->icon.'" ></span><input class="uk-input" id="'.$json->$cont->id.'_input" name="'.$json->$cont->id.'_input" type="'.$json->$cont->type.'" placeholder="'.$json->$cont->placeholder.'" '.$json->$cont->req.'></div></div></div>';
		$cont ++;
	}
	echo '<div uk-margin><button class="uk-button uk-button-primary" type="submit">'.$btn.'</button></div></fieldset></form>';
}
?>