<?php

session_start();
if (isset($_SESSION['sesion'])){

?>


<?php require("../theme/head.php"); ?>
<?php require("../theme/menuizquierdo.php"); ?>
<?php require_once('../../modelo/archivo_class.php'); ?>


<script>
    window.onload = function () {
        var element = document.getElementById("vercerticha");
        element.classList.add("active");
    }
</script>


<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">

        <div class="navbar-header">

            <a class="navbar-brand" href="#"> Lista de Certificados de Desintegracion </a>
        </div>

    </div>
</nav>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <?php if (!empty($_GET['respuesta'])) { ?>
                        <?php if ($_GET['respuesta'] == "correcto") { ?>

                            <script>
                                window.onload = function () {
                                    var mensaje = "El certifcado de desintegracion se a editado exitosamente";
                                    demo.showSwal('success-message', mensaje)
                                    var color = 2;
                                    //demo.showNotification('top','center',mensaje,color);
                                }
                            </script>

                        <?php }else { ?>

                            <script>
                                window.onload = function () {
                                    var mensaje = "lEl certifcado de desintegracion no se a editado por favor intente de nuevo";
                                    demo.showSwal('error-message', mensaje)
                                    var color = 2;
                                    //demo.showNotification('top','center',mensaje,color);
                                }
                            </script>

                        <?php } ?>
                    <?php } ?>

                    <div class="card-header card-header-icon" data-background-color="blue">
                        <span style="font-size: 30px"><i class=" icon-truck"></i></span>
                    </div>

                    <div class="card-content">
                        <h4 class="card-title">Certificados de desintegracion </h4>
                        <div class="toolbar">
                            <div class="card-content">
                                <div class="material-datatables">
                                    <table id="datatables"
                                           class="table table-striped table-no-bordered table-hover nowrap"
                                           cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Consecutivo</th>
                                            <th>Documento</th>
                                            <th>Numero</th>
                                            <th>Placa</th>
                                            <th>Clase</th>
                                            <th>Fecha</th>
                                            <th>Descripcion</th>
                                            <th>Más</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $arrimportacion = archivo_class::getAll("Cert_Desintegracion");
                                        ?>
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
        </div>
        </div>



        <div class="container">
            <h2>Modal Login Example</h2>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="div-cont">
                        <div id="form"> </div>
                    </div>

                </div>
            </div>
        </div>






        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatables').DataTable({
                    "pagingType": "full_numbers",
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "Todos"]
                    ],
                    responsive: true,
                    scrollX: true,
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla",
                        sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "Buscar:",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior"
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente"
                        }
                    }


                });

                $('.card .material-datatables label').addClass('form-group');
            });

function ver(tipo,id) {

    var data2 = {
        "Tipo": tipo,
        "id": id,
    };
    $.ajax({
        data: data2,
        url: '../../Controlador/documentocontroller.php?action=editar', //archivo que recibe la peticion
        type: 'POST',

        success: function (respuesta) {

            $("#form").load(respuesta);
            $("#myModal").modal();

        }
    });

}


            $(document).ready(function(){
                $("#myBtn").click(function(){

                });
            });

        </script>


        <?php require("../theme/pie.php"); ?>
        <?php
        }
        else {

            header('Location: ../Inicio/Login');

        } ?>
