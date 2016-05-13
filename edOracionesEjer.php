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
            case 'A':
                var valor = document.getElementById("Ejer_1").value;
                if(valor == "A" || valor == "a"){
                    alert("Correcto");    
                } else {
                    alert("Existe un error");
                }
                break;
            case 'E':
                var val1 = document.getElementById("Ejer_2a").value;
                var val2 = document.getElementById("Ejer_2b").value;
                if((val1 == "E" || val1 == "e") && (val2 == "E" || val2 == "e")){
                    alert("Correcto");    
                } else {
                    alert("Existe un error");
                }
            break;
            case 'I':
                var val1 = document.getElementById("Ejer_3").value;
                if(val1 == "I" || val1 == "i"){
                    alert("Correcto");    
                } else {
                    alert("Existe un error");
                }
            break;
            case 'O':
                var val1 = document.getElementById("Ejer_4a").value;
                var val2 = document.getElementById("Ejer_4b").value;
                if((val1 == "O" || val1 == "o") && (val2 == "O" || val2 == "o")){
                    alert("Correcto");    
                } else {
                    alert("Existe un error");
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
                    <li><a href="edOraciones.php">ORACIONES</a></li>
                    <li class="active">EJERCICIOS</li>
                </ol>
            </div>
        </div>
        <div class="color_content">
            <div class="row">
                <div class="col-sm-6">
                  <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio I</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/ex_a.jpg" class="img-responsive" style="width:100%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_1" size="1" class="inbox_for_exer" value=""/>
                            <span class="letter_exer">BEJA</span>
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value="Revisar" onclick="comprobar('A');" name="Revisar"  />
                        </div>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Ejercicio II
                        </div>
                        <div class="panel-body">
                            <img src="public/images/exercices/ex_e.jpg" class="img-responsive" style="width:100%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_2a" size="1" class="inbox_for_exer" value=""/>
                            <span class="letter_exer">L</span>
                            <input type="text" id="Ejer_2b" size="1" class="inbox_for_exer" value=""/>
                            <span class="letter_exer">FANTE</span>
                            <input type="button" value="Revisar" onclick="comprobar('E');" name="Revisar"  />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Ejercicio III</div>
                      <div class="panel-body">
                          <img src="public/images/exercices/ex_i.jpg" class="img-responsive" style="width:100%" alt="Image" />
                      </div>
                      <div class="panel-footer">
                          <input type="text" id="Ejer_3" size="1" class="inbox_for_exer" value=""/>
                          <span class="letter_exer">GUANA</span>
                          &nbsp;&nbsp;&nbsp;
                          <input type="button" value="Revisar" onclick="comprobar('I');" name="Revisar"  />
                      </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio IV</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/ex_o.jpg" class="img-responsive" style="width:100%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_4a" size="1" class="inbox_for_exer" value=""/>
                            <span class="letter_exer">S</span>
                            <input type="text" id="Ejer_4b" size="1" class="inbox_for_exer" value=""/>
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value="Revisar" onclick="comprobar('O');" name="Revisar"  />
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