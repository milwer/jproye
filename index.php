<?php
require_once 'class/class_usuario.php';
//print_r($_SESSION);exit();
if($_SESSION["nivel"] and $_SESSION["nivel"] == "estudiante")
{
//print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Education System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <script src="public/js/jquery.min.js"></script>
  <script src="public/js//bootstrap.min.js"></script>
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <!--
        <li class="active"><a href="#">Inicio</a></li>
        <li><a href="#">Otros</a></li>
        -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">
          <p><a href="">Mi cuenta</a></p>
        <img src="public/images/user.jpg" class="img-circle" height="65" width="65" alt="Avatar">
      </div>
      <div class="well">
        <p><a href="#">Conoce mas</a></p>
        <p>
          <span class="label label-default">Test</span>
          <span class="label label-primary">Contenidos</span>
          <span class="label label-success">y mas</span>
          <!--
          <span class="label label-info">Football</span>
          <span class="label label-warning">Gaming</span>
          <span class="label label-danger">Friends</span>
          -->
        </p>
      </div>
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Hola!</strong></p>
        Bienvenido al sistema.
      </div>
        <!--
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      -->
    </div>
    <div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
                <h3>SISTEMA DE EDUCACION - ALTERNATIVA V-1.1</h3>
              <!--
                            <p contenteditable="true"></p>
              <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-thumbs-up"></span> Like
              </button>
              -->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
            <div class="col-sm-12">
              <ol class="breadcrumb">
                  <li><a href="index.php">Inicio</a></li>
                <li><a href="#">Ejecicios</a></li>
              </ol>
            </div>
       </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Vocales</p>
           <a href="edVocales.php">
           <img src="public/images/voc.JPG" class="img-circle" height="55" width="55" alt="Avatar">
           </a>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Es fundamental considerar que nos estamos refiriendo a una lengua cuyo canal de transmisión es muy diferente al que las personas oyentes estamos acostumbrados a utilizar. Se estructura de manera distinta a la oral, considerando un espacio determinado, unos movimientos concretos, acompañado todo ello de expresiones faciales y corporales variadas</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Alfabeto</p>
           <a href="edAlfabeto.php">
           <img src="public/images/abecedario.jpg" class="img-circle" height="55" width="55" alt="Avatar">
           </a>
           </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>En muchos casos una persona sordomuda al no poder oír, no puede aprender el lenguaje oral, pero hay escuelas especializadas en enseñarles a comunicarse de diversas formas.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Silabas</p>
           <a href="">
           <img src="public/images/silabas.jpg" class="img-circle" height="55" width="55" alt="Avatar">
           </a>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p> Unión silábica: ir uniendo letras para conformar sílabas. Lectura fonológica comprensiva y escritura de palabras: el último punto sería pasar a la lectura y escritura de palabras uniendo sílabas</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Oraciones</p>
           <a href="">
           <img src="public/images/oracion.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </a>
           </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>El lenguaje de señas es el método primario de comunicación para las personas sordas y con discapacidad auditiva. Contrariamente a la creencia popular, no hay un lenguaje de señas internacional "universal", solo un conjunto de palabras de vocabulario escogidas para ser utilizadas con fines oficiales.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Videos</p>
           <a href="edVideos.php">
           <img src="public/images/Video.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </a>
           </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Videos donde se muestra el aprendisaje con señas</p>
          </div>
        </div>
      </div>     
    </div>
    <div class="col-sm-2 well">
      <div class="thumbnail">
        <p>Novedades:</p>
        <!--
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        -->
        <p><strong>La Paz</strong></p>
        <p>Viernes.12 Mayo 2016</p>
        <button class="btn btn-primary">Info</button>
      </div>      
      <div class="well">
        <p>Evento 2</p>
      </div>
      <div class="well">
        <p>Evento 3</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>copyright, Todos los derechos reservados 2016</p>
</footer>

</body>
</html>

<?php
} else {
    //print_r($_SESSION);
    //echo $_SESSION["cedula"];
    header("Location: login.php?m=4");
}
?>