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
                    <h3 class="title_h">SISTEMA DE EDUCACION - ALTERNATIVA</h3>
                </div>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="index.php">INICIO</a></li>
                    <li class="active">PALABRAS</li>
                    <li><a href="edPalabrasEjer.php">EJERCICIOS</a></li>
                </ol>
            </div>
        </div>
        <div class="color_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- Palabras I -</div>
                        <div class="panel-body"><img src="public/images/palabras/palabras1.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">Dias de la semana</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'footer.php';
} else {
    header("Location: login.php?m=4");
}
?>