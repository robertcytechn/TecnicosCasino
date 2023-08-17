<?php
require("Env.php");
global $DBconnect;
$DBconnect = mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASE) or die(mysqli_error($GLOBALS["link"]));
mysqli_set_charset($GLOBALS["DBconnect"],"utf8");
/**
 * Objeto para manejar una consulta o acción a la base de datos mysql
 * creando un objeto de esta clase se ejecuta la consulta y se almacenan los resultados en las variables de la clase
 *
 * @author José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @param Query $query que se va a ejecutar al crear el objeto
 * @version 5.6
 * @copyright 2017-2023 Cy Technologies
 * @var $query String que contiene la consulta a ejecutar
 * @var $res Variable que contiene el resultado de la consulta
 * @var $estatus String que contiene el estado de la ejecución de la consulta
 * @var $error String que contiene el error de la ejecución de la consulta
 *
*/
class MysqlObj{
    public $query;
    public $res;
    public $estatus;
    public $error;

    function __construct(String $query){
        $this->query = $query;
        $this->Ejecutar();
    }
    private function Ejecutar(){
        $this->res = mysqli_query($GLOBALS["DBconnect"], $this->query);
        $this->estatus = mysqli_sqlstate($GLOBALS["DBconnect"]);
        $this->error = mysqli_error($GLOBALS["DBconnect"]);
        mysqli_next_result($GLOBALS["DBconnect"]);

    }
    public function NumeroFilas(){
        return mysqli_num_rows($this->res);
    }
    public function FetchData(){
        return mysqli_fetch_assoc($this->res);
    }
}
/**
 * Objeto de control de sesiones y funciones generales, este objeto almacena los datos de la sesión en variables de la clase
 * y permite el acceso a funciones generales para el sistema
 *
 * @author José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @version 8.2.6
 * @copyright 2017-2023 Cy Technologies
 * @var $sesionExist Boolean que indica si existe una sesión activa
 * @var $IdUser Int que contiene el id del usuario
 * @var $IdRol Int que contiene el id del rol
 * @var $IdCasino Int que contiene el id del la sucursal
 * @var $UserName String que contiene el nombre del usuario
 * @var $RolName String que contiene el nombre del rol
 * @var $CasinoName String que contiene el nombre de la sucursal
 * @method HoraFecha() Devuelve un array de dos campos que contiene la fecha y hora en formato mysql
 * @method crypt(String $string) Devuelve un string codificado en base 64
 * @method Decrypt(String $string) Devuelve un string decodificado de uno que ya estaba codificado en base 64
 * @method CheckSession() Devuelve un boolean si encuentra o no una sesión activa
 * @method getMenus() Devuelve un String el cual se deberá imprimir para generar el menu izquierdo
 *
*/
class CyTech{
    public bool $sesionExist = false;
    public int $IdUser = 0;
    public int $IdRol = 0;
    public int $IdCasino = 0;
    public string $UserName = "";
    public string $RolName = "";
    public string $CasinoName = "";

    public function __construct(){
        $this->sesionExist=$this->CheckSession();
        if($this->sesionExist == false){
            header("location:".URLSERVER."/login");
         }
    }
    /**
     * Devuelve un array de dos campos que contiene la fecha y hora en formato mysql
     */
    public function HoraFecha(): array {
        return array (date("Y-m-d"),date("H:i:s"));
    }
    /**
     * Devuelve un string codificado en base 64
     */
    public function crypt(String $string): String{
        return base64_encode($string);
    }
    /**
     * Devuelve un string decodificado de uno que ya estaba codificado en base 64
     */
    public function Decrypt(String $string): String {
        return base64_decode($string);
    }
    /**
     * Devuelve un boolean si encuentra o no una sesión activa
     */
    public function CheckSession(): bool{
        if(isset($_COOKIE["CyTechnologies"])){
            $CySesion = json_decode($this->Decrypt($_COOKIE["CyTechnologies"]));
            if($CySesion->userid > 0){
                $this->IdUser = $CySesion->userid;
                $this->IdRol = $CySesion->idrol;
                $this->IdCasino = $CySesion->idcasino;
                $this->UserName = $CySesion->nombreusuario;
                $this->RolName = $CySesion->nombrerol;
                $this->CasinoName = $CySesion->nombrecasino;
                return true;
            }
            else{
                setcookie("CyTechnologies",NULL,time()-27800,"/");
            }
        }
        else{
            setcookie("CyTechnologies",NULL,time()-27800,"/");
            return false;
        }
    }
    /**
     * Devuelve un String el cual se deberá imprimir para generar el menu izquierdo
     */
    public function getMenus(){
        echo '<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
        <span class="mx-auto d-block" style="min-height: 125px; max-height: 125px; border-radius: 50%; min-width: 125px; max-width: 125px; background: url(\''.URLSERVER.'/core/images/cy logo.svg\') center;"></span>
        <p class="text-center" style="color:#0a58ca">Control Casino&reg; Cy Technologies &copy; 2023</p>
        <hr>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="'.URLSERVER.'">
                <span class="fa-solid fa-dashboard fa-2xl"></span> Dashboard</a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
              <span>'.$this->CasinoName.' <i class="fa-solid fa-arrow-right"></i> '.$this->RolName.'</span>
            </h6>
            <li class="nav-item">
              <a class="nav-link" href="'.URLSERVER.'/Perfiles/"><span class="fa-solid fa-user fa-lg"></span> '.$this->UserName .'</a>
            </li>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Técnico</span>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item"><a class="nav-link" href="'.URLSERVER.'/MisMaquinas/"><i class="fa-solid fa-laptop-code"></i> Mis máquinas</a></li>
            <li class="nav-item"><a class="nav-link" href="'.URLSERVER.'/Proveedores/"><i class="fa-solid fa-cart-flatbed"></i> Mis Proveedores</a></li>
            <li class="nav-item"><a class="nav-link" href="'.URLSERVER.'/Modelos/"><i class="fa-solid fa-tags"></i> Mis Modelos de máquinas</a></li>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Protocolos</span>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item"><a class="nav-link" href="'.URLSERVER.'/Pendientes/"><i class="fa-solid fa-list-check"></i> Pendientes</a></li>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Soporte - Ayuda</span>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item"><a class="nav-link" href="'.URLSERVER.'/SoporteAyuda/"><i class="fa-solid fa-question"></i> Inormación</a></li>
            <li class="nav-item"><a class="nav-link" href="'.URLSERVER.'/ReportarBugs/"><i class="fa-solid fa-bug-slash"></i> Reportar una falla</a></li>
          </ul>
        </div>
      </nav>';
    }
}
?>