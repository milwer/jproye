<?php
require_once 'class/class_usuario.php';
//print_r($_SESSION);exit();
if($_SESSION["nivel"] and $_SESSION["nivel"] == "estudiante") {
    //var_dump($_POST);
    $oUser = new Usuario();
    require_once 'header.php';
    if (isset($_POST["grabar"]) && $_POST["grabar"]=="si") {
        $sRes = $oUser->getNoteByUser("Alfabeto", $_SESSION["cod"]);
        //var_dump($sRes);
        $iTotal = (int) $_POST["Ev1"] + (int) $_POST["Ev2"] + (int) $_POST["Ev3"] + (int) $_POST["Ev4"];
        //var_dump($_POST);
        //die("---");
        if($sRes == FALSE){
            //insert
            $aData = array(
                "descripcion" => "Alfabeto",
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
            $sResUp = $oUser->updateNoteOfUser($iTotal, "Alfabeto", $_SESSION["cod"]);
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
            case 'D':
                var valor = document.getElementById("Ejer_1").value;
                if(valor == "D" || valor == "d"){
                    alert("Correcto");
                    document.getElementById("Ev1").value="1";
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_1").value = "";
                }
                break;
            case 'L':
                var val1 = document.getElementById("Ejer_2").value;
                if((val1 == "LL" || val1 == "ll")){
                    alert("Correcto");
                    document.getElementById("Ev2").value="1";
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_2").value = "";
                }
            break;
            case 'M':
                var val1 = document.getElementById("Ejer_3").value;
                if(val1 == "M" || val1 == "m"){
                    alert("Correcto");
                    document.getElementById("Ev3").value="1";
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_3").value = "";
                }
            break;
            case 'V':
                var val1 = document.getElementById("Ejer_4").value;
                if(val1 == "V" || val1 == "v"){
                    alert("Correcto");
                    document.getElementById("Ev4").value="1";
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
                    <h3 class="title_h">BIENVENIDOS AL MODULO DE APRENDIZAJE</h3>
                </div>
              </div>
            </div>
        </div>
        <form name="form" method="POST" action="">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="index.php">INICIO</a></li>
                    <li><a href="edAlfabeto.php">ALFABETO</a></li>
                    <li class="active">EJERCICIOS</li>
                    <li class="active"><a onclick="document.form.submit();" href="#">GUARDAR</a><input type="hidden" name="grabar" value="si" /></li>
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
                            <input type="hidden" id="Ev1" name="Ev1" value="" />
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
                            <input type="hidden" id="Ev2" name="Ev2" value="" />
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
                          <input type="hidden" id="Ev3" name="Ev3" value="" />
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