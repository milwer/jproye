<?php
require_once("class.php");
class Permisos
{
    //private $tipo;
    protected function  _getDbh()
    {
        return Conectar::getInstance()->getConn();
    }
    
    public function getPermisosPorUser($id)
    {
        $sql = "SELECT * FROM t_permisos where n_ci=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deletePermisos($id, $ci)
    {
        $sql =  "SET SQL_SAFE_UPDATES=0;"
                . "delete from t_permisos where n_codpermiso=? and n_ci=?";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $id, PDO::PARAM_STR);
        $stm->bindvalue(2, $ci, PDO::PARAM_STR);
        $valor = $stm->execute();
        return $valor;
    }
    
    public function PermisosPorGestion($gestion)
    {
        //$fecha=(date("Y")-1)."01-01";
        //$sql = "SELECT * FROM t_vacaciones where n_ci=? and id_vac<? and fecha_inicio>?;";
        $sql = "SELECT * FROM t_permisos where gestion=?;";
        //$sql = "SELECT * FROM t_vacaciones where n_ci=? and Tipo='Permiso'and id_vac<?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $gestion, PDO::PARAM_STR);
        //$stm->bindvalue(3, $fecha, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPermisosPorGestion($gestion)
    {
        $sql = "SELECT * from t_permisos where Gestion=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $gestion, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
        //SELECT * from t_permisos where Gestion='2014';
    }
}