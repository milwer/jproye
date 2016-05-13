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
            case 'D':
                var valor = document.getElementById("Ejer_1").value;
                if(valor == "D" || valor == "d"){
                    alert("Correcto");
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_1").value = "";
                }
                break;
            case 'L':
                var val1 = document.getElementById("Ejer_2").value;
                if((val1 == "LL" || val1 == "ll")){
                    alert("Correcto");    
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_2").value = "";
                }
            break;
            case 'M':
                var val1 = document.getElementById("Ejer_3").value;
                if(val1 == "M" || val1 == "m"){
                    alert("Correcto");    
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_3").value = "";
                }
            break;
            case 'V':
                var val1 = document.getElementById("Ejer_4").value;
                if(val1 == "V" || val1 == "v"){
                    alert("Correcto");    
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_4").value = "";
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
                    <li><a href="edAlfabeto.php">ALFABETO</a></li>
                    <li class="active">EJERCICIOS</li>
                </ol>
            </div>
        </div>
        <div class="color_content">
            <div class="row">
                <div class="col-sm-6">
                  <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio D</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/alfabeto/d.jpg" class="img-responsive" style="width:100%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_1" size="1" class="inbox_for_exer" value=""/>
                            <span class="letter_exer">INOSAURIO</span>
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value="Revisar" onclick="comprobar('D');" name="Revisar"  />
                        </div>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Ejercicio L
                        </div>
                        <div class="panel-body">
                            <img src="public/images/exercices/alfabeto/ll.jpg" class="img-responsive" style="width:85%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_2" size="1" class="inbox_for_exer" value=""/>
                            <span class="letter_exer">AMA</span>
                            <input type="button" value="Revisar" onclick="comprobar('L');" name="Revisar"  />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Ejercicio M</div>
                      <div class="panel-body">
                          <img src="public/images/exercices/alfabeto/m.jpg" class="img-responsive" style="width:100%" alt="Image" />
                      </div>
                      <div class="panel-footer">
                          <input type="text" id="Ejer_3" size="1" class="inbox_for_exer" value=""/>
                          <span class="letter_exer">ONO</span>
                          &nbsp;&nbsp;&nbsp;
                          <input type="button" value="Revisar" onclick="comprobar('M');" name="Revisar"  />
                      </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio V</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/alfabeto/v.jpg" class="img-responsive" style="width:90%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_4" size="1" class="inbox_for_exer" value=""/>
                            <span class="letter_exer">IOLIN</span>
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value="Revisar" onclick="comprobar('V');" name="Revisar"  />
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