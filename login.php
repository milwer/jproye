<?php
require_once 'class/class_usuario.php';
global $HTTP_SERVER_VARS;
global $HTTP_SERVER_VARS;	
	if ($HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR'] != "")

		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else
		$ip = $_SERVER['REMOTE_ADDR'];	
                $maquina = gethostbyaddr($ip);
     
if (isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    //print_r($_POST);
    //exit();
    if (empty($_POST["user"])) {
        header("Location: login.php?m = 1");
    }
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    var_dump($_POST);
    $Fun = new Usuario();
    $Fun->logueoAdmin($user, $pass);
}
           
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>.:Sitema de educacion:.</title>

    <!-- Core CSS - Include with every page -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="public/css/sb-admin.css" rel="stylesheet">
    <link href="public/css/main.css" rel="stylesheet">

</head>

<body style="background-image: url('public/images/sys_login.jpg');">
    <!--
<div class="encabezado">
</div>
    -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h3>Sistema de Educacion Alternativa</h3>
                <center>Debe identificarse</center>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Validar usuario</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        if (isset($_GET["m"]) and $_GET["m"]==1)
                        {
                            ?>
                        <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Los datos están vacíos
                            </div>
                        <?php
                        }elseif(isset($_GET["m"]) and $_GET["m"]==2)
                        {
                            ?>
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Los datos ingresados no son válidos
                            </div>
                        <?php
                        }elseif(isset($_GET["m"]) and $_GET["m"]==3)
                        {
                            ?>
                        <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Ha cerrado su session correctamente.
                            </div>
                        <?php
                        }elseif(isset($_GET["m"]) and $_GET["m"]==4)
                        {
                        ?>
                        <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Esta zona tiene el acceso restringido.
                            </div>
                        <?php
                        }
                        ?>
                        <form  action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuario" name="user" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Login" />
                                <input type="hidden" name="grabar" value="si" />
                            </fieldset>
                        </form>
                    </div>
                </div>
                <center>Nombre del Equipo:  <?php echo $maquina; ?>
                </center>
                <center>Dirreccion IP : <?php echo $ip; ?>
                </center> 
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="public/js/jquery-1.10.2.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="public/js/sb-admin.js"></script>

</body>

</html>
