<?php
require_once 'class/class_usuario.php';
//print_r($_SESSION);exit();
if($_SESSION["nivel"] and $_SESSION["nivel"] == "estudiante")
{
    require_once 'header.php';
?>
    <div class="col-sm-7">
        <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-default text-left">
                <div class="panel-body">
                    <h3 class="title_h">BIENVENIDOS AL MODULO DE APRENDIZAJE</h3>
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="index.php">INICIO</a></li>
                    <li class="active">ORACIONES</li>
                    <!--<li><a href="edOracionesEjer.php">EJERCICIOS</a></li>-->
                </ol>
            </div>
        </div>
        <div class="color_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- EJEMPLO ORACI&Oacute;N-</div>
                        <div class="panel-body"><img src="public/images/oraciones/oracion4.png" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">EL cuento de la caperucita y el lobo/div></div>
                    </div>
                </div>
            </div>
            <!--
            <div class="row">
                <div class="col-sm-12">
                   <div class="panel panel-primary">
                        <div class="panel-heading">- Ejemplo II -</div>
                        <div class="panel-body"><img src="public/images/oraciones/oracion2.gif" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">Palabra con 2 silabas</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- Ejemplo III -</div>
                        <div class="panel-body"><img src="public/images/oraciones/oracion3.gif" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">Palabra con 4 Silabas</div>
                    </div>
                </div>
            </div>
            -->
        </div>
    </div>
<?php
require_once 'footer.php';
} else {
    header("Location: login.php?m=4");
}
?>