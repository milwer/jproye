<?php
require_once 'class/class_usuario.php';
require_once 'class/class_curso.php';
$oUser = new Usuario();
if($_SESSION["nivel"] and ($_SESSION["nivel"] == "admin" || $_SESSION["nivel"] == "docente")) {
    $aData = $oUser->getUserForId($_GET["id"]);
    //var_dump($aData);
    //die();
    require_once 'header.php';
?>
    <div class="col-sm-7">
        <!-- cabezera -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default text-left">
                    <div class="panel-body">
                        <center><h3>SISTEMA DE EDUCACION - ADMINISTRACION</h3></center>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu -->
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li class="active"><a href="adUsers.php">INICIO</a></li>
                    <!--<li><a href="#">EJERCICIOS</a></li>-->
                </ol>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="tab-pane fade in active" id="fun">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="vcard">
                            <br />
                            <img class="thumbnail" src="public/images/seg.jpg" alt="" />
                            <ul>
                                <li class="v-heading">
                                    Datos Usuario <span>(Ultima modificaci&oacute;n : <?php if($aData["u_modificacion"]=="") echo 'No se ha modificado el registro'; else echo $aData["u_modificacion"]; ?>)</span>
                                </li>            
                                <li>
                                    <span class="item-key">Estado</span>
                                    <div class="vcard-item">
                                    </div>
                                </li>
                                <li>
                                    <span class="item-key">C. I. : </span>
                                    <div class="vcard-item"><?php echo $aData["u_ci"]." ".$aData["u_exp"]; ?></div>
                                </li>
                                <li>
                                    <span class="item-key">Nombre : </span>
                                    <div class="vcard-item"><?php echo $aData["u_nombre"]; ?></div>
                                </li>
                                <li>
                                    <span class="item-key">Apellido Paterno: </span>
                                    <div class="vcard-item"><?php echo $aData["u_apellidoPat"]; ?></div>
                                </li>
                                <li>
                                    <span class="item-key">Apellido Materno: </span>
                                    <div class="vcard-item"><?php echo $aData["u_apellidoMat"]; ?></div>
                                </li>
                                <li>
                                    <span class="item-key">Estado : </span>
                                    <div class="vcard-item"><?php if($aData["u_estado"] == 1) echo 'Activo'; else echo 'Inactivo'; ?></div>
                                </li>
                                <li>
                                    <span class="item-key">Tipo User: </span>
                                    <div class="vcard-item"><?php echo $aData["u_rol"]; ?></div>
                                </li>
                                <li>
                                    <span class="item-key">Sexo : </span>
                                    <div class="vcard-item"><?php echo $aData["s_sexo"]; ?></div>
                                </li>
                                <li>
                                    <span class="item-key">Discapacitado : </span>
                                    <div class="vcard-item"><?php if($aData["u_discapacitado"] == 1) echo 'Discapacitado'; else echo 'No Discapacitado'; ?></div>
                                </li>
                                <li>
                                    <span class="item-key">Tutor: </span>
                                    <div class="vcard-item"><?php if($aData["b_tutorNombre"]=="") echo 'No tiene tutor'; else echo $aData["b_tutorNombre"]; ?></div>
                                </li>
                                <li>
                                    <span class="item-key">Evaluaciones : </span>
                                    <div class="vcard-item">Vocales : 3 de 4 - Alfabeto 2 de 4<?php //echo $aData["u_nombre"]; ?></div>
                                </li>
                            </ul>
                        </div>
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
