<?php
require_once 'class/class_usuario.php';
//print_r($_SESSION);exit();
if($_SESSION["nivel"] and $_SESSION["nivel"] == "estudiante")
{
    require_once 'header.php';
?>
<script type="text/javascript">
    function comprobar (sVal){
        switch(sVal) {
            case '1':
                var valor = document.getElementById("Ejer_1").value;
                if(valor == "2"){
                    alert("Correcto");    
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_1").value = "";
                }
                break;
            case '2':
                var val1 = document.getElementById("Ejer_2").value;
                if(val1 == "2"){
                    alert("Correcto");    
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_2").value="";
                }
            break;
            case '3':
                var val1 = document.getElementById("Ejer_3").value;
                if(val1 == "2"){
                    alert("Correcto");    
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_3").value="";
                }
            break;
            case '4':
                var val1 = document.getElementById("Ejer_4").value;
                if(val1 == "3"){
                    alert("Correcto");    
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_4").value="";
                }
            break;
            default:
                alert("no hay valores");
        }
    }
</script>
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
                    <li><a href="edSilabas.php">SILABAS</a></li>
                    <li class="active">EJERCICIOS</li>
                </ol>
            </div>
        </div>
        <div class="color_content">
            <div class="row">
                <div class="col-sm-6">
                  <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio I :</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/ex_q.jpg" class="img-responsive" style="width:100%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <span class="letter_exer">Cuantas Silabas Tiene :</span>
                            <input type="text" id="Ejer_1" size="1" class="inbox_for_exer" value=""/>
                            <input type="button" value="Revisar" onclick="comprobar('1');" name="Revisar"  />
                        </div>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Ejercicio II
                        </div>
                        <div class="panel-body">
                            <img src="public/images/exercices/ex_w.jpg" class="img-responsive" style="width:100%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <span class="letter_exer">Cuantas Silabas Tiene :</span>
                            <input type="text" id="Ejer_2" size="1" class="inbox_for_exer" value=""/>
                            <input type="button" value="Revisar" onclick="comprobar('2');" name="Revisar"  />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Ejercicio III</div>
                      <div class="panel-body">
                          <img src="public/images/exercices/ex_t.jpg" class="img-responsive" style="width:100%" alt="Image" />
                      </div>
                      <div class="panel-footer">
                          <span class="letter_exer">Cuantas Silabas Tiene :</span>
                          <input type="text" id="Ejer_3" size="1" class="inbox_for_exer" value=""/>
                          <input type="button" value="Revisar" onclick="comprobar('3');" name="Revisar"  />
                      </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio IV</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/ex_k.jpg" class="img-responsive" style="width:100%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <span class="letter_exer">Cuantas Silabas Tiene :</span>
                            <input type="text" id="Ejer_4" size="1" class="inbox_for_exer" value=""/>
                            <input type="button" value="Revisar" onclick="comprobar('4');" name="Revisar"  />
                        </div>
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