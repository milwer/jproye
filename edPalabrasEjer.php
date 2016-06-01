<?php
require_once 'class/class_usuario.php';
//print_r($_SESSION);exit();
if($_SESSION["nivel"] and $_SESSION["nivel"] == "estudiante")
{
    //var_dump($_POST);
    $oUser = new Usuario();
    require_once 'header.php';
    if (isset($_POST["grabar"]) && $_POST["grabar"]=="si") {
        $sRes = $oUser->getNoteByUser("Palabras", $_SESSION["cod"]);
        //var_dump($sRes);
        $iTotal = (int) $_POST["Ev1"] + (int) $_POST["Ev2"] + (int) $_POST["Ev3"] + (int) $_POST["Ev4"];
        //var_dump($_POST);
        //die("---");
        if($sRes == FALSE){
            //insert
            $aData = array(
                "descripcion" => "Palabras",
                "user_id" => $_SESSION["cod"],
                "puntuacion" => $iTotal,
                "id_eje" => 1,
            );
            $sResIn = $oUser->insertNoteOfUser($aData);
            if($sResIn == TRUE) {
                echo "<script type='text/javascript'>alert('Se guardo exitosamente');</script>";
                header("Location: index.php?m=4");
            } else {
                echo "<script type='text/javascript'>alert('Existe un error !!!!');</script>";
            }
        } else {
            //update
            $sResUp = $oUser->updateNoteOfUser($iTotal, "Palabras", $_SESSION["cod"]);
            if($sResUp == TRUE) {
                echo "<script type='text/javascript'>alert('Se guardo exitosamente');</script>";
                header("Location: index.php?m=4");
            } else {
                echo "<script type='text/javascript'>alert('Existe un error !!!!');</script>";
            }
        }
    }
?>
<script type="text/javascript">
    function comprobar (sVal){
        switch(sVal) {
            case '1':
                var valor = document.getElementById("Ejer_1").value;
                if(valor == "Auto" || valor == "auto" || valor == "carro" || valor == "Carro" || valor == "CARRO" || valor == "AUTO"){
                    alert("Correcto");
                    document.getElementById("Ev1").value="1";
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_1").value="";
                }
                break;
            case '2':
                var val1 = document.getElementById("Ejer_2").value;
                if(val1 == "Caballo" || val1 == "CABALLO" || val1 == "caballo"){
                    alert("Correcto");
                    document.getElementById("Ev2").value="1";
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_2").value="";
                }
            break;
            case '3':
                var val1 = document.getElementById("Ejer_3").value;
                if(val1 == "Arena" || val1 == "arena" || val1 == "ARENA"){
                    alert("Correcto");
                    document.getElementById("Ev3").value="1";
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_3").value="";
                }
            break;
            case '4':
                var val1 = document.getElementById("Ejer_4").value;
                if(val1 == "Bicho" || val1 == "bicho" || val1 == "BICHO" || val1 == "insecto" || val1 == "Insecto" || val1 == "INSECTO"){
                    alert("Correcto");
                    document.getElementById("Ev4").value="1";
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_4").value="";
                }
            break;
            /*case '5':
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
            break;*/
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
        <form name="form" method="POST" action="">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="index.php">INICIO</a></li>
                    <li><a href="edPalabras.php">PALABRAS</a></li>
                    <li class="active">EJERCICIOS</li>
                    <li class="active"><a onclick="document.form.submit();" href="#">GUARDAR</a><input type="hidden" name="grabar" value="si" /></li>
                </ol>
            </div>
        </div>
        <div class="color_content">
            <div class="row">
                <div class="col-sm-6">
                  <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio I</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/palabras/carro.png" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
                            <img src="public/images/exercices/palabras/carro.jpg" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_1" size="1" class="inbox_for_exer_pal" value=""/>
                            <input type="button" value="Revisar" onclick="comprobar('1');" name="Revisar"  />
                            <input type="hidden" id="Ev1" name="Ev1" value="" />
                        </div>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Ejercicio II
                        </div>
                        <div class="panel-body">
                            <img src="public/images/exercices/palabras/caballo.png" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
                            <img src="public/images/exercices/palabras/caballo.jpg" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_2" size="1" class="inbox_for_exer_pal" value=""/>
                            <input type="button" value="Revisar" onclick="comprobar('2');" name="Revisar"  />
                            <input type="hidden" id="Ev2" name="Ev2" value="" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio III</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/palabras/arena.png" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
                            <img src="public/images/exercices/palabras/arena.jpg" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
                            
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_3" size="1" class="inbox_for_exer_pal" value=""/>
                            <input type="button" value="Revisar" onclick="comprobar('3');" name="Revisar"  />
                            <input type="hidden" id="Ev3" name="Ev3" value="" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Ejercicio IV</div>
                        <div class="panel-body">
                            <img src="public/images/exercices/palabras/bicho.png" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
                            <img src="public/images/exercices/palabras/bicho.jpg" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
                        </div>
                        <div class="panel-footer">
                            <input type="text" id="Ejer_4" size="1" class="inbox_for_exer_pal" value=""/>
                            <input type="button" value="Revisar" onclick="comprobar('4');" name="Revisar"  />
                            <input type="hidden" id="Ev4" name="Ev4" value="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>    
    </div>
<?php
require_once 'footer.php';
} else {
    header("Location: login.php?m=4");
}
?>