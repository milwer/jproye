<!DOCTYPE html>
<html lang="en">
<head>
    <title>Education System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="public/css/style.css" />
    <link href="public/css/sb-admin.css" rel="stylesheet">
    <link href="public/css/main.css" rel="stylesheet">
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
                <h3 class="title_header">Centro de Educacion -N-</h3>
                <!--
                <a class="navbar-brand" href="#"><img height="30px" width="60px" src="public/images/sys_logo.png" /></a>
                -->
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav"></ul>
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
                    <p><a href="#"><?php echo 'Bienvenid@ : '.$_SESSION["nombre"]; ?></a></p>
                    <p>
                        <span class="label label-default">Test</span>
                        <span class="label label-primary">Contenidos</span>
                        <span class="label label-success">y mas</span>
                    </p>
                </div>
                <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p><strong>Hola!</strong></p>
                    Bienvenido al sistema.
                </div>
            </div>