<?php

session_start();
if (isset($_SESSION['sesion'])) {

    ?>

    <?php require("../theme/head.php"); ?>

    <?php require("../theme/menuizquierdo.php"); ?>

    <?php require_once('../../modelo/areaclass.php'); ?>

    <?php require_once('../../modelo/prestamosclass.php'); ?>


    <?php if (!empty($_GET['respuesta'])) { ?>
        <?php if ($_GET['respuesta'] == "correcto") { ?>

            <script>
                window.onload = function () {
                    var mensaje = "la devolucion se a guardado exitosamente";
                    demo.showSwal('success-message', mensaje)
                    var color = 2;
                    //demo.showNotification('top','center',mensaje,color);
                }
            </script>

        <?php } else { ?>

            <script>
                window.onload = function () {
                    var mensaje = "la devolucion no se a guardado por favor intente de nuevo";
                    demo.showSwal('error-message', mensaje)
                    var color = 2;
                    //demo.showNotification('top','center',mensaje,color);
                }
            </script>

        <?php } ?>
    <?php } ?>


    <script>
        window.onload = function () {
            var element = document.getElementById("creardevolucion");
            element.classList.add("active");
        }
    </script>


    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">

            <div class="navbar-header">

                <a class="navbar-brand" href="#"> Crear Devolucion</a>
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
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                       cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Solicitante</th>
                                        <th>Fecha de envio</th>
                                        <th>Prestado a</th>
                                        <th>Numero Guia</th>
                                        <th>Observaciones</th>
                                        <th>Serie</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
                                    if (!$con) {
                                        die('Error no se pudo conectar : ' . mysqli_error($con));
                                    }
                                    mysqli_select_db($con, "ajax_demo");
                                    $sql=null;
                                    if ($_GET["prestamo"] != "all"  ){
                                        $sql = "SELECT prestamos.idPrestamos, prestamos.Solicitante, prestamos.Fecha_Envio, prestamos.Destinatario, prestamos.Numero_Guia, prestamos.Observaciones , archivos.Tipo_Documento, archivos.estado FROM prestamos INNER JOIN archivos ON prestamos.Archivos_id_Archivos=archivos.id_Archivos WHERE (prestamos.Estado='activo') and  prestamos.idPrestamos=".$_GET["prestamo"];
                                    }else{
                                    $sql = "SELECT prestamos.idPrestamos, prestamos.Solicitante, prestamos.Fecha_Envio, prestamos.Destinatario, prestamos.Numero_Guia, prestamos.Observaciones , archivos.Tipo_Documento, archivos.estado FROM prestamos INNER JOIN archivos ON prestamos.Archivos_id_Archivos=archivos.id_Archivos WHERE (prestamos.Estado='activo') and ( archivos.estado='toda' OR archivos.estado='unidad')";
                                    }
                                    $con->set_charset("utf8");
                                    $result = mysqli_query($con, $sql);

                                    while ($row = mysqli_fetch_array($result)) {
                                        $class="";
                                        if ($row["estado"]=="toda"){
                                            $class="danger";
                                        }else if ($row["estado"]=="unidad"){
                                            $class="warning";
                                        }
                                        ?>

                                        <tr class="<?php echo $class?>">
                                            <td><?php echo $row["Solicitante"] ?></td>
                                            <td><?php echo $row["Fecha_Envio"] ?></td>
                                            <td><?php echo $row["Destinatario"] ?></td>
                                            <td><?php echo $row["Numero_Guia"] ?></td>
                                            <td><?php echo $row["Observaciones"] ?></td>
                                            <td><?php echo $row["Tipo_Documento"] ?></td>
                                            <td>
                                                <button onclick="sowmoda(<?php echo $row["idPrestamos"] ?>)" id="myBtn" type="button" rel="tooltip" title="Devolver" data-devolucion=""
                                                        class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                    <span style="font-size: 15px"><i class="icon-download2"></i></span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
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
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <form id="TypeValidation" class="form-horizontal"
                                          action=""
                                          method="post">
                                        <div class="card-header card-header-text" data-background-color="blue">
                                            <h4 class="card-title">datos para Recibido</h4>
                                        </div>
                                        <div class="card-content">
                                            <input type="hidden" id="prestamos" name="prestamos" value="">
                                            <input type="hidden" id="Archivo" name="Archivo" value="">
                                            <!---------------------- Nombre de la carpeta ---------------------------------->
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Recibido por</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"></label>
                                                        <input class="form-control" type="text" name="Recibido_por"
                                                               id="Recibido_por" required="true"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>


                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Fecha</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <label class="control-label"></label>
                                                        <input type="text" name="Fecha" id="Fecha" class="form-control"
                                                               data-provide="datepicker"
                                                               data-date-format="yyyy-mm-dd"
                                                               value="<?php echo date("Y-m-d"); ?> "/>
                                                    </div>
                                                </div>
                                            </div>

                                            <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Observaciones</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"></label>
                                                        <textarea class="form-control" required="true"
                                                                  name="Observaciones"
                                                                  id="Observaciones"></textarea>
                                                    </div>
                                                </div>
                                            </div>


                                        </>

                                        <div class="card-footer text-center">
                                            <button class="btn btn-primary hvr-float " onclick="devolver()">
                                                <span style="font-size: 15px"><i class="icon-rocket">  </i></span>Guardar
                                            </button>

                                            <button class="btn btn-danger hvr-float " id="closee" type="button">
                                                <span style="font-size: 15px"><i class="icon-ban">  </i></span>Cancelar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
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

        function sowmoda(id){
            $("#prestamos").val(id);
            $.ajax({

                url: '../../Controlador/prestamoscontroller.php?action=info&id='+id, //archivo que recibe la peticion
                type: 'POST', //método de envio
                dataType: 'JSON',
                success(s){
                    $("#Observaciones").val(s['Observaciones']);
                    $("#Archivo").val(s['Archivos_id_Archivos']);
                    $("#myModal").modal();

                }


            });



        }
      $(document).ready(function () {
          /*  $("#myBtn").click(function () {
                $("#myModal").modal();
            });*/
            $("#closee").click(function () {
                $("#myModal").modal("toggle");
            });
        });

        function devolver() {
            var archivo= "data"+$("#Archivo").val();
            var parametros = {
                "prestamos": $("#prestamos").val(),
                "Recibido_por": $("#Recibido_por").val(),
                "Fecha": $("#Fecha").val(),
                "Observaciones": $("#Observaciones").val(),
                "Archivo": $("#Archivo").val(),
            }

            $.ajax({
               data:parametros,
                url: '../../Controlador/prestamoscontroller.php?action=devolver', //archivo que recibe la peticion
                type: 'POST', //método de envio
                dataType: 'JSON',
                success(s){
                    $("#"+archivo).hide();
                }


            });

        }
    </script>
    <?php require("../theme/pie.php"); ?>
    <?php
} else {

    header('Location: ../index/index.php');

} ?>
