<?php
session_start();

class Conectar
{
    /*
    public  $dbh;
    private $_username = "root";
    private $_passwd = "";
    private $_dns = "mysql:host=localhost;
	dbname=srp";
    */
    
    public  $dbh;
    private $_username = "root";
    private $_passwd = "";
    private $_dns = "mysql:host=localhost;
	dbname=jproy";
    
    private static $_instance = null;

    public static function getInstance() {
        if (!(self::$_instance instanceof DbPdo)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct() {
        try {
            $this->_dbh = new PDO($this->_dns, $this->_username, $this->_passwd);
            $this->_dbh->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo "Error al conectar DB!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getConn() {
        if ($this->_dbh === null) {
            self::getInstance();
        }
        return $this->_dbh;
    }
    public function isConn() {
        return ((bool) ($this->_dbh instanceof PDO));
    }

    public function closeConn() {
        $this->_dbh = null;
    }

    public function __destruct() {
        $this->closeConn();
    }
    public static function valida_correo($email){
        $mail_correcto = 0;
        //compruebo unas cosas primeras
        if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
            if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
                //miro si tiene caracter .
                if (substr_count($email,".")>= 1){
                    //obtengo la terminacion del dominio
                    $term_dom = substr(strrchr ($email, '.'),1);
                    //compruebo que la terminaci�n del dominio sea correcta
                    if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
                        //compruebo que lo de antes del dominio sea correcto
                        $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                        $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                        if ($caracter_ult != "@" && $caracter_ult != "."){
                            $mail_correcto = 1;
                        }
                    }
                }
            }
        }
    }
    public static function invierte_fecha($fecha,$op){

        switch ($op)
        {
            case '1':
                $dia=substr($fecha,8,2);
                $mes=substr($fecha,5,2);
                $anio=substr($fecha,0,4);
                $correcta=$dia."-".$mes."-".$anio;
                break;
            case '2':

                $dia=substr($fecha,0,2);
                $mes=substr($fecha,3,2);
                $anio=substr($fecha,6,4);
                $correcta=$anio."-".$mes."-".$dia;
                break;
        }

        return $correcta;
    }
    public static function  DiasHabiles($fecha_inicial,$fecha_final) 
    { 
        list($dia,$mes,$year) = explode("-",$fecha_inicial); 
        $ini = mktime(0, 0, 0, $mes , $dia, $year); 
        list($diaf,$mesf,$yearf) = explode("-",$fecha_final); 
        $fin = mktime(0, 0, 0, $mesf , $diaf, $yearf); 

        $r = 1; 
        while($ini != $fin) 
        { 
        $ini = mktime(0, 0, 0, $mes , $dia+$r, $year); 
        $newArray[] .=$ini;  
        $r++; 
        } 
        return $newArray; 
    }
    public static function Evalua($arreglo) 
    { 
        $feriados        = array( 
        '1-1',  
        '6-8',
        '25-12',
        '16-7',
        '21-6',
        '23-6',
        '22-4',
        '1-5',
        '2-11',
        '19-6',
//  Año Nuevo (irrenunciable) 
        /*'10-4',  //  Viernes Santo (feriado religioso) 
        '11-4',  //  Sábado Santo (feriado religioso) 
        '1-5',  //  Día Nacional del Trabajo (irrenunciable) 
        '21-5',  //  Día de las Glorias Navales 
        '29-6',  //  San Pedro y San Pablo (feriado religioso) 
        '16-7',  //  Virgen del Carmen (feriado religioso) 
        '15-8',  //  Asunción de la Virgen (feriado religioso) 
        '18-9',  //  Día de la Independencia (irrenunciable) 
        '19-9',  //  Día de las Glorias del Ejército 
        '12-10',  //  Aniversario del Descubrimiento de América 
        '31-10',  //  Día Nacional de las Iglesias Evangélicas y Protestantes (feriado religioso) 
        '1-11',  //  Día de Todos los Santos (feriado religioso) 
        '8-12',  //  Inmaculada Concepción de la Virgen (feriado religioso) 
        '13-12',  //  elecciones presidencial y parlamentarias (puede que se traslade al domingo 13) 
        '25-12', */ //  Natividad del Señor (feriado religioso) (irrenunciable) */
        ); 

        $j= count($arreglo); 

        for($i=0;$i<=$j;$i++) 
        { 
        $dia = $arreglo[$i]; 

                $fecha = getdate($dia); 
                    $feriado = $fecha['mday']."-".$fecha['mon']; 
                            if($fecha["wday"]==0 or $fecha["wday"]==6) 
                            { 
                                $dia_ ++; 
                            } 
                                elseif(in_array($feriado,$feriados)) 
                                {    
                                    $dia_++; 
                                } 
        } 
        $rlt = $j - $dia_; 
        return $rlt; 
    }
    public static function calculaedad($fechanacimiento)
   {
        list($ano,$mes,$dia) = explode("-",$fechanacimiento);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;
        return $ano_diferencia;
    }
}
