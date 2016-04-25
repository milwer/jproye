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
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
        <li class="active"><a href="#">Inicio</a></li>
        <li><a href="#">Otros</a></li>
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
                <li class="active">Teoria Letra A</li>
                <li><a href="#">Ejecicios</a></li>
              </ol>
            </div>
        </div>
      <div class="row">
        <div class="col-sm-4">
      <div class="panel panel-primary">
            <div class="panel-heading">Letra A</div>
        <div class="panel-body"><img src="public/images/letter.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Descripcion A</div>
      </div>
    </div>
                  <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Letra E</div>
        <div class="panel-body"><img src="public/images/letter.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Descripcion E</div>
      </div>
    </div>
                  <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Letra I</div>
        <div class="panel-body"><img src="public/images/letter.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Descripcion I</div>
      </div>
    </div>
      </div>
              <div class="row">
        <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">LETRA O</div>
        <div class="panel-body"><img src="public/images/letter.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Descripcion O</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">LETRA U</div>
        <div class="panel-body"><img src="public/images/letter.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Descripcion U</div>
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
<!--
<footer class="container-fluid text-center">
  <p>copyright, Todos los derechos reservados 2016</p>
</footer>
-->
</body>
</html>

<?php
} else {
    //print_r($_SESSION);
    //echo $_SESSION["cedula"];
    header("Location: login.php?m=4");
}
?>