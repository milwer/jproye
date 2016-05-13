<?php
require_once 'class/class_usuario.php';
require_once 'class/class_curso.php';
$oUser = new Usuario();
if($_SESSION["nivel"] and ($_SESSION["nivel"] == "admin" || $_SESSION["nivel"] == "docente")) {
    $aData = $oUser->getUsersAll();
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
        
        <!-- menu -->
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li class="active">INICIO</li>
                    <!--<li><a href="#">EJERCICIOS</a></li>-->
                </ol>
            </div>
        </div>
        <!-- contenido -->
       <div class="panel panel-default">
            <div class="panel-heading">
                <a href="ad_new_user.php"> + Agregar Usuario</a>
            </div>
            <!-- .panel-heading -->
            <div class="panel-body">
                <br />
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>C. I.</th>
                                <th>Nombres</th>
                                <th>A. Paterno</th>
                                <th>A. Materno</th>
                                <th>Tipo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($aData as $aValue) {
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $aValue["u_ci"] ?></td>
                                <td><?php echo $aValue["u_nombre"] ?></td>
                                <td><?php echo $aValue["u_apellidoPat"] ?></td>
                                <td><?php echo $aValue["u_apellidoMat"] ?></td>
                                <td><?php echo $aValue["u_rol"] ?></td>
                                <td>
                                    <a href="adUsers_view.php?id=<?php echo $aValue["user_id"]?>" title="Ver funcionario"><img class="img_size" src="public/images/icons/view.png" /></a>
                                    <?php
                                    if ($_SESSION["nivel"] == 'admin') {
                                    ?>
                                        <a href="ad_edit_user.php?id=<?php echo $aValue["user_id"]?>" title="Mover funcionario">
                                            <img class="img_size" src="public/images/icons/edit.png" />
                                        </a>
                                        <a href="ad_del_user.php?id=<?php echo $aValue["user_id"]?>" title="Dar de baja">
                                            <img class="img_size" src="public/images/icons/del.png" />
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
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
