<?php
require_once("class.php");
class Oficina
{
    //private $tipo;
    protected function  _getDbh()
    {
        return Conectar::getInstance()->getConn();
    }
    
    public function getOfficeAll()
    {
        $sql = "SELECT * FROM t_oficina as a, t_edificio as b WHERE a.cod_edificio=b.cod_edificio ORDER BY n_codoficina ASC;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getOfficePorId($id)
    {
        $sql = "SELECT * FROM t_oficina as a, t_edificio as b WHERE a.cod_edificio=b.cod_edificio and n_codoficina = ?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->BindParam(1, $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getEdificioAll()
    {
        $sql = "SELECT * FROM t_edificio ORDER BY cod_edificio ASC;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getEdificioPorId($id)
    {
        $sql = "SELECT * FROM t_edificio where cod_edificio = ?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->BindParam(1, $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getItemAll()
    {
        $sql = "SELECT * FROM t_item ORDER BY nro_item ASC;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getItemPorId($id)
    {
        $sql = "SELECT * FROM t_item WHERE item_id=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->BindParam(1, $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    /*Insert*/
    public function InsertItem($datos=array())
    {
        //print_r($datos);
        //exit();
        $sql = "insert "
                . "into t_item("
                . "nro_item,"
                . "i_cargo,"
                . "i_puesto,"
                . "n_codoficina,"
                . "cod_edificio,"
                . "i_dependencia) values ("
                . "?,?,?,?,?,?)";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $datos["nro_item"], PDO::PARAM_STR);
        $stm->bindvalue(2, $datos["i_cargo"], PDO::PARAM_STR);
        $stm->bindvalue(3, $datos["i_puesto"], PDO::PARAM_STR);
        $stm->bindvalue(4, $datos["n_codoficina"], PDO::PARAM_STR);
        $stm->bindvalue(5, $datos["cod_edificio"], PDO::PARAM_STR);
        $stm->bindvalue(6, $datos["i_dependencia"], PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }

}