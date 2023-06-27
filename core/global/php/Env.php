<?php
header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('America/Mexico_City');
/**
 *
 * Este archivo es para el manejo global
 *
 * En este archivo contiene variables esenciales para el funcionamiento de la aplicación, aquí podrás editar lso accesos a la base de datos y otros controles esenciales de la base de datos
 * si no sabes lo que estas haciendo pide ayuda ya que de este archivo depende el buen funcionamiento de la aplicación
 * si tienes dudas o comentarios por favor comunícate al email que aparece en la barra de @author
 *
 * @author José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @version 3.2.1.2
 * @category Control global de la glaciación
 * @package Env
 * @copyright 2018-2023 Cy Technologies
 *
 */

//const SERVER = "localhost";         //Servidor de conexión a la base de datos
const SERVER = "cytechn.ddns.net";         //Servidor de conexión a la base de datos
const USERNAME = "robert";            //Usuario de conexión a la base de datos
//const PASSWORD = "root";        //Contraseña de la base de datos
const PASSWORD = "Chido1993$";        //Contraseña de la base de datos
const DATABASE = "casino";        //Nombre de la base de datos

const URLSERVER = "http://localhost/TecnicosCasino";     //URL que usara la aplicación para apuntarse a si misma
//const URLSERVER = "http://cytechn.ddns.net/control";     //URL que usara la aplicación para apuntarse a si misma
?>