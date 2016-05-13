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
                    <li class="active">VOCALES</li>
                    <li><a href="edVocalesEjer.php">EJERCICIOS</a></li>
                </ol>
            </div>
        </div>
        <div class="color_content">
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- A -</div>
                        <div class="panel-body"><img src="public/images/letters/a.png" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">Descripcion A</div>
                    </div>
                </div>

                <div class="col-sm-4">
                   <div class="panel panel-primary">
                        <div class="panel-heading">- E -</div>
                        <div class="panel-body"><img src="public/images/letters/e.png" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">Descripcion E</div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- I -</div>
                        <div class="panel-body"><img src="public/images/letters/i.png" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">Descripcion I</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">- O -</div>
                      <div class="panel-body"><img src="public/images/letters/o.png" class="img-responsive" style="width:100%" alt="Image"></div>
                      <div class="panel-footer">Descripcion O</div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- U -</div>
                        <div class="panel-body"><img src="public/images/letters/u.png" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">Descripcion U</div>
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