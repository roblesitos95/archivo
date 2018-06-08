<?php

session_start();
if (isset($_SESSION['sesion'])) {

    ?>

    <?php require("../theme/head.php"); ?>
    <?php require("../theme/menuizquierdo.php"); ?>
    <?php require_once('../../modelo/archivo_class.php'); ?>


    <script>
        window.onload = function () {
            var element = document.getElementById("versocial");
            element.classList.add("active");
            var parent = document.getElementById("seg");
            parent.classList.add("active");
        }
    </script>

    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">

            <div class="navbar-header">

                <a class="navbar-brand" href="#"> Lista de Seguridad Social </a>
            </div>

        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <h4 class="card-title">Documentacion Seguridad Social </h4>
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                       cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Consecutivo</th>
                                        <th>Documento</th>
                                        <th>Numero patronal</th>
                                        <th>Prestadora de Servicio</th>
                                        <th>Empresa Laboral</th>
                                        <th>Fecha</th>
                                        <th>Descripcion</th>
                                        <th>Mas</th>
                                    </tr>
                                    </thead>
                                    <tfoot>

                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $arrimportacion = archivo_class::getAll("Seguridad_social");
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

    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="modalform" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="div-cont">
                    <div id="form"></div>
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

        function ver(tipo, id) {

            var data2 = {
                "Tipo": tipo,
                "id": id,
            };
            $.ajax({
                data: data2,
                url: '../../Controlador/documentocontroller.php?action=ver', //archivo que recibe la peticion
                type: 'POST',

                success: function (respuesta) {

                    $("#form").load(respuesta);
                    $("#modalform").modal();

                }
            });

        }


        $(document).ready(function () {
            $("#myBtnclose").click(function () {
                $("#modalform").modal("toggle");
            });
        });

        function swale(id) {
            var data2 = {
                "id": id,
            };
            $.ajax({
                data:data2,
                url: '../../Controlador/documentocontroller.php?action=topo', //archivo que recibe la peticion
                type: 'POST',
                dataType: 'JSON',//tipo de datos
                success: function (respuesta) {
                    var  pm  = respuesta;

                   swal({

                        text: "<div class=\"row\">" +
                        "                        <div >" +
                        "                            <div class=\"card\">" +
                        "                                <div class=\"card-header card-header-icon\" data-background-color=\"blue\">" +
                        "                                    <span style='font-size: 35px'><i class=\"icon-location2\"></i></span>" +
                        "                                </div>\n" +
                        "                                <div class=\"card-content\">" +
                        "                                    <h4 class=\"card-title\">Ubiacion topografica</h4>" +
                        "                                    <div >" +
                        "                                        <div >" +
                        "                                            <div>" +
                        "                                                <table class=\"table\">" +
                        "                                                    <tbody>" +

                        "                                                        <tr>" +
                        "                                                            <td class=\"text-left\">Sala</td>" +
                        "                                                            <td class=\"text-center text-primary\">" + pm["sala"] +
                        "                                                            </td>" +
                        "                                                        </tr>" +

                        "                                                        <tr>" +
                        "                                                            <td class=\"text-left\">Fila</td>" +
                        "                                                            <td class=\"text-center text-primary\">" + pm["fila"] +
                        "                                                            </td>" +
                        "                                                        </tr>" +

                        "                                                        <tr>" +
                        "                                                            <td class=\"text-left\">Cara</td>" +
                        "                                                            <td class=\"text-center text-primary\">" + pm["cara"] +
                        "                                                            </td>" +
                        "                                                        </tr>" +

                        "                                                        <tr>" +
                        "                                                            <td class=\"text-left\">Estante</td>" +
                        "                                                           <td class=\"text-center text-primary\">" + pm["estante"] +
                        "                                                            </td>" +
                        "                                                        </tr>" +

                        "                                                        <tr>" +
                        "                                                            <td class=\"text-left\">Balda</td>" +
                        "                                                            <td class=\"text-center text-primary\">" + pm["balda"] +
                        "                                                            </td>" +
                        "                                                        </tr>" +

                        "                                                        <tr>" +
                        "                                                            <td class=\"text-left\">Archivo Modular</td>" +
                        "                                                            <td class=\"text-center text-primary\">" + pm["am"] +
                        "                                                            </td>" +
                        "                                                        </tr>" +
                        "                                                    </tbody>" +
                        "                                                </table>" +
                        "                                            </div>" +
                        "                                        </div>" +
                        "                                    </div>" +
                        "                                </div>" +
                        "                            </div>" +
                        "                        </div>" +
                        "                    </div>",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-primary"
                    });
                }
            });




        }
        
    </script>
    <?php require("../theme/pie.php"); ?>
    <?php
} else {

    header('Location: ../index/index.php');

} ?>
