    <?php
require_once("class.php");
class Trabajo
{
    //private $tipo;
    protected function  _getDbh()
    {
        return Conectar::getInstance()->getConn();
    }
    
    public function getTipo()
    {
        $sql = "SELECT cod_tipo,tipo FROM t_tipo_permiso order by cod_tipo;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getFuncionarioPorId($id)
    {
        $sql = "SELECT n_ci, s_nombre, s_paterno, s_materno FROM `t_funcionario` where n_ci = ?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function getUltimaFecha($date)
    {
        $sql = "SELECT * FROM `t_horario` WHERE f_Fecha = (select max(f_fecha) FROM t_horario h WHERE h.f_fecha <= ? )";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $date, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    //$c = "SELECT s_Valor FROM `t_parametros` WHERE s_Nombre = 'Horas_art_28'";
    public function getHorarioDias($cedula)
    {
        $cat_horas=0;
        $cat_horasd=0;
        //$ci=$_SESSION[""];
        $sql = "SELECT s_Valor FROM `t_parametros` WHERE s_Nombre = 'Horas_art_28'";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->execute();
        $valor = $stm->fetch(PDO::FETCH_ASSOC);
        $valor1=$valor["s_Valor"];
        $year=  date("Y");
        $sql1 = "SELECT n_dias FROM t_permisos where n_ci = ? and Gestion = ? and s_tipo = 'Permiso por anio';";
        $stm1 = $this->_getDbh()->prepare($sql1);
        $stm1->bindvalue(1, $cedula, PDO::PARAM_STR);
        $stm1->bindvalue(2, $year, PDO::PARAM_STR);
        $stm1->execute();
        $datos = $stm1->fetchAll(PDO::FETCH_ASSOC);
        foreach ($datos as $dato)
        {
            $cat_horas = $cat_horas + $dato["n_dias"];
        } 
        $cat_horasd = $valor1 - $cat_horas;
        return $cat_horasd;
    }
    public function getHorarioHoras($cedula)
    {
        $cat_horas=0;
        $cat_horasd=0;
        $sql = "SELECT s_Valor FROM `t_parametros` WHERE s_Nombre = 'Horas_art_29'";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->execute();
        $valor = $stm->fetch(PDO::FETCH_ASSOC);
        $valor1 = $valor["s_Valor"];
        $year =  date("Y");
        $month = date("m");
        $sql1 = "SELECT n_cant_horas FROM t_permisos where n_ci = ? and  Gestion = ? and Mes =? and s_tipo = 'Permisos por mes';";
        $stm1 = $this->_getDbh()->prepare($sql1);
        $stm1->bindvalue(1, $cedula, PDO::PARAM_STR);
        $stm1->bindvalue(2, $year, PDO::PARAM_STR);
        $stm1->bindValue(3, $month, PDO::PARAM_STR);
        $stm1->execute();
        $datos = $stm1->fetchAll(PDO::FETCH_ASSOC);
        foreach ($datos as $dato)
        {
            $cat_horas = $cat_horas + $dato["n_cant_horas"];
        } 
        $cat_horasd = $valor1 - $cat_horas;
        return $cat_horasd;
    }
    
    public function insertMotivo($n_ci, $s_tipo, $f_inicio, $t_hora_ini, $t_hora_fin, $n_cant_horas, $n_motivo, $n_salida, $n_lugar, $gestion, $mes)
    {
        $sql = "INSERT INTO t_permisos ("
                . "n_codpermiso,"
                . "n_ci,"
                . "s_tipo,"
                . "f_inicio,"
                . "t_hora_ini,"
                . "t_hora_fin,"
                . "n_cant_horas,"
                . "s_motivo,"
                . "s_salida,"
                . "s_lugar,"
                . "Gestion,"
                . "Mes)"
            ."VALUES(null,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $n_ci, PDO::PARAM_STR);
        $stm->bindvalue(2, $s_tipo, PDO::PARAM_STR);
        $stm->bindvalue(3, $f_inicio, PDO::PARAM_STR);
        $stm->bindvalue(4, $t_hora_ini, PDO::PARAM_STR);
        $stm->bindvalue(5, $t_hora_fin, PDO::PARAM_STR);
        $stm->bindvalue(6, $n_cant_horas, PDO::PARAM_STR);
        $stm->bindvalue(7, $n_motivo, PDO::PARAM_STR);
        $stm->bindvalue(8, $n_salida, PDO::PARAM_STR);
        $stm->bindvalue(9, $n_lugar, PDO::PARAM_STR);
        $stm->bindvalue(10,$gestion, PDO::PARAM_STR);
        $stm->bindvalue(11,$mes, PDO::PARAM_STR);
        //print_r($stm);exit();
        $result = $stm->execute();
        /*
        if($result != FALSE)
        {
            header("Location: registro_permisos.php?m=2");
        }
        */
        return $result;
    }
    public function insertAnual($n_ci, $s_tipo, $f_inicio, $f_fin, $n_dias, $n_motivo, $n_salida, $n_lugar, $gestion, $mes)
    {
        $sql = "INSERT INTO t_permisos ("
                . "n_codpermiso,"
                . "n_ci,"
                . "s_tipo,"
                . "f_inicio,"
                . "f_fin,"
                . "n_dias,"
                . "s_motivo,"
                . "s_salida,"
                . "s_lugar,"
                . "Gestion,"
                . "Mes)"
            ."VALUES(null,?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $n_ci, PDO::PARAM_STR);
        $stm->bindvalue(2, $s_tipo, PDO::PARAM_STR);
        $stm->bindvalue(3, $f_inicio, PDO::PARAM_STR);
        $stm->bindvalue(4, $f_fin, PDO::PARAM_STR);
        $stm->bindvalue(5, $n_dias, PDO::PARAM_STR);
        $stm->bindvalue(6, $n_motivo, PDO::PARAM_STR);
        $stm->bindvalue(7, $n_salida, PDO::PARAM_STR);
        $stm->bindvalue(8, $n_lugar, PDO::PARAM_STR);
        $stm->bindvalue(9,$gestion, PDO::PARAM_STR);
        $stm->bindvalue(10,$mes, PDO::PARAM_STR);
        //print_r($stm);exit();
        $result = $stm->execute();
        /*
        if($result != FALSE)
        {
            header("Location: registro_permisos.php?m=2");
        }
        */
        return $result;
    }
    public function getPermisoPorId($id)
    {
        $sql = "SELECT * FROM `t_permisos` where n_codpermiso = ?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function getCargoPorId($ci)
    {
        $sql = "SELECT * FROM `t_funcionario_item` where CI = ?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getDestinoPorId($ci)
    {
        $sql = "SELECT * FROM `t_destino` where n_ci = ?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function ultimoRegistro($ci)
    {
        $sql = "SELECT MAX(n_codpermiso) as max FROM t_permisos WHERE n_ci=?";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function getCassPorId($id)
    {
        $sql = "SELECT * FROM cas WHERE id_cas=?";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function getFuncionarioPorOfi($id)
    {
        $sql = "select * from t_funcionario as a, t_destino as b where a.n_ci=b.n_ci and a.b_estado=1 and n_codoficina=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOficinaPorId($id)
    {
        $sql = "select * from t_oficina where n_codoficina=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}