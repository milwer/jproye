<?php
require_once 'class/class_usuario.php';
require_once 'class/class_curso.php';
$oUser = new Usuario();
$oCurso = new Curso();
$aCurso = $oCurso->getExerByCourse(1);
if($_SESSION["nivel"] and ($_SESSION["nivel"] == "admin" || $_SESSION["nivel"] == "docente")) {
    require_once 'header.php';
    
    if(isset($_POST["grabar"]) && !empty($_POST)){
        /*echo '<pre>';
        var_dump($_POST);
        var_dump($_FILES);
        die("===");*/
     //var_dump($_FILES["foto"]["tmp_name"]);
        if($_FILES["archivo"]["tmp_name"]!="") {
            echo 'nuevo';
            copy($_FILES["archivo"]["tmp_name"], "public/images/exercices/vocales/".$_FILES["archivo"]["name"]);
            $sPath = "public/images/exercices/vocales/".$_FILES["archivo"]["name"];
        } else {
            echo 'existe';
            $sPath = $_POST['oldUrl'];
        }
        ///die();
        $aData = array(
            'id'=>$_POST['id'],
            'titulo'=>$_POST['tit'],
            'descripcion'=>$_POST['desc'],
            'respuesta'=>$_POST['resp'],
            'url'=> $sPath
        );
        $sRes = $oCurso->updateExer($aData);
        if($sRes==TRUE) {
            header("Location: ad_new_content.php?m=1");
        } else {
            header("Location: ad_new_content.php?m=2");
        }
        die();
        /*
        //var_dump($aData);
        //die("----");
        $sResult = $oUser->InsertUser($aData);
        if($sResult==TRUE) {
            header("Location: ad_new_user.php?m=1");
        } else {
            header("Location: ad_new_user.php?m=2");
        }
        exit();*/
    }
?>
    <div class="col-sm-7">
        <!-- cabezera -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default text-left">
                    <div class="panel-body">
                        <center><h3>ADMINISTRACION</h3></center>
                    </div>
                </div>
            </div>
        </div>
        <!-- menu -->
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="adUsers.php">INICIO</a></li>
                    <li class="active">ADMIN VOCALES</li>
                    <li><a href="ad_new_alf.php">ADMIN ALFABETO</a></li>
                    <li><a href="ad_new_pal.php">ADM PALABRAS</a></li>
                </ol>
            </div>
            <!--start-->
            <div class="col-sm-12 panel-body color_content">
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
                <table class="table">
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Respuesta</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                    <?php
                    foreach ($aCurso as $sValue) {
                    ?>
                    <form name="form" action="" method="post" enctype="multipart/form-data">
                        <tr>
                            <td><input type="text" class="inbox_for_cont" name="tit" value="<?php echo $sValue["titulo"]; ?>" id=""/></td>
                            <td><input type="text" class="inbox_for_cont" name="desc" value="<?php echo $sValue["descripcion"]; ?>" id=""/></td>
                            <td><input type="text" class="inbox_for_cont" name="resp" value="<?php echo $sValue["respuesta"]; ?>" id=""/></td>
                            <td>
                                <img width="50px"  src="<?php echo $sValue["url"]; ?>" />
                                <input type="file" class="inbox_for_cont_file" name="archivo" /></td>
                            <td>
                                <input type="submit" value="Modificar" class="btn btn-primary" />
                                <input type="hidden" name="grabar" value="si" />
                                <input type="hidden" name="id" value="<?php echo $sValue["id_eje_cont"]; ?>" />
                                <input type="hidden" name="oldUrl" value="<?php echo $sValue["url"]; ?>" />
                            </td>
                        </tr>
                    </form>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
<?php
    require_once 'footer.php';
} else {
    header("Location: login.php?m=4");
}
?>
