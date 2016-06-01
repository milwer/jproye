<?php
require_once 'class/class_usuario.php';
//print_r($_SESSION);exit();
if($_SESSION["nivel"] and $_SESSION["nivel"] == "estudiante")
{
	require_once 'header.php';
//print_r($_SESSION);
?>
    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
                <h3>SISTEMA DE EDUCACION - ALTERNATIVA</h3>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
            <div class="col-sm-12">
              <ol class="breadcrumb">
                  <li><a href="index.php">INICIO</a></li>
                <li class="active">VIDEOS</li>
              </ol>
            </div>
        </div>
      <div class="row">
          <div class="col-sm-6">
            <div class="panel panel-primary">
                  <div class="panel-heading">EL LEON Y EL RATON</div>
                  <div class="panel-body">
                      <iframe width="250" height="240" src="https://www.youtube.com/embed/0ZCaX4wRL-s" frameborder="0" allowfullscreen></iframe>
                  </div>
              <div class="panel-footer">Aprendiendo Lengua de Señas Mexicana,Cuento Infantil: El león y el ratón</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-primary">
              <div class="panel-heading">LA GALLINA TURULECA</div>
              <div class="panel-body">
                  <iframe width="250" height="240" src="https://www.youtube.com/embed/qV8rpWhR_Uo" frameborder="0" allowfullscreen></iframe>
              </div>
              <div class="panel-footer">Canción infantil cantada por Miliky y adaptada a la lengua de señas para que la aprendan los chiquitos de jardín</div>
            </div>
          </div>
      </div>

      <div class="row">
          <div class="col-sm-6">
            <div class="panel panel-primary">
                  <div class="panel-heading">LA VACA ESTUDIOSA</div>
                  <div class="panel-body">
                      <iframe width="250" height="240" src="https://www.youtube.com/embed/jU1NH-fVrR0" frameborder="0" allowfullscreen></iframe>
                  </div>
              <div class="panel-footer">La canción infantil "La vaca estudiosa" compuesta por María Elena Walsh es interpretada en lengua de señas ecuatoriana</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-primary">
              <div class="panel-heading">LOS 3 CERDITOS</div>
              <div class="panel-body">
                  <iframe width="250" height="240" src="https://www.youtube.com/embed/RIPe9Z-2aBg" frameborder="0" allowfullscreen></iframe>
              </div>
              <div class="panel-footer">El cuento de los 3 cerditos</div>
            </div>
          </div>
      </div>
        
    </div>
<?php
require_once 'footer.php';
} else {
    //print_r($_SESSION);
    //echo $_SESSION["cedula"];
    header("Location: login.php?m=4");
}
?>