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
    
    public function getExerByCourse($iUid) {
        $sql = "SELECT * FROM se_ejer_cont WHERE id_cur=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $iUid, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateExer($aDatos=array())
    {
        /*
            $sql = "UPDATE  t_funcionario 
            SET n_ci=?, s_expedido=?, s_nombre=?, s_paterno=?, s_materno=?, b_estado=?,s_sexo=?, s_rutafoto = ?, f_modificacion = ?
            WHERE NRO=?";
         *          */
        try {
                    $sql = "UPDATE "
                    . "se_ejer_cont SET "
                    . "titulo = ?,"
                    . "descripcion = ?,"
                    . "respuesta = ?,"
                    . "url = ? "
                    . "WHERE id_eje_cont =?";
            $stm = $this->_getDbh()->prepare($sql);
            $stm->bindvalue(1, $aDatos["titulo"], PDO::PARAM_INT);//
            $stm->bindvalue(2, $aDatos["descripcion"], PDO::PARAM_STR);
            $stm->bindvalue(3, $aDatos["respuesta"], PDO::PARAM_STR);
            $stm->bindvalue(4, $aDatos["url"], PDO::PARAM_STR);
            $stm->bindvalue(5, $aDatos["id"], PDO::PARAM_STR);
            $result = $stm->execute();
            //$statement = $stm->prepare($sql);
            
            //var_dump($statement);
            //die("====");
            //errorCode
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            die("==");
        }
    }
}