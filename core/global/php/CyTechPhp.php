<?php
require("Env.php");
global $DBconnect;
$DBconnect = mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASE) or die(mysqli_error($GLOBALS["link"]));
mysqli_set_charset($GLOBALS["DBconnect"],"utf8");


/**
 *
 * @author José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @param Query $query que se va a ejecutar al crear el objeto
 * @version 5.6
 * @copyright 2018-2023 Cy Technologies
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
 *
 * @author José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @version 1.0.1
 * @copyright 2018-2023 Cy Technologies
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
     * Devuelve un string decodificado de uno que ya estab a codificado en base 64
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
        <p class="text-center" style="color:#0a58ca">&reg; Cy Technologies &copy; 2019 -2022</p>
        <hr>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="'.URLSERVER.'">
                <span class="fa-solid fa-dashboard fa-2xl"></span> Dashboard</a>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
              <span>'.$this->CasinoName.'<i class="fa-solid fa-arrow-right"></i> '.$this->RolName.'</span>
            </h6>
            <li class="nav-item">
              <a class="nav-link" href="'.URLSERVER.'/UserInfo/"><span class="fa-solid fa-user fa-lg"></span> '.$this->UserName .'</a>
            </li>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Menú de Acciones</span>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item"><a class="nav-link" href="'.URLSERVER.'/MisMaquinas/"><i class="fa-solid fa-laptop-code"></i> Mis máquinas</a></li>
            <li class="nav-item"><a class="nav-link" href="'.URLSERVER.'/Proveedores/"><i class="fa-solid fa-cart-flatbed"></i> Mis Proveedores</a></li>
          </ul>
        </div>
      </nav>';
    }
}
?>