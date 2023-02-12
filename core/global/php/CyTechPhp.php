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
     * Devuelve un boolean si encuentra o no una sesion activa
     */
    public function CheckSession(): bool{
        if(isset($_COOKIE["CyTechnologies"])){
            $CySesion = json_decode($this->Decrypt($_COOKIE["CyTechnologies"]));
            if($CySesion->user > 0){
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
}
$num = new MysqlObj("select * from usuarios");
?>