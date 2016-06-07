<?php
require_once 'class/class_usuario.php';
require_once 'class/class_curso.php';
//print_r($_SESSION);exit();
if($_SESSION["nivel"] and $_SESSION["nivel"] == "estudiante")
{
    $oUser = new Usuario();
    $oCurso = new Curso();
    $aCurso = $oCurso->getExerByCourse(4);
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
<input type="hidden" id="respI" name="respI" value="<?php echo $aCurso[0]["respuesta"]; ?>" />
<input type="hidden" id="respII" name="respII" value="<?php echo $aCurso[1]["respuesta"]; ?>" />
<input type="hidden" id="respIII" name="respIII" value="<?php echo $aCurso[2]["respuesta"]; ?>" />
<input type="hidden" id="respIV" name="respIV" value="<?php echo $aCurso[3]["respuesta"]; ?>" />
<script type="text/javascript">
    function comprobar (sVal){
        var resI = document.getElementById("respI").value;
        var resII = document.getElementById("respII").value;
        var resIII = document.getElementById("respIII").value;
        var resIV = document.getElementById("respIV").value;
        resMayI = resI.toUpperCase();
        resMayII = resII.toUpperCase();
        resMayIII = resIII.toUpperCase();
        resMayIV = resIV.toUpperCase();
        switch(sVal) {
            case '1':
                var valor = document.getElementById("Ejer_1").value;
                if(valor == resI || valor == resMayI){
                    alert("Correcto");
                    document.getElementById("Ev1").value="1";
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_1").value="";
                }
                break;
            case '2':
                var val1 = document.getElementById("Ejer_2").value;
                if(val1 == resII || resMayII){
                    alert("Correcto");
                    document.getElementById("Ev2").value="1";
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_2").value="";
                }
            break;
            case '3':
                var val1 = document.getElementById("Ejer_3").value;
                if(val1 == resIII || resMayIII){
                    alert("Correcto");
                    document.getElementById("Ev3").value="1";
                } else {
                    alert("Existe un error");
                    document.getElementById("Ejer_3").value="";
                }
            break;
            case '4':
                var val1 = document.getElementById("Ejer_4").value;
                if(val1 == resIV || resMayIV){
                    alert("Correcto");
                    document.getElementById("Ev4").value="1";
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
                        <div class="panel-heading"><?php echo $aCurso[0]["titulo"]; ?></div>
                        <div class="panel-body">
                            <img src="<?php echo $aCurso[0]["url"]; ?>" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
                            <img src="<?php echo $aCurso[0]["url2"]; ?>" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
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
                            <?php echo $aCurso[1]["titulo"]; ?>
                        </div>
                        <div class="panel-body">
                            <img src="<?php echo $aCurso[1]["url"]; ?>" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
                            <img src="<?php echo $aCurso[1]["url2"]; ?>" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
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
                        <div class="panel-heading"><?php echo $aCurso[2]["titulo"]; ?></div>
                        <div class="panel-body">
                            <img src="<?php echo $aCurso[2]["url"]; ?>" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
                            <img src="<?php echo $aCurso[2]["url2"]; ?>" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
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
                        <div class="panel-heading"><?php echo $aCurso[3]["titulo"]; ?></div>
                        <div class="panel-body">
                            <img src="<?php echo $aCurso[3]["url"]; ?>" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
                            <img src="<?php echo $aCurso[3]["url2"]; ?>" class="img-responsive" style="width:100%;height: 190px;" alt="Image" />
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