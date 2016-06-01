<?php
require_once("class.php");
class Usuario
{
    //private $tipo;
    protected function  _getDbh()
    {
        return Conectar::getInstance()->getConn();
    }
    //Conexion Normal
    public function logueoAdmin($user, $pass)
    {
        var_dump($user, $pass);
        $sql1 = "SELECT  * FROM se_users WHERE username = ? and password = ?;";
        $stm1 = $this->_getDbh()->prepare($sql1);
        $stm1->BindParam(1, $user, PDO::PARAM_INT);
        $stm1->BindParam(2, $pass, PDO::PARAM_INT);
        $stm1->execute();
        $guardar1 = $stm1->fetch(PDO::FETCH_ASSOC);
        var_dump($guardar1);
        if($guardar1 == FALSE) {
            header("Location: login.php?m=2");
        } else {
            $_SESSION["cod"]=$guardar1["user_id"];
            $_SESSION["nivel"]=$guardar1["u_rol"];
            $_SESSION["nombre"]=$guardar1["u_nombre"]." ".$guardar1["u_apellidoPat"]." ".$guardar1["u_apellidoMat"];
            if($guardar1["u_rol"] == "admin"){
                header("Location: adUsers.php");
            } else {
                header("Location: index.php");
            }
            exit();
        }
    }
    
    public function logueo($ci)
    {
        $sql = "SELECT s_nombre, s_paterno, s_materno, n_ci FROM t_funcionario WHERE n_ci= ? and b_estado=1;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->BindParam(1, $ci, PDO::PARAM_INT);
        $stm->execute();
        //print $this->_getDbh()->errorCode();
        //exit();
        $guardar = $stm->fetch(PDO::FETCH_ASSOC);
        if($guardar == FALSE){
            header("Location: login.php?m=2");
            exit();
        }else{
            $_SESSION["cedula"]=$ci;
            $_SESSION["nombre"]=$guardar["s_nombre"]." ".$guardar["s_paterno"]." ".$guardar["s_materno"];
            //$_SESSION["ses_nombre"]=$guardar["nombre"];
            
            header("Location: home.php");
            exit();
        }
    }
    
    public function getUsersAll()
    {
        $sSql = "SELECT * FROM se_users order by u_apellidoPat;";
        $stm = $this->_getDbh()->prepare($sSql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /////////////////********Function Old***************//////////////////////
    public function getUserForId($sId)
    {
        $sql = "SELECT * FROM se_users WHERE user_id=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $sId, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
 
    /*Create*/
    public function InsertUser($aDatos=array())
    {
        $sql = "insert "
                . "into se_users("
                . "u_ci,"
                . "u_exp,"
                . "u_nombre,"
                . "u_apellidoPat,"
                . "u_apellidoMat,"
                . "u_estado,"
                . "s_sexo,"
                . "u_discapacitado,"
                . "u_modificacion,"
                . "u_rol,"
                . "username,"
                . "password) "
                . "values ("
                . "?,?,?,?,?,?,?,?,?,?,?,?)";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $aDatos["ci"], PDO::PARAM_INT);
        $stm->bindvalue(2, $aDatos["exp"], PDO::PARAM_STR);
        $stm->bindvalue(3, $aDatos["nombre"], PDO::PARAM_STR);
        $stm->bindvalue(4, $aDatos["paterno"], PDO::PARAM_STR);
        $stm->bindvalue(5, $aDatos["materno"], PDO::PARAM_STR);
        $stm->bindvalue(6, $aDatos["estado"], PDO::PARAM_INT);
        $stm->bindvalue(7, $aDatos["sexo"], PDO::PARAM_STR);
        $stm->bindvalue(8, $aDatos["disc"], PDO::PARAM_INT);
        $stm->bindvalue(9, date("Y-m-d H:m:s"), PDO::PARAM_STR);
        $stm->bindvalue(10, $aDatos["rol"], PDO::PARAM_STR);
        $stm->bindvalue(11, $aDatos["username"], PDO::PARAM_STR);
        $stm->bindvalue(12, $aDatos["password"], PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    
    public function updateUser($aDatos=array())
    {
        /*
            $sql = "UPDATE  t_funcionario 
            SET n_ci=?, s_expedido=?, s_nombre=?, s_paterno=?, s_materno=?, b_estado=?,s_sexo=?, s_rutafoto = ?, f_modificacion = ?
            WHERE NRO=?";
         *          */
        $sql = "UPDATE "
                . "se_users SET "
                . "u_ci = ?,"
                . "u_exp = ?,"
                . "u_nombre = ?,"
                . "u_apellidoPat = ?,"
                . "u_apellidoMat = ?,"
                . "u_estado = ?,"
                . "s_sexo = ?,"
                . "u_discapacitado = ?,"
                . "u_modificacion = ?,"
                . "b_tutorNombre = ?,"
                . "u_rol = ?,"
                . "username = ?,"
                . "password = ? "
                . "WHERE user_id =?";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $aDatos["ci"], PDO::PARAM_INT);//
        $stm->bindvalue(2, $aDatos["exp"], PDO::PARAM_STR);
        $stm->bindvalue(3, $aDatos["nombre"], PDO::PARAM_STR);
        $stm->bindvalue(4, $aDatos["paterno"], PDO::PARAM_STR);
        $stm->bindvalue(5, $aDatos["materno"], PDO::PARAM_STR);
        $stm->bindvalue(6, $aDatos["estado"], PDO::PARAM_INT);
        $stm->bindvalue(7, $aDatos["sexo"], PDO::PARAM_STR);
        $stm->bindvalue(8, $aDatos["disc"], PDO::PARAM_INT);
        $stm->bindvalue(9, date("Y-m-d H:m:s"), PDO::PARAM_STR);
        $stm->bindvalue(10, $aDatos["tutorNombre"], PDO::PARAM_STR);
        $stm->bindvalue(11, $aDatos["rol"], PDO::PARAM_STR);
        $stm->bindvalue(12, $aDatos["username"], PDO::PARAM_STR);
        $stm->bindvalue(13, $aDatos["password"], PDO::PARAM_STR);
        $stm->bindvalue(14, $aDatos["id"], PDO::PARAM_STR);
        $result = $stm->execute();
        //$statement = $stm->prepare($sql);
        //$result = $stm->debugDumpParams();
        //var_dump($statement);
        //die("====");
        //errorCode
        return $result;
    }
    
    /*public function updateUser($aData = array())
    {
        $sql = "UPDATE  t_funcionario 
                SET n_ci=?, s_expedido=?, s_nombre=?, s_paterno=?, s_materno=?, b_estado=?,s_sexo=?, s_rutafoto = ?, f_modificacion = ?
                WHERE NRO=?";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $_POST["ci"], PDO::PARAM_STR);
        $stm->bindvalue(2, $_POST["exp"], PDO::PARAM_STR);
        $stm->bindvalue(3, $_POST["nombre"], PDO::PARAM_STR);
        $stm->bindvalue(4, $_POST["paterno"], PDO::PARAM_STR);
        $stm->bindvalue(5, $_POST["materno"], PDO::PARAM_STR);
        $stm->bindvalue(6, $_POST["estado"], PDO::PARAM_STR);
        $stm->bindvalue(7, $_POST["sexo"], PDO::PARAM_STR);
        $stm->bindvalue(8, $foto, PDO::PARAM_STR);
        $stm->bindvalue(9, date("Y-m-d"), PDO::PARAM_STR);
        $stm->bindvalue(10, $_POST["codigo"], PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }*/
    
    public function insertNoteOfUser($aData = array()){
        $sql = "insert "
                . "into se_alumno_ejercicio("
                . "descripcion,"
                . "puntuacion,"
                . "user_id,"
                . "id_eje)"
                . "values ("
                . "?,?,?,?)";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $aData["descripcion"], PDO::PARAM_INT);
        $stm->bindvalue(2, $aData["puntuacion"], PDO::PARAM_STR);
        $stm->bindvalue(3, $aData["user_id"], PDO::PARAM_STR);
        $stm->bindvalue(4, $aData["id_eje"], PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    //$iTotal, "Vocales", $_SESSION["cod"]);
    public function updateNoteOfUser($iTotal, $sDes, $sUser){
        $sql = "UPDATE  
                    se_alumno_ejercicio 
                SET 
                    puntuacion = ?
                WHERE 
                    descripcion = ? and user_id = ?";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $iTotal, PDO::PARAM_STR);
        $stm->bindvalue(2, $sDes, PDO::PARAM_STR);
        $stm->bindvalue(3, $sUser, PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    
    public function getNoteByUser($sType, $sIdUser)
    {
        $sql = "SELECT * FROM se_alumno_ejercicio WHERE descripcion = ? and user_id = ?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $sType, PDO::PARAM_STR);
        $stm->bindvalue(2, $sIdUser, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function notasGetByUser($sId){
        $sql = "SELECT * FROM se_alumno_ejercicio WHERE user_id = ?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $sId, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
        //$stm->execute();
        //return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}