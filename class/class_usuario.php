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
    
    public function getAllUserId($ci)
    {
        $sql = "SELECT a.NRO, a.s_rutafoto, b.n_coddatos, c.n_coddestino,
        a.s_nombre, a.s_paterno, a.b_estado ,a.s_materno, a.f_modificacion , c.n_codoficina,
        a.n_ci, a.s_expedido, b.s_departamento, b.s_estadocivil, c.s_cargo , c.n_itemcontrato, c.f_inicio, 
        b.f_nacimiento, b.s_pais, a.s_sexo, b.s_zona, b.s_provincia, b.b_cass, b.s_direccion,
        b.s_referencia, b.n_telefono, b.n_celular, b.s_email
        FROM t_funcionario as a, t_datosfuncionario as b, t_destino as c 
        WHERE 
        a.n_ci=b.n_ci and a.n_ci=c.n_ci 
        and b.n_ci=c.n_ci
        and a.n_ci=?;
        ";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
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
    
    
    
    
    public function getFuncionarioDatosPorId($ci)
    {
        $sql = "SELECT * FROM t_datosfuncionario WHERE n_ci=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserAllActive()
    {
        //AND a.b_estado=1
        $sql = "SELECT a.n_ci, a.s_nombre, a.s_paterno, a.s_materno, b.s_cargo, a.b_estado FROM t_funcionario as a, t_destino as b WHERE a.n_ci=b.n_ci AND a.b_estado=1 ORDER BY a.s_nombre ASC;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUserAllPasive()
    {
        $sql = "SELECT a.n_ci, a.s_nombre, a.s_paterno, a.s_materno, b.s_cargo, a.b_estado FROM t_funcionario as a, t_destino as b WHERE a.n_ci=b.n_ci AND a.b_estado=0 ORDER BY a.s_nombre ASC;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUserAllAdmin()
    {
        $sql = "SELECT a.n_ci, a.s_nombre, a.s_paterno, a.s_materno, a.b_estado, b.s_nombre as username, b.s_nivel, b.n_codusuario FROM t_funcionario as a, t_usuario as b WHERE a.n_ci=b.ci AND a.b_estado=1 ORDER BY a.s_nombre;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCass($ci)
    {
        /*registro mas reciente*/
        $sql2='select max(id_cas) as id from cas where n_ci=?;';
        $stm1 = $this->_getDbh()->prepare($sql2);
        $stm1->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm1->execute();
        $max = $stm1->fetch(PDO::FETCH_ASSOC);
        /**/
        $nro_a=0;
        $sql = "SELECT * FROM cas WHERE n_ci=? and id_cas =?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm->bindvalue(2, $max["id"], PDO::PARAM_STR);
        $stm->execute();
        $guardar = $stm->fetchAll(PDO::FETCH_ASSOC);
        //print_r($guardar);
        //exit();
        foreach ($guardar as $gua)
        {
            $nro_a=$nro_a+$gua["n_cass"];
        }
        if(isset($guardar[0]["f_emision"]))
        {
            //echo 'si';
            $fecha = $guardar[0]["f_emision"];
        }else
        {
            //echo 'no';
            $fecha = 'no tiene';
        }
        if($nro_a=="")
        {
            $nro_a ="no tiene";
        }
        $datos = array('cant_a'=>$nro_a,'fecha_c'=>$fecha);
        return $datos;
    }
    /*Create*/
    public function InsertUser($aDatos=array())
    {
        //print_r($datos);
        //exit();
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
    public function InsertDes($datos=array())
    {
        //print_r($datos);
        //exit();
        $sql = "insert "
                . "into t_destino("
                . "n_ci,"
                . "n_codoficina,"
                . "s_tipocontrato,"
                . "n_itemcontrato,"
                . "n_sueldo,"
                . "f_inicio,"
                . "f_modificacion) values ("
                . "?,?,?,?,?,?,?)";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $datos["n_ci"], PDO::PARAM_STR);
        $stm->bindvalue(2, $datos["n_codoficina"], PDO::PARAM_STR);
        $stm->bindvalue(3, $datos["s_tipocontrato"], PDO::PARAM_STR);
        $stm->bindvalue(4, $datos["n_itemcontrato"], PDO::PARAM_STR);
        $stm->bindvalue(5, $datos["n_sueldo"], PDO::PARAM_STR);
        $stm->bindvalue(6, $datos["f_inicio"], PDO::PARAM_STR);
        $stm->bindvalue(7, date("Y-m-d"), PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    
    public function InsertMovimiento($datos=array())
    {
        //print_r($datos);
        //exit();
        $sql = "insert "
                . "into t_movimiento_funcionario("
                . "n_ci,"
                . "s_tipo_mov,"
                . "f_movimiento,"
                . "d_fechaalta,"
                . "d_fechabaja,"
                . "s_tipocontrato,"
                . "n_itemcontrato,"
                . "s_cargo,"
                . "n_salario,"
                . "n_codoficina,"
                . "n_codusuario,"
                . "f_modificacion) values ("
                . "?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $datos["n_ci"], PDO::PARAM_STR);
        $stm->bindvalue(2, 'alta', PDO::PARAM_STR);
        $stm->bindvalue(3, $datos["f_inicio"], PDO::PARAM_STR);
        $stm->bindvalue(4, $datos["f_inicio"], PDO::PARAM_STR);
        $stm->bindvalue(5, '0000-00-00', PDO::PARAM_STR);
        $stm->bindvalue(6, $datos["s_tipocontrato"], PDO::PARAM_STR);
        $stm->bindvalue(7, $datos["n_itemcontrato"], PDO::PARAM_STR);
        $stm->bindvalue(8, $datos["s_cargo"], PDO::PARAM_STR);
        $stm->bindvalue(9, $datos["n_sueldo"], PDO::PARAM_STR);
        $stm->bindvalue(10, $datos["n_codoficina"], PDO::PARAM_STR);
        $stm->bindvalue(11, $_SESSION["cod"], PDO::PARAM_STR);
        $stm->bindvalue(12, date("Y-m-d"), PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    
    public function InsertDatosFun($datos=array())
    {
        //print_r($datos);
        //exit();
        $sql = "insert "
                . "into t_datosfuncionario("
                . "n_ci,"
                . "s_zona,"
                . "s_direccion,"
                . "f_nacimiento,"
                . "s_pais,"
                . "s_departamento,"
                . "s_provincia,"
                . "s_estadocivil,"
                . "b_cass,"
                . "s_anos_cas,"
                . "s_email,"
                . "n_telefono,"
                . "n_celular,"
                . "f_modificacion) values ("
                . "?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $datos["n_ci"], PDO::PARAM_STR);
        $stm->bindvalue(2, $datos["s_zona"], PDO::PARAM_STR);
        $stm->bindvalue(3, $datos["s_direccion"], PDO::PARAM_STR);
        $stm->bindvalue(4, $datos["f_nacimiento"], PDO::PARAM_STR);
        $stm->bindvalue(5, $datos["s_pais"], PDO::PARAM_STR);
        $stm->bindvalue(6, $datos["s_departamento"], PDO::PARAM_STR);
        $stm->bindvalue(7, $datos["s_provincia"], PDO::PARAM_STR);
        $stm->bindvalue(8, $datos["s_estadocivil"], PDO::PARAM_STR);
        $stm->bindvalue(9, $datos["b_cass"], PDO::PARAM_STR);
        $stm->bindvalue(10, $datos["s_anos_cas"], PDO::PARAM_STR);
        $stm->bindvalue(11, $datos["s_email"], PDO::PARAM_STR);
        $stm->bindvalue(12, $datos["n_telefono"], PDO::PARAM_STR);
        $stm->bindvalue(13, $datos["n_celular"], PDO::PARAM_STR);
        $stm->bindvalue(14, date("Y-m-d"), PDO::PARAM_STR);
        $result = $stm->execute();
        /*if($result==TRUE)
        {
            echo 'correcto';
        }else
        {
            echo 'fallo';
        }
        if (!$stm) { 
            echo "\nPDO::errorInfo():\n"; 
            print_r($this->_getDbh()->errorInfo()); 
        } 
        
        exit();*/
        return $result;
    }
    
    public function InsertFormacion($datos=array())
    {
        //print_r($datos);
        //exit();
        $sql = "insert "
                . "into t_formacionacademica("
                . "n_ci,"
                . "s_especialidad,"
                . "s_nombreforma,"
                . "n_ano,"
                . "f_modificacion) values ("
                . "?,?,?,?,?)";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $datos["n_ci"], PDO::PARAM_STR);
        $stm->bindvalue(2, $datos["s_especialidad"], PDO::PARAM_STR);
        $stm->bindvalue(3, $datos["s_nombreforma"], PDO::PARAM_STR);
        $stm->bindvalue(4, $datos["n_ano"], PDO::PARAM_STR);
        $stm->bindvalue(5, date("Y-m-d"), PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    
    public function InsertCas($datos=array())
    {
        //print_r($datos);
        //exit();
        /*
            (
            "n_ci"=>$_GET["ci"],
            "b_cass"=>$_POST["cas"],
            "f_cass"=>$_POST["f_cas"],
            "f_emision"=>$_POST["f_em_cas"],
            "n_cass"=>$_POST["a_cas"],
            "Gestion"=>$f_inicio,
            );
         *          */
        $sql = "insert "
                . "into cas("
                . "n_ci,"
                . "b_cass,"
                . "f_cass,"
                . "f_emision,"
                . "n_cass,"
                . "Gestion"
                . ") values ("
                . "?,?,?,?,?,?)";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $datos["n_ci"], PDO::PARAM_STR);
        $stm->bindvalue(2, $datos["b_cass"], PDO::PARAM_STR);
        $stm->bindvalue(3, $datos["f_cass"], PDO::PARAM_STR);
        $stm->bindvalue(4, $datos["f_emision"], PDO::PARAM_STR);
        $stm->bindvalue(5, $datos["n_cass"], PDO::PARAM_STR);
        $stm->bindvalue(6, $datos["Gestion"], PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    /*Update*/
    public function EditFun()
    {
        
        $foto=$_POST["rutafoto"];
        if($_FILES["foto"]["tmp_name"]!="")
        {
            $foto = $_POST["ci"]."-".date("Y-m-d").".jpg";
            copy($_FILES["foto"]["tmp_name"], "doc/fotos_fun/".$_FILES["foto"]["name"]);
            //creamos una instancia de la clase thumbnail y le pasamos como parámetro el nombre que le dimos a la foto en el FTP
            $thumb=new thumbnail("doc/fotos_fun/".$_FILES["foto"]["name"]);	
            $thumb->size_width(80);//setea el ancho de la copia
            $thumb->size_height(80);//setea el alto de la copia
            $thumb->jpeg_quality(75);//setea la calidad jpg
            $thumb->save("doc/fotos_fun/$foto");	//guardarla en el servidor
            //$thumb->show();	//mostrar la imagen copiada
            unlink("doc/fotos_fun/".$_FILES["foto"]["name"]);
            //echo $foto;
        }
        /*
        print_r($_POST);
        print_r($_FILES);
        exit();
        */
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
    }
    
    public function EditFun2()
    {

        $sql = "UPDATE  t_funcionario 
                SET 
                n_ci=?,
                s_expedido=?,
                s_nombre=?,
                s_paterno=?,
                s_materno=?,
                b_estado=?,
                s_sexo=?,
                f_modificacion = ?
                WHERE NRO=?";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $_POST["ci"], PDO::PARAM_STR);
        $stm->bindvalue(2, $_POST["exp"], PDO::PARAM_STR);
        $stm->bindvalue(3, $_POST["nombre"], PDO::PARAM_STR);
        $stm->bindvalue(4, $_POST["paterno"], PDO::PARAM_STR);
        $stm->bindvalue(5, $_POST["materno"], PDO::PARAM_STR);
        $stm->bindvalue(6, $_POST["estado"], PDO::PARAM_STR);
        $stm->bindvalue(7, $_POST["sexo"], PDO::PARAM_STR);
        $stm->bindvalue(8, date("Y-m-d"), PDO::PARAM_STR);
        $stm->bindvalue(9, $_POST["codigo"], PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    
    
    public function EditDatosFun()
    {
        /*
        print_r($_POST);
        exit();
        */
        $sql = "UPDATE  t_datosfuncionario 
        SET 
        s_zona=?, 
        s_direccion=?, 
        f_nacimiento=?, 
        s_pais=?, 
        s_departamento=?, 
        s_provincia=?,
        s_estadocivil=?, 
        b_cass = ?, 
        s_email = ?,
        n_telefono = ?,
        n_celular = ?,
        f_modificacion = ?
        WHERE n_coddatos=?";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $_POST["zona"], PDO::PARAM_STR);
        $stm->bindvalue(2, $_POST["direccion"], PDO::PARAM_STR);
        $stm->bindvalue(3, $_POST["fechanac"], PDO::PARAM_STR);
        $stm->bindvalue(4, $_POST["nacionalidad"], PDO::PARAM_STR);
        $stm->bindvalue(5, $_POST["departamento"], PDO::PARAM_STR);
        $stm->bindvalue(6, $_POST["provincia"], PDO::PARAM_STR);
        $stm->bindvalue(7, $_POST["estado_civil"], PDO::PARAM_STR);
        $stm->bindvalue(8, $_POST["cas"], PDO::PARAM_STR);
        $stm->bindvalue(9, $_POST["correo"], PDO::PARAM_STR);
        $stm->bindvalue(10, $_POST["telefono"], PDO::PARAM_STR);
        $stm->bindvalue(11, $_POST["celular"], PDO::PARAM_STR);
        $stm->bindvalue(12, date("Y-m-d"), PDO::PARAM_STR);
        $stm->bindvalue(13, $_POST["codigodatos"], PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    
    public function EditDestino()
    {
        /*
        print_r($_POST);
        exit();
        */
        $sql = "UPDATE  t_destino 
        SET 
        n_codoficina=?, 
        s_cargo=?, 
        n_itemcontrato=?, 
        n_sueldo=?, 
        f_inicio=?, 
        f_final=?,
        f_modificacion = ?
        WHERE n_coddestino=?";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $_POST["oficina"], PDO::PARAM_STR);
        $stm->bindvalue(2, $_POST["cargo"], PDO::PARAM_STR);
        $stm->bindvalue(3, $_POST["item"], PDO::PARAM_STR);
        $stm->bindvalue(4, $_POST["sueldo"], PDO::PARAM_STR);
        $stm->bindvalue(5, $_POST["f_inicio"], PDO::PARAM_STR);
        $stm->bindvalue(6, $_POST["f_final"], PDO::PARAM_STR);
        $stm->bindvalue(7, date("Y-m-d"), PDO::PARAM_STR);
        $stm->bindvalue(8, $_POST["codigodestino"], PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    
    public function EditFormacion()
    {
        /*
        print_r($_POST);
        exit();
        */
        $sql = "UPDATE  t_formacionacademica 
        SET 
        s_especialidad=?, 
        s_nombreforma=?, 
        n_ano=?, 
        f_modificacion = ?
        WHERE n_codformacademica=?";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $_POST["especialidad"], PDO::PARAM_STR);
        $stm->bindvalue(2, $_POST["formacion"], PDO::PARAM_STR);
        $stm->bindvalue(3, $_POST["gestion"], PDO::PARAM_STR);
        $stm->bindvalue(4, date("Y-m-d"), PDO::PARAM_STR);
        $stm->bindvalue(5, $_POST["codigoformacion"], PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    /*Delete*/
    public function DeleteUser($ci, $fecha, $datos=array())
    {
        //var_dump($datos);die();
        /*Dar de Baja*/
        $sql1="Update t_funcionario Set b_estado='0' where n_ci=?";
        $stm1 = $this->_getDbh()->prepare($sql1);
        $stm1->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm1->execute();
        
        $sql = "insert  into t_movimiento_funcionario("
                . "n_ci,"
                . "s_tipo_mov,"
                . "f_movimiento,"
                . "d_fechabaja,"
                . "s_itemcontrato,"
                . "n_itemcontrato,"
                . "s_cargo,"
                . "n_salario,"
                . "n_codoficina,"
                . "n_codusuario,"
                . "f_modificacion"
                . ") values ("
                . "?,?,?,?,?,?,?,?,?,?,?)";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm->bindvalue(2, "baja", PDO::PARAM_STR);
        $stm->bindvalue(3, $fecha, PDO::PARAM_STR);
        $stm->bindvalue(4, $fecha, PDO::PARAM_STR);
        $stm->bindvalue(5, $datos["s_itemcontrato"], PDO::PARAM_STR);
        $stm->bindvalue(6, $datos["n_itemcontrato"], PDO::PARAM_STR);
        $stm->bindvalue(7, $datos["s_cargo"], PDO::PARAM_STR);
        $stm->bindvalue(8, $datos["n_sueldo"], PDO::PARAM_STR);
        $stm->bindvalue(9, $datos["n_codoficina"], PDO::PARAM_STR);
        $stm->bindvalue(10, $_SESSION["cod"], PDO::PARAM_STR);
        $stm->bindvalue(11, date("Y-m-d"), PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    public function getUsuariosPorOfi($id)
    {
        $sql = "select * from t_funcionario as a, t_destino as b where a.n_ci=b.n_ci and a.b_estado=1 and n_codoficina=?";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->BindParam(1, $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
        //select * from t_funcionario as a, t_destino as b where a.n_ci=b.n_ci and a.b_estado=1 and n_codoficina=".$_REQUEST["n_codoficina"]
    }
    
    /*Movimientos*/
    public function TraspasoUser($ci, $datos=array(), $destino=array())
    {
        //var_dump($destino);exit();
        /*Movimiento*/
        $sql2 = "insert  into t_movimiento_funcionario("
                . "n_ci,"
                . "s_tipo_mov,"
                . "f_movimiento,"
                . "d_fechabaja,"
                . "s_itemcontrato,"
                . "n_itemcontrato,"
                . "s_cargo,"
                . "n_salario,"
                . "n_codoficina,"
                . "n_codusuario,"
                . "f_modificacion"
                . ") values ("
                . "?,?,?,?,?,?,?,?,?,?,?)";
        $stm2 = $this->_getDbh()->prepare($sql2);
        $stm2->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm2->bindvalue(2, "transferencia", PDO::PARAM_STR);
        $stm2->bindvalue(3, $datos["fecha"], PDO::PARAM_STR);
        $stm2->bindvalue(4, $datos["fecha"], PDO::PARAM_STR);
        $stm2->bindvalue(5, $destino["s_tipocontrato"], PDO::PARAM_STR);
        $stm2->bindvalue(6, $destino["n_itemcontrato"], PDO::PARAM_STR);
        $stm2->bindvalue(7, $destino["s_cargo"], PDO::PARAM_STR);
        $stm2->bindvalue(8, $destino["n_sueldo"], PDO::PARAM_STR);
        $stm2->bindvalue(9, $destino["n_codoficina"], PDO::PARAM_STR);
        $stm2->bindvalue(10, $_SESSION["cod"], PDO::PARAM_STR);
        $stm2->bindvalue(11, date("Y-m-d"), PDO::PARAM_STR);
        $result2 = $stm2->execute();
        
        if($result2==FALSE)
        {
            header("Location: user_mov.php?ci=".$_GET["ci"]."&m=2");
        }
        /*Memo*/
        $sql = "insert  into t_memo("
                . "n_ci, "
                . "s_memo, "
                . "s_tipo, "
                . "s_observaciones, "
                . "f_memo,"
                . "n_codusuario,"
                . "f_modificacion,"
                . "f_ini,"
                . "f_fin) values ("
                . "?,?,?,?,?,?,?,?,?)";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm->bindvalue(2, $datos["memo"], PDO::PARAM_STR);
        $stm->bindvalue(3, $datos["tipo"], PDO::PARAM_STR);
        $stm->bindvalue(4, $datos["observacion"], PDO::PARAM_STR);
        $stm->bindvalue(5, $datos["fecha"], PDO::PARAM_STR);
        $stm->bindvalue(6, $_SESSION["cod"], PDO::PARAM_STR);
        $stm->bindvalue(7, date("Y-m-d"), PDO::PARAM_STR);
        $stm->bindvalue(8, '0000-00-00', PDO::PARAM_STR);
        $stm->bindvalue(9, '0000-00-00', PDO::PARAM_STR);
        $result = $stm->execute();
        if($result==FALSE)
        {
            header("Location: user_mov.php?ci=".$_GET["ci"]."&m=2");
        }
        //insert into t_movimiento_funcionario(n_ci,s_tipo_mov,f_movimiento,s_itemcontrato,n_itemcontrato,s_cargo,n_salario,n_codoficina,n_codusuario,f_modificacion,nulo) values('$ci','transferencia','$fechamemo','$tipo','$numero','$cargo','$sueldo','$codigo',$_SESSION[cu],NOW(),0)
        //var_dump($datos);die();
        /*Dar de Baja*/
        /*t_destino*/
        $sql1="Update t_destino Set n_codoficina=?, f_inicio=? where n_ci=?";
        $stm1 = $this->_getDbh()->prepare($sql1);
        $stm1->bindvalue(1, $datos["oficina"], PDO::PARAM_STR);
        $stm1->bindvalue(2, $datos["fecha"], PDO::PARAM_STR);
        $stm1->bindvalue(3, $ci, PDO::PARAM_STR);
        $result1 = $stm1->execute();
        return $result1;
        /*Memo*/
        //insert into t_memo
        //(n_ci, s_memo, s_tipo, s_observaciones, f_memo,n_codusuario,f_modificacion,f_ini,f_fin) 
        //values ('$ci', '$nummemo', '$tipomemo', '$observaciones', '$fechamemo',$_SESSION[cu],NOW(),'0000-00-00','0000-00-00')
        
    }
    public function RotacionUser($ci, $datos=array(), $destino=array())
    {
        //var_dump($destino);exit();
        /*Movimiento*/
        $sql2 = "insert  into t_movimiento_funcionario("
                . "n_ci,"
                . "s_tipo_mov,"
                . "f_movimiento,"
                . "d_fechabaja,"
                . "s_itemcontrato,"
                . "n_itemcontrato,"
                . "s_cargo,"
                . "n_salario,"
                . "n_codoficina,"
                . "n_codusuario,"
                . "f_modificacion"
                . ") values ("
                . "?,?,?,?,?,?,?,?,?,?,?)";
        $stm2 = $this->_getDbh()->prepare($sql2);
        $stm2->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm2->bindvalue(2, "Rotacion", PDO::PARAM_STR);
        $stm2->bindvalue(3, $datos["fecha"], PDO::PARAM_STR);
        $stm2->bindvalue(4, $datos["fecha"], PDO::PARAM_STR);
        $stm2->bindvalue(5, $destino["s_tipocontrato"], PDO::PARAM_STR);
        $stm2->bindvalue(6, $destino["n_itemcontrato"], PDO::PARAM_STR);
        $stm2->bindvalue(7, $destino["s_cargo"], PDO::PARAM_STR);
        $stm2->bindvalue(8, $destino["n_sueldo"], PDO::PARAM_STR);
        $stm2->bindvalue(9, $destino["n_codoficina"], PDO::PARAM_STR);
        $stm2->bindvalue(10, $_SESSION["cod"], PDO::PARAM_STR);
        $stm2->bindvalue(11, date("Y-m-d"), PDO::PARAM_STR);
        $result2 = $stm2->execute();
        
        if($result2==FALSE)
        {
            header("Location: user_mov.php?ci=".$_GET["ci"]."&m=2");
        }
        /*Memo*/
        $sql = "insert  into t_memo("
                . "n_ci, "
                . "s_memo, "
                . "s_tipo, "
                . "f_memo,"
                . "n_codusuario,"
                . "f_modificacion"
                . ") values ("
                . "?,?,?,?,?,?)";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $ci, PDO::PARAM_STR);
        $stm->bindvalue(2, $datos["memo"], PDO::PARAM_STR);
        $stm->bindvalue(3, $datos["tipo"], PDO::PARAM_STR);
        $stm->bindvalue(4, $datos["fecha"], PDO::PARAM_STR);
        $stm->bindvalue(5, $_SESSION["cod"], PDO::PARAM_STR);
        $stm->bindvalue(6, date("Y-m-d"), PDO::PARAM_STR);
        $result = $stm->execute();
        if($result==FALSE)
        {
            header("Location: user_mov.php?ci=".$_GET["ci"]."&m=2");
        }
        /*Dar de Baja*/
        /*
            'ci' => $_POST["ci"],
            'memo' => $_POST["memo"],
            'tipo' => $_POST["tipo"],
            'of_actual' => $_POST["of_actual"],
            'oficina' => $_POST["oficina"],
            'car_actual' => $_POST["car_actual"],
            'cargo' => $_POST["cargo"],
            'fecha' => $_POST["f_inicio"],
            'salario' => $_POST["salario"],
            'observacion' => $_POST["observacion"],
         *          */
        $sql1="Update t_destino Set "
                . "n_codoficina=?,"
                . "s_cambio=?,"
                . "s_cargo=?,"
                . "n_sueldo=?,"
                . "s_tipocontrato=?,"
                . "n_itemcontrato=?"
                . "where n_ci=?";
        $stm1 = $this->_getDbh()->prepare($sql1);
        $stm1->bindvalue(1, $datos["oficina"], PDO::PARAM_STR);
        $stm1->bindvalue(2, "Rotacion", PDO::PARAM_STR);
        $stm1->bindvalue(3, $datos["cargo"], PDO::PARAM_STR);
        $stm1->bindvalue(4, $datos["salario"], PDO::PARAM_STR);
        $stm1->bindvalue(5, "item", PDO::PARAM_STR);
        $stm1->bindvalue(6, $datos["item"], PDO::PARAM_STR);
        $stm1->bindvalue(7, $ci, PDO::PARAM_STR);
        $result1 = $stm1->execute();
        return $result1;
        /*Memo*/
         
    }
    public function insertMovimientoFun($datos=array())
    {
        $sql = "insert  into t_movimiento_funcionario("
                . "n_ci,"
                . "s_tipo_mov,"
                . "f_movimiento,"
                . "d_fechaalta,"
                . "s_itemcontrato,"
                . "n_itemcontrato,"
                . "s_cargo,"
                . "n_salario,"
                . "n_codoficina,"
                . "n_codusuario,"
                . "f_modificacion"
                . ") values ("
                . "?,?,?,?,?,?,?,?,?,?,?)";
        $stm2 = $this->_getDbh()->prepare($sql);
        $stm2->bindvalue(1, $datos["n_ci"], PDO::PARAM_STR);
        $stm2->bindvalue(2, $datos["s_tipo_mov"], PDO::PARAM_STR);
        $stm2->bindvalue(3, $datos["f_movimiento"], PDO::PARAM_STR);
        $stm2->bindvalue(4, $datos["d_fechaalta"], PDO::PARAM_STR);
        $stm2->bindvalue(5, $datos["s_itemcontrato"], PDO::PARAM_STR);
        $stm2->bindvalue(6, $datos["n_itemcontrato"], PDO::PARAM_STR);
        $stm2->bindvalue(7, $datos["s_cargo"], PDO::PARAM_STR);
        $stm2->bindvalue(8, $datos["n_salario"], PDO::PARAM_STR);
        $stm2->bindvalue(9, $datos["n_codoficina"], PDO::PARAM_STR);
        $stm2->bindvalue(10, $_SESSION["cod"], PDO::PARAM_STR);
        $stm2->bindvalue(11, date("Y-m-d"), PDO::PARAM_STR);
        $result2 = $stm2->execute();
        return $result2;
    }


    /*User Admin*/
    /*Create*/
    public function InsertUsuario($datos=array())
    {
                //print_r($datos);
        //exit();
        /*
        (
            'fun' => $_POST["fun"],
            'username' => $_POST["username"],
            'pass' => $_POST["titulo"],
            'nivel' => $_POST["nivel"],
            'estado' => $_POST["estado"],
        );
         *          */
        $sql = "insert "
                . "into t_usuario("
                . "s_nombre,"
                . "s_password,"
                . "s_nivel,"
                . "b_estado,"
                . "f_acceso,"
                . "ci) values ("
                . "?,?,?,?,?,?)";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->bindvalue(1, $datos["username"], PDO::PARAM_STR);
        $stm->bindvalue(2, $datos["pass"], PDO::PARAM_STR);
        $stm->bindvalue(3, $datos["nivel"], PDO::PARAM_STR);
        $stm->bindvalue(4, $datos["estado"], PDO::PARAM_STR);
        $stm->bindvalue(5, date("Y-m-d"), PDO::PARAM_STR);
        $stm->bindvalue(6, $datos["fun"], PDO::PARAM_STR);
        $result = $stm->execute();
        return $result;
    }
    /*Delete*/
    public function DeleteAdmin($id)
    {
        $sql = "DELETE FROM t_usuario Where n_codusuario=?;";
        $stm = $this->_getDbh()->prepare($sql);
        $stm->BindParam(1, $id, PDO::PARAM_INT);
        $result = $stm->execute();
        return $result;
        //select * from t_funcionario as a, t_destino as b where a.n_ci=b.n_ci and a.b_estado=1 and n_codoficina=".$_REQUEST["n_codoficina"]
    }
    
    
    
}