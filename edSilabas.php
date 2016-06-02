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
                    <li class="active">SILABAS</li>
                    <li><a href="edSilabasEjer.php">EJERCICIOS</a></li>
                </ol>
            </div>
        </div>
        <div class="color_content">
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- Ejemplo I -</div>
                        <div class="panel-body"><img src="public/images/silabas/ex_b.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer letter_bold">Palabra con 3 silabas</div>
                    </div>
                </div>

                <div class="col-sm-4">
                   <div class="panel panel-primary">
                        <div class="panel-heading">- Ejemplo II -</div>
                        <div class="panel-body"><img src="public/images/silabas/ex_ch.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer letter_bold">Palabra con 2 silabas</div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- Ejemplo III -</div>
                        <div class="panel-body"><img src="public/images/silabas/ex_m.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer letter_bold">Palabra con 4 Silabas</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">- Ejemplo IV -</div>
                      <div class="panel-body"><img src="public/images/silabas/ex_u.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                      <div class="panel-footer letter_bold">Palabra con 4 Silabas</div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- Ejemplo V -</div>
                        <div class="panel-body"><img src="public/images/silabas/ex_o.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer letter_bold">Palabra con 2 Silabas</div>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- Ejemplo VI -</div>
                        <div class="panel-body"><img src="public/images/silabas/ex_r.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer letter_bold">Palabra con 2 Silabas</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">- Ejemplo VI -</div>
                      <div class="panel-body"><img src="public/images/silabas/ex_l.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                      <div class="panel-footer letter_bold">Palabra con 2 Silabas</div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- Ejemplo VII -</div>
                        <div class="panel-body"><img src="public/images/silabas/ex_n.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer letter_bold">Palabra con 2 Silabas</div>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- Ejemplo VIII -</div>
                        <div class="panel-body"><img src="public/images/silabas/ex_v.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer letter_bold">Palabra con 3 Silabas</div>
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