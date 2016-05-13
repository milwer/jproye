<?php
require_once 'class/class_usuario.php';
require_once 'class/class_curso.php';
if($_SESSION["nivel"] and $_SESSION["nivel"] == "estudiante") {
    $oCurso = new Curso();
    $aData = $oCurso->getAllCursos();
    require_once 'header.php';
?>
    <div class="col-sm-7">
        <!-- cabezera -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default text-left">
                    <div class="panel-body">
                        <center><h3>SISTEMA DE EDUCACION - ALTERNATIVA</h3></center>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- menu -->
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li class="active">DEBE INGRESAR A CUALQUER OPCION PARA INICIAR EL CURSO</li>
<!--                    <li><a href="#">EJERCICIOS</a></li>-->
                </ol>
            </div>
        </div>
        <!-- contenido -->        
        <?php
        foreach ($aData as $aValue) {
        ?>
        <div class="row">
            <div class="col-sm-3">
                <div class="well formLitle">
                    <p><?php echo $aValue['tipo']; ?></p>
                    <a href="<?php echo $aValue['url']; ?>">
                        <img src="public/images/<?php echo $aValue['img_name'];?>" class="img-circle" height="55" width="55" alt="Avatar">
                    </a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="well formLitle">
                    <p><?php echo $aValue['descripcion']; ?></p>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
<?php
    require_once 'footer.php';
} else {
    header("Location: login.php?m=4");
}
?>
