<?php
require_once 'class/class_usuario.php';
require_once 'class/class_curso.php';
$oUser = new Usuario();
$oCurso = new Curso();
$aCurso = $oCurso->getExerByCourse(4);
if($_SESSION["nivel"] and ($_SESSION["nivel"] == "admin" || $_SESSION["nivel"] == "docente")) {
    require_once 'header.php';
    
    if(isset($_POST["grabar"]) && !empty($_POST)) {
        if($_FILES["archivo"]["tmp_name"]!="") {
            echo 'nuevo';
            copy($_FILES["archivo"]["tmp_name"], "public/images/exercices/palabras/".$_FILES["archivo"]["name"]);
            $sPath = "public/images/exercices/palabras/".$_FILES["archivo"]["name"];
        } else {
            echo 'existe';
            $sPath = $_POST['oldUrl'];
        }
        
        if($_FILES["archivo2"]["tmp_name"]!="") {
            echo 'nuevo';
            copy($_FILES["archivo2"]["tmp_name"], "public/images/exercices/palabras/".$_FILES["archivo2"]["name"]);
            $sPath2 = "public/images/exercices/palabras/".$_FILES["archivo2"]["name"];
        } else {
            echo 'existe';
            $sPath2 = $_POST['oldUrl2'];
        }
        $aData = array(
            'id'=>$_POST['id'],
            'titulo'=>$_POST['tit'],
            'descripcion'=>"",
            'respuesta'=>$_POST['resp'],
            'url'=> $sPath,
            'url2'=> $sPath2
        );
        $sRes = $oCurso->updateExer($aData);
        if($sRes==TRUE) {
            header("Location: ad_new_pal.php?m=1");
        } else {
            header("Location: ad_new_pal.php?m=2");
        }
        die();
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
                    <li><a href="ad_new_content.php">ADMIN VOCALES</a></li>
                    <li><a href="ad_new_alf.php">ADMIN ALFABETO</a></li>
                    <li><a href="ad_new_sil.php">ADM SILABAS</a></li>
                    <li class="active">ADM PALABRAS</li>
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
                        <th>Respuesta</th>
                        <th>Imagen</th>
                        <th>ImagenII</th>
                        <th>Opciones</th>
                    </tr>
                    <?php
                    foreach ($aCurso as $sValue) {
                    ?>
                    <form name="form" action="" method="post" enctype="multipart/form-data">
                        <tr>
                            <td>
                                <input type="text" class="inbox_for_cont" name="tit" value="<?php echo $sValue["titulo"]; ?>" id=""/>
                            </td>
                            <td>
                                <input type="text" class="inbox_for_cont" name="resp" value="<?php echo $sValue["respuesta"]; ?>" id=""/>
                            </td>
                            <td>
                                <img width="50px"  src="<?php echo $sValue["url"]; ?>" />
                                <input type="file" class="inbox_for_cont_file" name="archivo" />
                            </td>
                            <td>
                                <img width="50px"  src="<?php echo $sValue["url2"]; ?>" />
                                <input type="file" class="inbox_for_cont_file" name="archivo2" />
                            </td>
                            <td>
                                <input type="submit" value="Modificar" class="btn btn-primary" />
                                <input type="hidden" name="grabar" value="si" />
                                <input type="hidden" name="id" value="<?php echo $sValue["id_eje_cont"]; ?>" />
                                <input type="hidden" name="oldUrl" value="<?php echo $sValue["url"]; ?>" />
                                <input type="hidden" name="oldUrl2" value="<?php echo $sValue["url2"]; ?>" />
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
