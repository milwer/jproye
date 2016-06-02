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
                    <li class="active">ALFABETO</li>
                    <li><a href="edAlfabetoEjer.php">EJERCICIOS</a></li>
                </ol>
            </div>
        </div>
        <div class="color_content">
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- A -</div>
                        <div class="panel-body"><img src="public/images/letters/a.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>

                <div class="col-sm-3">
                   <div class="panel panel-primary">
                        <div class="panel-heading">- B -</div>
                        <div class="panel-body"><img src="public/images/letters/b.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- C -</div>
                        <div class="panel-body"><img src="public/images/letters/c.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
               <div class="col-sm-3">
                    <div class="panel panel-primary">
                      <div class="panel-heading">- CH -</div>
                      <div class="panel-body"><img src="public/images/letters/ch.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- D -</div>
                        <div class="panel-body"><img src="public/images/letters/d.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                   <div class="panel panel-primary">
                        <div class="panel-heading">- E -</div>
                        <div class="panel-body"><img src="public/images/letters/e.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- F -</div>
                        <div class="panel-body"><img src="public/images/letters/f.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                      <div class="panel-heading">- G -</div>
                      <div class="panel-body"><img src="public/images/letters/g.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- H -</div>
                        <div class="panel-body"><img src="public/images/letters/h.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                   <div class="panel panel-primary">
                        <div class="panel-heading">- I -</div>
                        <div class="panel-body"><img src="public/images/letters/i.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- J -</div>
                        <div class="panel-body"><img src="public/images/letters/j.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                      <div class="panel-heading">- K -</div>
                      <div class="panel-body"><img src="public/images/letters/k.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- L -</div>
                        <div class="panel-body"><img src="public/images/letters/l.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                   <div class="panel panel-primary">
                        <div class="panel-heading">- LL -</div>
                        <div class="panel-body"><img src="public/images/letters/ll.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- M -</div>
                        <div class="panel-body"><img src="public/images/letters/m.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                      <div class="panel-heading">- N -</div>
                      <div class="panel-body"><img src="public/images/letters/n.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
            </div>
            
           <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- &Ntilde; -</div>
                        <div class="panel-body"><img src="public/images/letters/nn.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                   <div class="panel panel-primary">
                        <div class="panel-heading">- O -</div>
                        <div class="panel-body"><img src="public/images/letters/o.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- P -</div>
                        <div class="panel-body"><img src="public/images/letters/p.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                      <div class="panel-heading">- Q -</div>
                      <div class="panel-body"><img src="public/images/letters/q.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- R -</div>
                        <div class="panel-body"><img src="public/images/letters/r.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                   <div class="panel panel-primary">
                        <div class="panel-heading">- RR -</div>
                        <div class="panel-body"><img src="public/images/letters/rr.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- S -</div>
                        <div class="panel-body"><img src="public/images/letters/s.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                      <div class="panel-heading">- T -</div>
                      <div class="panel-body"><img src="public/images/letters/t.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- U -</div>
                        <div class="panel-body"><img src="public/images/letters/u.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                   <div class="panel panel-primary">
                        <div class="panel-heading">- V -</div>
                        <div class="panel-body"><img src="public/images/letters/v.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- W -</div>
                        <div class="panel-body"><img src="public/images/letters/w.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                      <div class="panel-heading">- X -</div>
                      <div class="panel-body"><img src="public/images/letters/x.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">- Y -</div>
                        <div class="panel-body"><img src="public/images/letters/y.png" class="img-responsive" style="width:100%" alt="Image"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                   <div class="panel panel-primary">
                        <div class="panel-heading">- Z -</div>
                        <div class="panel-body"><img src="public/images/letters/z.png" class="img-responsive" style="width:100%" alt="Image"></div>
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