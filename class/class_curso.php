<?php
require_once("class.php");
class Curso
{
    //private $tipo;
    protected function  _getDbh()
    {
        return Conectar::getInstance()->getConn();
    }
    
    public function getAllCursos()
    {
        $sql = "SELECT * FROM se_cursos";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}