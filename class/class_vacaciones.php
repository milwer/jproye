<?php
require_once("class.php");
class Vacaciones
{
    //private $tipo;
    protected function  _getDbh()
    {
        return Conectar::getInstance()->getConn();
    }
    
    public function getVacacionesPorUser($id)
    {
        $sql = "SELECT * FROM t_vacaciones where n_ci=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function CuentaDeVacacionesPorUser($ci, $id)
    {
        $fecha=(date("Y")-1)."01-01";
        //$sql = "SELECT * FROM t_vacaciones where n_ci=? and id_vac<? and fecha_inicio>?;";
        $sql = "SELECT * FROM t_vacaciones where n_ci=? and id_vac<?;";
        //$sql = "SELECT * FROM t_vacaciones where n_ci=? and Tipo='Permiso'and id_vac<?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm->bindvalue(2, $id, PDO::PARAM_STR);
        //$stm->bindvalue(3, $fecha, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function CuentaDeVacacionesPorGestion($gestion)
    {
        $fecha=(date("Y")-1)."01-01";
        //$sql = "SELECT * FROM t_vacaciones where n_ci=? and id_vac<? and fecha_inicio>?;";
        $sql = "SELECT * FROM t_vacaciones where n_ci=? and id_vac<?;";
        //$sql = "SELECT * FROM t_vacaciones where n_ci=? and Tipo='Permiso'and id_vac<?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm->bindvalue(2, $id, PDO::PARAM_STR);
        //$stm->bindvalue(3, $fecha, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function calcula()
    {
        $sql = "SELECT * FROM t_vacaciones where n_ci=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function horasDisponiblesPorUser($id,$year)
    {
        $cant_d = 0;
//        $year=  date("Y");
        $sql = "SELECT * FROM t_vacaciones WHERE n_ci=? AND YEAR(fecha_inicio)=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $stm->bindvalue(2, $year, PDO::PARAM_STR);
        $stm->execute();
        $guardar = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($guardar as $gu)
        {
            $cant_d=$cant_d+$gu["cant_dias"];
        }
        return $cant_d;
    }
    public function insertVacacion($n_ci, $f_inicio, $f_fin, $cant_dias, $obs, $gestion, $tipo)
    {
        $sql = "INSERT INTO t_vacaciones ("
                . "n_ci,"
                . "fecha_inicio,"
                . "fecha_fin,"
                . "cant_dias,"
                . "obs,"
                . "Gestion,"
                . "Tipo)"
            ."VALUES(?, ?, ?, ?, ?, ?, ?);";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $n_ci, PDO::PARAM_STR);
        $stm->bindvalue(2, $f_inicio, PDO::PARAM_STR);
        $stm->bindvalue(3, $f_fin, PDO::PARAM_STR);
        $stm->bindvalue(4, $cant_dias, PDO::PARAM_STR);
        $stm->bindvalue(5, $obs, PDO::PARAM_STR);
        $stm->bindvalue(6, $gestion, PDO::PARAM_STR);
        $stm->bindvalue(7, $tipo, PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    public function deleteVacaciones($id)
    {
        $sql =  "delete from t_vacaciones where id_vac=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $valor = $stm->execute();
        return $valor;
    }
    public function ultimoRegistro($ci)
    {
        $sql = "SELECT MAX(id_vac) as max FROM t_vacaciones WHERE n_ci=?";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getVacacionPorId($id)
    {
        $sql = "SELECT * FROM `t_vacaciones` where id_vac = ?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function horasDisponiblesPorGestion($id,$fechai,$fechaf)
    {
        $cant_d = 0;
//        $year=  date("Y");
        $sql = "SELECT * from t_vacaciones WHERE n_ci=? and (fecha_inicio BETWEEN ? AND ?);";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $stm->bindvalue(2, $fechai, PDO::PARAM_STR);
        $stm->bindvalue(3, $fechaf, PDO::PARAM_STR);
        $stm->execute();
        $guardar = $stm->fetchAll(PDO::FETCH_ASSOC);
        //print_r($guardar);exit();
        foreach ($guardar as $gu)
        {
            $cant_d=$cant_d+$gu["cant_dias"];
        }
        return $cant_d;
    }
    public function calculaVacacion($id ,$cas, $fcas ,$fech_ini)
    {
        $vac = new Vacaciones();
        //$id=$_GET["ci"];
        $fech_act=  date("Y-m-d");
        $fechainicial = new DateTime($fech_ini);
        $fechafinal = new DateTime($fech_act);
        //echo "actual ".$fech_act." fin ".$fech_ini;die();
        $diferencia = $fechainicial->diff($fechafinal);
        $meses = ( $diferencia->y * 12 ) + $diferencia->m;
        $años = $meses/12;
        /*Calcular años extras*/
        $c_cas = 0;
        $c_ant = 0;
        if($años>=10)
        {
            $c_ant=$c_ant+15;
        }
        elseif($años>=5)
        {
            $c_ant=$c_ant+5;
        }
        /*Calcular años cas*/
        if($cas>=10)
        {
            $c_cas=$c_cas+15;
        }
        elseif($cas>=5)
        {
            $c_cas=$c_cas+5;
        }
        $dias=15;
        $extras=$c_ant+$c_cas;
        //echo $extras;die();
        /*TABLA VACACIONES*/
        if($fcas=="")
        {
          $fcas="no tiene";  
        }
        if($cas==0)
        {
          $cas="no tiene";  
        }
        if($años>=3)
        {
            $nuevafecha = strtotime ( '+1 year' , strtotime ( $fech_ini ) ) ;
            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
            
            $nuevafecha1 = strtotime ( '+1 year' , strtotime ( $nuevafecha ) ) ;
            $nuevafecha1 = date ( 'Y-m-j' , $nuevafecha1 );
            
            $nuevafecha2 = strtotime ( '+1 year' , strtotime ( $nuevafecha1 ) ) ;
            $nuevafecha2 = date ( 'Y-m-j' , $nuevafecha2 );
            
            $nuevafecha3 = strtotime ( '+1 year' , strtotime ( $nuevafecha2 ) ) ;
            $nuevafecha3 = date ( 'Y-m-j' , $nuevafecha3 );
                        /*Dias utilizados*/
            $diasUtilizados = $vac->horasDisponiblesPorGestion($id,$nuevafecha,$nuevafecha1);
            /*Dias utilizados 2*/
            //echo $nuevafecha." ".$nuevafecha1." ".$nuevafecha2;exit();
            $diasUtilizados1 = $vac->horasDisponiblesPorGestion($id,$nuevafecha1,$nuevafecha2);
            
            $diasUtilizados2 = $vac->horasDisponiblesPorGestion($id,$nuevafecha2,$nuevafecha3);
            /*array*/ 
            $vac_gestion = array
            (
              /*Gestion Actual*/
              array(
                  'c_fecha'=>$fcas,
                  'c_year'=>$cas,
                  'v_dias'=>$dias+$extras,
                  'v_dias_u'=>$diasUtilizados2,
                  'v_saldo'=>3*($dias+$extras)-($diasUtilizados+$diasUtilizados1+$diasUtilizados2),
                  ),
              /*Utima Gestion*/
              array(
                  'c_fecha'=>$fcas,
                  'c_year'=>$cas,
                  'v_dias'=>$dias+$extras,
                  'v_dias_u'=>$diasUtilizados1,
                  'v_saldo'=>2*($dias+$extras)-($diasUtilizados+$diasUtilizados1),
                  ),
              /*Penultima Gestion*/
              array(
                  'c_fecha'=>$fcas,
                  'c_year'=>$cas,
                  'v_dias'=>$dias+$extras,
                  'v_dias_u'=>$diasUtilizados,
                  'v_saldo'=>($dias+$extras)-$diasUtilizados,
                  ),
            );
            /*fin array*/
        }
        elseif($años>=2)
        {
            $nuevafecha = strtotime ( '+1 year' , strtotime ( $fech_ini ) ) ;
            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
            $nuevafecha1 = strtotime ( '+1 year' , strtotime ( $nuevafecha ) ) ;
            $nuevafecha1 = date ( 'Y-m-j' , $nuevafecha1 );
            $nuevafecha2 = strtotime ( '+1 year' , strtotime ( $nuevafecha1 ) ) ;
            $nuevafecha2 = date ( 'Y-m-j' , $nuevafecha2 );
            /*Dias utilizados*/
            $diasUtilizados = $vac->horasDisponiblesPorGestion($id,$nuevafecha,$nuevafecha1);
            /*Dias utilizados 2*/
            //echo $nuevafecha." ".$nuevafecha1." ".$nuevafecha2;exit();
            $diasUtilizados1 = $vac->horasDisponiblesPorGestion($id,$nuevafecha1,$nuevafecha2);
            /*array*/ 
            $vac_gestion = array
            (
              /*Gestion Actual*/
              array(
                  'c_fecha'=>$fcas,
                  'c_year'=>$cas,
                  'v_dias'=>$dias+$extras,
                  'v_dias_u'=>$diasUtilizados1,
                  'v_saldo'=>2*($dias+$extras)-($diasUtilizados+$diasUtilizados1),
                  ),
              /*Utima Gestion*/
              array(
                  'c_fecha'=>$fcas,
                  'c_year'=>$cas,
                  'v_dias'=>$dias+$extras,
                  'v_dias_u'=>$diasUtilizados,
                  'v_saldo'=>($dias+$extras)-$diasUtilizados,
                  ),
              /*Penultima Gestion*/
              array(
                  'c_fecha'=>$fcas,
                  'c_year'=>$cas,
                  'v_dias'=>0,
                  'v_dias_u'=>0,
                  'v_saldo'=>0,
                  ),
            );
            /*fin array*/
        }
        elseif($años>=1)
        {
            $nuevafecha = strtotime ( '+1 year' , strtotime ( $fech_ini ) ) ;
            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
            $nuevafecha1 = strtotime ( '+1 year' , strtotime ( $nuevafecha ) ) ;
            $nuevafecha1 = date ( 'Y-m-j' , $nuevafecha1 );
            //echo $id.' '.$fech_ini." ".$nuevafecha;die();
            $diasUtilizados = $vac->horasDisponiblesPorGestion($id,$nuevafecha,$nuevafecha1);
            /*array*/ 
            $vac_gestion = array
            (
              /*Gestion Actual*/
              array(
                  'c_fecha'=>$fcas,
                  'c_year'=>$cas,
                  'v_dias'=>$dias+$extras,
                  'v_dias_u'=>$diasUtilizados,
                  'v_saldo'=>($dias+$extras)-$diasUtilizados,
                  ),
              /*Utima Gestion*/
              array(
                  'c_fecha'=>$fcas,
                  'c_year'=>$cas,
                  'v_dias'=>0,
                  'v_dias_u'=>0,
                  'v_saldo'=>0,
                  ),
              /*Penultima Gestion*/
              array(
                  'c_fecha'=>$fcas,
                  'c_year'=>$cas,
                  'v_dias'=>0,
                  'v_dias_u'=>0,
                  'v_saldo'=>0,
                  ),
            );
            /*fin array*/
        }else
        {
            /*array*/ 
            $vac_gestion = array
            (
              /*Gestion Actual*/
              array(
                  'c_fecha'=>$fcas,
                  'c_year'=>$cas,
                  'v_dias'=>0,
                  'v_dias_u'=>0,
                  'v_saldo'=>0,
                  ),
              /*Utima Gestion*/
              array(
                  'c_fecha'=>"",
                  'c_year'=>"",
                  'v_dias'=>0,
                  'v_dias_u'=>0,
                  'v_saldo'=>0,
                  ),
              /*Penultima Gestion*/
              array(
                  'c_fecha'=>"",
                  'c_year'=>"",
                  'v_dias'=>0,
                  'v_dias_u'=>0,
                  'v_saldo'=>0,
                  ),
            );
            /*fin array*/
        }
        
        //die();
        return $vac_gestion;
    }
}