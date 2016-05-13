        <div class="col-sm-2 well">
            <div class="thumbnail">
                <p>Fecha:</p>
                <p><?php echo date("F j, Y");?></p>
                <p><strong>La Paz</strong></p>
                <button class="btn btn-primary">Info</button>
            </div>
            <!--
            <div class="well">
                <p>Evento 2</p>
            </div>
            <div class="well">
                <p>Evento 3</p>
            </div>
            -->
        </div>
    </div>
</div>
<footer class="container-fluid text-center">
    <p>copyright, Todos los derechos reservados 2016</p>
</footer>
<script src="public/js/jquery-1.10.2.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<!-- Page-Level Plugin Scripts - Tables -->
<script src="public/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="public/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- Page-Level Plugin Scripts - Dashboard -->
<script src="public/js/plugins/morris/raphael-2.1.0.min.js"></script>
<!--
<script src="public/js/plugins/morris/morris.js"></script>
-->
<!-- SB Admin Scripts - Include with every page -->
<script src="public/js/sb-admin.js"></script>
<!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
<!--
<script src="public/js/demo/dashboard-demo.js"></script>
-->
</body>
</html>