<?php
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

    function __construct(String $query){
        $this->query = $query;
        $this->Ejecutar();
    }
    private function Ejecutar(){
        $this->res = mysqli_query($GLOBALS["DBConnect"], $this->query);
        $this->estatus = mysqli_sqlstate($GLOBALS["DBConnect"]);
        mysqli_next_result($GLOBALS["DBConnect"]);

    }
    public function NumeroFilas(){
        return mysqli_num_rows($this->res);
    }
    public function FetchData(){
        return mysqli_fetch_assoc($this->res);
    }
};

/**
 *
 * @author José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @version 1.0.1
 * @copyright 2018-2023 Cy Technologies
 *
*/
class CyTech{

};
?>