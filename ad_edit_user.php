<?php
require_once 'class/class_usuario.php';
require_once 'class/class_curso.php';
$oUser = new Usuario();
if($_SESSION["nivel"] and ($_SESSION["nivel"] == "admin" || $_SESSION["nivel"] == "docente")) {
    require_once 'header.php';
    $aDataUser = $oUser->getUserForId($_GET["id"]);
    //var_dump($aDataUser);
    //die();
    if(isset($_POST["grabar"]) && !empty($_POST)){
        $aData = array(
            'id' => $_GET["id"],
            'ci'=>$_POST['ci'],
            'exp'=>$_POST['exp'],
            'nombre'=>$_POST['nombre'],
            'paterno'=>$_POST['paterno'],
            'materno'=>$_POST['materno'],
            'estado'=>$_POST['estado'],
            'tutorNombre' => $_POST['tutor'],
            'sexo'=>$_POST['sexo'],
            'disc'=>$_POST['disc'],
            'tutor'=>$_POST['tutor'],
            'rol'=>$_POST['rol'],
            'username'=>$_POST['username'],
            'password'=>$_POST['password'],
        );
        $sResult = $oUser->updateUser($aData);
        if ($sResult==TRUE) {
            header("Location: ad_edit_user.php?id=".$_GET["id"]."&m=1");
        } else {
            header("Location: ad_edit_user.php?id=".$_GET["id"]."&m=2");
        }
        exit();
    }
?>
    <div class="col-sm-7">
        <!-- cabezera -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default text-left">
                    <div class="panel-body">
                        <center><h3>SISTEMA DE EDUCACION - ADMINISTRACION</h3></center>
                    </div>
                </div>
            </div>
        </div>
        <!-- menu -->
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="adUsers.php">INICIO</a></li>
                </ol>
            </div>
            <!--start-->
            <div class="col-sm-12 ">
                <!-- /.panel-heading -->
                <div class="panel-body color_content">
                <?php
                if(isset($_GET["m"])) {
                    switch ($_GET["m"]) {
                        case 1:
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Se ha guardado exitosamente los datos
                        </div>
                        <?php
                        break;
                        case 2:
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                ha ocurrido un error en el registro
                        </div>
                        <?php
                        break;
                    }
                }
                ?>
                    <!-- Tab panes -->
                            <form action="" method="post" name="form" enctype="multipart/form-data">
                                <table class="table table-hover tablesorter">
                                    <tbody>
                                        <tr>
                                            <th colspan="2" style="text-align: center;">MODIFICAR DATOS DEL USUARIO</th>
                                        </tr>
                                        <tr>
                                            <td>C. I.:<span style="color: red;"> *</span></td>
                                            <td>
                                                <input name="ci" class="form-control" value="<?php echo $aDataUser['u_ci']; ?>" title="Carnet de identidad" placeholder="Cedula de identidad">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Expedido :<span style="color: red;"> *</span></td>
                                            <td>
                                                <select name="exp" class="form-control">
                                                    <option value="">----</option>
                                                    <option value="BE" <?php echo   ($aDataUser['u_exp']=='BE'?'SELECTED':'')?>>BE</option>
                                                    <option value="CBBA" <?php echo ($aDataUser['u_exp']=='CBBA'?'SELECTED':'')?>>CBBA</option>
                                                    <option value="CHUQ" <?php echo ($aDataUser['u_exp']=='CHUQ'?'SELECTED':'')?>>CHUQ</option>
                                                    <option value="LP" <?php echo   ($aDataUser['u_exp']=='LP'?'SELECTED':'')?>>LP</option>
                                                    <option value="OR" <?php echo   ($aDataUser['u_exp']=='OR'?'SELECTED':'')?>>OR</option>
                                                    <option value="PTS" <?php echo  ($aDataUser['u_exp']=='PTS'?'SELECTED':'')?>>PTS</option>
                                                    <option value="PDO" <?php echo ($aDataUser['u_exp']=='PDO'?'SELECTED':'')?>>PDO</option>
                                                    <option value="TJA" <?php echo ($aDataUser['u_exp']=='TJA'?'SELECTED':'')?>>TJA</option>
                                                    <option value="SCZ" <?php echo ($aDataUser['u_exp']=='SCZ'?'SELECTED':'')?>>SCZ</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nombres :<span style="color: red;"> *</span></td>
                                            <td>
                                                <input name="nombre" class="form-control" value="<?php echo $aDataUser['u_nombre']; ?>" title="Nombre"  placeholder="Introdusca su nombre">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Apellido Paterno:<span style="color: red;"> *</span></td>
                                            <td>
                                                <input name="paterno" class="form-control" value="<?php echo $aDataUser['u_apellidoPat']; ?>" title="Apellido Paterno"  placeholder="Introdusca su apellido paterno">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Apellido Materno:</td>
                                            <td>
                                                <input name="materno" class="form-control" value="<?php echo $aDataUser['u_apellidoMat']; ?>" title="Apellido Materno"  placeholder="Introdusca su apellido materno">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Estado:<span style="color: red;"> *</span></td>
                                            <td>
                                                <select name="estado" class="form-control" >
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>                                                
                                                </select>
                                            </td>
                                        </tr>
                                        <!--
                                        <tr>
                                            <td>Foto :</td>
                                            <td>
                                            <input type="file" name="foto">
                                            </td>
                                        </tr>
                                        -->
                                        <tr>
                                            <td>Sexo :<span style="color: red;"> *</span></td>
                                            <td>
                                                <select name="sexo" class="form-control" >
                                                    <option value="Masculino" <?php echo ($aDataUser["s_sexo"]=='Masculino'?'SELECTED':'')?>>Masculino</option>
                                                    <option value="Femenino" <?php echo ($aDataUser["s_sexo"]=='Femenino'?'SELECTED':'')?>>Femenino</option>
                                                </select>
                                                <!--
                                                Masculino &nbsp;&nbsp;<input id="optionsRadiosInline1" type="radio" checked="" value="Masculino" name="sexo">
                                                &nbsp;&nbsp;Femenino &nbsp;&nbsp;<input id="optionsRadiosInline1" type="radio" checked="" value="Femenino" name="sexo">
                                                -->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Discapacitado: <span style="color: red;"> *</span></td>
                                            <td>
                                                <select name="disc" class="form-control" >
                                                    <option value="1" <?php echo ($aDataUser["u_discapacitado"]=='1'?'SELECTED':'')?>>Si</option>
                                                    <option value="0" <?php echo ($aDataUser["u_discapacitado"]=='0'?'SELECTED':'')?>>No</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tutor: </td>
                                            <td>
                                                <input name="tutor" class="form-control" value="<?php echo $aDataUser['b_tutorNombre']; ?>" title="Numero de Item" placeholder="Nombre del tutor">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Rol :<span style="color: red;"> *</span></td>
                                            <td>   
                                                <select name="rol" class="form-control">
                                                    <option value="">--select--</option>
                                                    <option value="estudiante" <?php echo ($aDataUser["u_rol"]=='estudiante'?'SELECTED':'')?>>Estudiante</option>
                                                    <option value="admin" <?php echo ($aDataUser["u_rol"]=='admin'?'SELECTED':'')?>>Profesor</option>
                                                </select>
                                            </td>
                                        </tr>
                                    <tr>
                                        <td>Username :<span style="color: red;"> *</span></td>
                                        <td>   
                                        <input name="username" class="form-control" value="<?php echo $aDataUser['username']; ?>" title="Sueldo"  placeholder="Username">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Password :<span style="color: red;"> *</span></td>
                                        <td>
                                            <input name="password" type="password" value="<?php echo $aDataUser['password']; ?>" class="form-control" title="Sueldo" placeholder="Password">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <input type="hidden" name="grabar" value="si" />
                                            <input type=submit name="guardar"  value="Modificar Informacion" class="btn btn-primary btn-lg" />
<!--                                            <input type=button name="guardar" onclick="window.location='user_add_datos.php'" value="Insertar Datos" class="btn btn-primary btn-lg" />-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="error">(<span style="color: red;"> *</span> ) Todos los campos son Obligatorios</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        <!-- /.panel-body -->
                </div>
            -->
            <!--endStart-->
        </div>
    </div>
    </div>
<?php
    require_once 'footer.php';
} else {
    header("Location: login.php?m=4");
}
?>
