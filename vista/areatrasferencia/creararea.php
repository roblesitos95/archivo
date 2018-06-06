<?php

session_start();
if (isset($_SESSION['sesion'])) {

    ?>


    <?php require("../theme/head.php"); ?>

    <!-- top navigation -->


    <?php require("../theme/menuizquierdo.php"); ?>

    <?php require_once('../../modelo/areaclass.php'); ?>

    <script>
        function text() {
            var x = document.getElementById("Tipo").value;

            swal({
                title: 'Tipo de Factura',
                html: '<div class="form-group">' +
                '<input id="input-field" name="Tipo2" type="text" class="form-control"/>' +
                '</div>',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false

            }).then(function (result) {

            }).catch(swal.noop)

        }


        window.onload = function () {
            var element = document.getElementById("creararea");
            element.classList.add("active");
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function (e) {
            $('.yearselect').yearselect();

            $('.yrselectdesc').yearselect({step: 1, order: 'desc'});
            $('.yrselectasc').yearselect({order: 'asc'});
        });
    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>


    <?php if (!empty($_GET['respuesta'])) { ?>
        <?php if ($_GET['respuesta'] == "correcto") { ?>

            <script>
                window.onload = function () {
                    var mensaje = "La Transferencia se a Creado exitosamente";
                    demo.showSwal('success-message', mensaje)
                    var color = 2;
                    //demo.showNotification('top','center',mensaje,color);
                }
            </script>

        <?php } else { ?>

            <script>
                window.onload = function () {
                    var mensaje = "La Transferencia no se a Creado por favor intente de nuevo";
                    demo.showSwal('error-message', mensaje)
                    var color = 2;
                    //demo.showNotification('top','center',mensaje,color);
                }
            </script>

        <?php } ?>
    <?php } ?>


    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">

            <div class="navbar-header">

                <a class="navbar-brand" href="#"> Crear Transferencia </a>
            </div>

        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">


                        <form id="TypeValidation" class="form-horizontal"
                              action="../../Controlador/areacontroller.php?action=crear" method="post">
                            <div class="card-header card-header-text" data-background-color="blue">
                                <h4 class="card-title">Informacion Basica</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">

                                    <!---------------------- seda ---------------------------------->
                                    <label class="col-sm-2 label-on-left">Sede</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <select id="Sede" name="Sede" required class="form-control">
                                                <option value="" selected> Seleccione...</option>
                                                <option value="BOG"> Bogota</option>
                                                <option value="BUC"> Bucaramanga</option>
                                                <option value="CTG"> Cartagena</option>
                                                <option value="CT"> Cota</option>
                                                <option value="MÑ"> Muña</option>
                                                <option value="NV"> Neiva</option>
                                                <option value="SAB"> Sabaneta</option>
                                                <option value="TC"> Tocancipa</option>
                                                <option value="TT"> Tuta</option>
                                                <option value="YB"> Yumbo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!--------------------------------- descripcioin de la importacion------------------------------>
                                <div class="row">

                                    <label class="col-sm-2 label-on-left">Area</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <select class="form-control" name="Area" id="Area" required>
                                                <option selected value=""> Seleccione...</option>
                                                <option value="ADMINISTRACION"> Administracion</option>
                                                <option value="ALMACEN_GENERAL"> Almacen General</option>
                                                <option value="ACERIA"> Aceria</option>
                                                <option value="CARTERA"> Cartera</option>
                                                <option value="COMERCIO_EXTERIOR"> Comercio Exterior</option>
                                                <option value="CONTABILIDAD"> Contabilidad</option>
                                                <option value="CYRGO">Cyrgo</option>
                                                <option value="GESTION_CALIDAD"> Gestion Calidad</option>
                                                <option value="GESTION_DOCUMENTAL_ARCHIVISTICA"> Gestion Documental
                                                    Archivistica
                                                </option>
                                                <option value="IMPUESTOS">Impuestos</option>
                                                <option value="LAMINACION">Laminacion</option>
                                                <option value="LOGISTICA">Logistica</option>
                                                <option value="MANTENIMIENTO">Mantenimiento</option>
                                                <option value="MEDIO_AMBIENTE">Medio Ambiente</option>
                                                <option value="METALICOS">Metalicos</option>
                                                <option value="PERSONAS"> Personas</option>
                                                <option value="SALUD_OCUPACIONAL">Salud Ocupacional</option>
                                                <option value="SECRETARIA_JURIDICA"> Secretaria Juridica</option>
                                                <option value="SEGUROS"> Seguros</option>
                                                <option value="TESORERIA">Tesoreria</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <!----------------------------- Consecutivo de liquidacion de la importacion----------------------------->

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Año</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <select class="js-example-basic-multiple yrselectdesc form-control"
                                                    name="anho[]" multiple="multiple" id="Anho"
                                                    required="Area"></select>
                                        </div>
                                    </div>
                                </div>


                                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Asunto</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <input type="text" class="form-control " required="true" name="Asunto"
                                                   id="Asunto"/>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="card-footer text-center">
                                <button class="btn btn-primary hvr-float" type="submit">
                                    <i class="icon-rocket"> </i> Guardar
                                </button>
                                <a href="">
                                    <button class="btn btn-danger hvr-float " type="reset">
                                        <i class="icon-refresh"> </i> Cancelar
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({
                language: "es"
            });
        });

    </script>

    <?php require("../theme/pie.php"); ?>
    <?php
} else {

    header('Location: ../Inicio/Login');

} ?>
