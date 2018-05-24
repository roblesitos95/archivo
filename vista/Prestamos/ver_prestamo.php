<?php

session_start();
if(isset($_SESSION['sesion'])){

    ?>

    <?php require("../theme/head.php");?>
<?php require("../theme/menuizquierdo.php");?>
    <?php require_once('../../modelo/prestamosclass.php');?>

<?php
$p=base64_decode($_GET["l"]);
    ?>

    <script>
        window.onload=function() {
            var element = document.getElementById("creardevolucion");
            element.classList.add("active");
        }
    </script>

            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">

                    <div class="navbar-header">

                        <a class="navbar-brand" href="#"> Lista de Documentacion prestada </a>
                    </div>

                </div>
            </nav>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                    <div class="card-header card-header-icon" data-background-color="blue">
                                        <span style="font-size: 30px"><i class="icon-download2"></i></span>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">Documentacion Prestada </h4>
                                        <div class="toolbar">
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        </div>
                                        <div class="material-datatables">
                                            <table id="tableprestamos" class="table table-striped table-no-bordered table-hover"
                                                   cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Documento</th>
                                                    <th>Prestado a</th>
                                                    <th>Fecha de envio</th>
                                                    <th>Acciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    <td>lol</td>
                                                    <td>asd</td>
                                                    <td>asd</td>
                                                    <td>asd</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>



                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>
            </div>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableprestamos').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Todos"]
                ],
                responsive: true,
                language: {
                    sProcessing:     "Procesando...",
                    sLengthMenu:     "Mostrar _MENU_ registros",
                    sZeroRecords:    "No se encontraron resultados",
                    sEmptyTable:     "Ningún dato disponible en esta tabla",
                    sInfo:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    sInfoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    sInfoFiltered:   "(filtrado de un total de _MAX_ registros)",
                    sInfoPostFix:    "",
                    sSearch:         "Buscar:",
                    sUrl:            "",
                    sInfoThousands:  ",",
                    sLoadingRecords: "Cargando...",
                    oPaginate: {
                        sFirst:    "Primero",
                        sLast:     "Último",
                        sNext:     "Siguiente",
                        sPrevious: "Anterior"
                    },
                    oAria: {
                        sSortAscending:  ": Activar para ordenar la columna de manera ascendente",
                        sSortDescending: ": Activar para ordenar la columna de manera descendente"
                    }
                }

            });

            $('.card .material-datatables label').addClass('form-group');
        });


    </script>
<?php require("../theme/pie.php");?>
    <?php
}
else{

    header('Location: ../Inicio/Login');

} ?>
