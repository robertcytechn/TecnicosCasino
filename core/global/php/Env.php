<?php
header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('America/Mexico_City');
/**
 *
 * Este archivo es para el manejo global
 *
 * En este archivo contiene variables esenciales para el funcionamiento de la aplicacion, aqui podras editar lso accesos a la base de datos y otros consroles esenciales de la base de datos
 * si no sabes lo que estas haciendo pide ayuda ya que de este archivo depende el buen funcionamiento de la aplicacion
 * si tienes dudas o comentarios pofavor comunicate al email que aparece en la barra de @author
 *
 * @author José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @version 3.2.1.2
 * @category Control global de la plaicacion
 * @package Env
 * @copyright 2018-2023 Cy Technologies
 *
 */

const SERVER = "localhost";         //Servidor de conexion a la base de datos
const USERNAME = "root";            //Usuario de conexion a la base de datos
const PASSWORD = "root";        //Contraseña de la base de datos
//const PASSWORD = "Chido1993$";        //Contraseña de la base de datos
const DATABASE = "casino";        //Nombre de la base de datos

const URLSERVER = "http://localhost/TecnicosCasino";     //URL que usara la aplicacion para apuntarse a si misma
//const URLSERVER = "http://cytechn.ddns.net";     //URL que usara la aplicacion para apuntarse a si misma
?>