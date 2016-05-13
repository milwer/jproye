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
                if(valor == "Vaca" || valor == "vaca"){
                    alert("Correcto");
                } else {
                    alert("Existe un error");
                }
                break;
            case '2':
                var val1 = document.getElementById("Ejer_2").value;
                if(val1 == "Lentes" || val1 == "lentes"){
                    alert("Correcto");
                } else {
                    alert("Existe un error");
                }
            break;
            case '3':
                var val1 = document.getElementById("Ejer_3").value;
                if(val1 == "Sapo" || val1 == "sapo" || val1 == "SAPO"){
                    alert("Correcto");
                } else {
                    alert("Existe un error");
                }
            break;
            case '4':
                var val1 = document.getElementById("Ejer_4").value;
                if(val1 == "Casa" || val1 == "casa" || val1 == "CASA"){
                    alert("Correcto");
                } else {
                    alert("Existe un error");
                }
            break;
            case '5':
                var val1 = document.getElementById("Ejer_5").value;
                if(val1 == "Niña" || val1 == "niña" || val1 == "NIÑA"){
                    alert("Correcto");    
                } else {
                    alert("Existe un error");
                }
            break;
            case '6':
                var val1 = document.getElementById("Ejer_6").value;
                if(val1 == "Perro" || val1 == "perro" || val1 == "PERRO"){
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
                    <li><a href="edPalabras.php">PALABRAS</a></li>
                    <li class="active">EJERCICIOS</li>
                </ol>
            </div>
        </div>
        <div class="color_content">
            <div class="row">
                <div class="col-sm-4">
                  <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio I</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/palabras/vaca.jpg" class="img-responsive" style="width:100%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_1" size="1" class="inbox_for_exer_pal" value=""/>
                            <input type="button" value="Revisar" onclick="comprobar('1');" name="Revisar"  />
                        </div>
                  </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Ejercicio II
                        </div>
                        <div class="panel-body">
                            <img src="public/images/exercices/palabras/lentes.jpg" class="img-responsive" style="width:85%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_2" size="1" class="inbox_for_exer_pal" value=""/>
                            <input type="button" value="Revisar" onclick="comprobar('2');" name="Revisar"  />
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Ejercicio III</div>
                      <div class="panel-body">
                          <img src="public/images/exercices/palabras/sapo.jpg" class="img-responsive" style="width:63%" alt="Image" />
                      </div>
                      <div class="panel-footer">
                          <input type="text" id="Ejer_3" size="1" class="inbox_for_exer_pal" value=""/>
                          <input type="button" value="Revisar" onclick="comprobar('3');" name="Revisar"  />
                      </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio IV</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/palabras/casa.jpg" class="img-responsive" style="width:100%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_4" size="1" class="inbox_for_exer_pal" value=""/>
                            <input type="button" value="Revisar" onclick="comprobar('4');" name="Revisar"  />
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio IV</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/palabras/nina.jpg" class="img-responsive" style="width:100%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_5" size="1" class="inbox_for_exer_pal" value=""/>
                            <input type="button" value="Revisar" onclick="comprobar('5');" name="Revisar"  />
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio IV</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/palabras/perro.jpg" class="img-responsive" style="width:100%" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_6" size="1" class="inbox_for_exer_pal" value=""/>
                            <input type="button" value="Revisar" onclick="comprobar('6');" name="Revisar"  />
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