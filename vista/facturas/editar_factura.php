<?php

session_start();
if (isset($_SESSION['sesion'])) {

    ?>

    <?php require("../theme/head.php"); ?>

    <!-- top navigation -->


    <?php require("../theme/menuizquierdo.php"); ?>

    <?php require_once('../../modelo/areaclass.php'); ?>
    <?php require_once('../../modelo/facturaclass.php'); ?>

    <script>
        function text() {
            var x = document.getElementById("Tipo").value;
            if (x == "Otros") {
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


                    var porId = $('#input-field').val();
                    document.getElementById("Tipo2").value = porId;

                }).catch(swal.noop)

            }
            /*
        */
        }

        window.onload = function () {
            var element = document.getElementById("verfactura");
            element.classList.add("active");
        }
    </script>

    <?php $id = $_GET["editar"];
    $id = base64_decode($id);

    $desintegracion = facturaclass::buscarForId($id);

    if (count($desintegracion) > 0) {

        foreach ($desintegracion as $valor) {
            $id = $valor->getIdFactura();
            $Numero = $valor->getNumero();
            $Titular = $valor->getTitular();
            $NIT = $valor->getNIT();
            $Tipo = $valor->getTipo();
            $Contable = $valor->getContable();
            $fecha = $valor->getFecha();
            $area = $valor->getArea();
            $descripcion = $valor->getDescripcion();
            $ubicacion = $valor->getUbicacion();
            list($sala, $fila, $cara, $estante, $balda, $am) = preg_split('[-]', $ubicacion);


        }
    }
    ?>


    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">

            <div class="navbar-header">

                <a class="navbar-brand" href="#"> Crear Documento Contable</a>
            </div>

        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">


                        <form id="TypeValidation" class="form-horizontal"
                              action="../../Controlador/facturacontroller.php?action=editar" method="post">
                            <div class="card-header card-header-text" data-background-color="blue">
                                <h4 class="card-title">Informacion Basica</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <input type="hidden" value="<?php echo base64_encode($id); ?>" name="id" id="id">

                                    <!---------------------- Nombre de la carpeta ---------------------------------->
                                    <label class="col-sm-2 label-on-left">Numero de Factura</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input class="form-control" type="text" name="Numero" id="Numero"
                                                   required="true" value="<?php echo $Numero ?>"/>
                                        </div>
                                    </div>
                                </div>

                                <!--------------------------------- descripcioin de la importacion------------------------------>
                                <div class="row">

                                    <label class="col-sm-2 label-on-left">Titular</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input class="form-control" type="text" name="Titular" id="Titular"
                                                   required="true" value="<?php echo $Titular ?>"/>
                                        </div>
                                    </div>

                                </div>

                                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">NIT</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" required="true" id="NIT" name="NIT"
                                                   value="<?php echo $NIT ?>"/>
                                        </div>
                                    </div>
                                </div>

                                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Tipo</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <select class="form-control" required="true" name="Tipo" id="Tipo"
                                                    onchange="text()">
                                                <option value="<?php echo $Tipo ?>"><?php echo $Tipo ?></option>
                                                <option value="Compra">Compra</option>
                                                <option value="Servicio">Servicio</option>
                                                <option value="Venta">Venta</option>
                                                <option value="Chatarra">Chatarra</option>
                                                <option value="Otros">Otros</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="display: none">
                                    <label class="col-sm-2 label-on-left">Documento Contable</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <input type="hidden" name="Tipo2" id="Tipo2"/>
                                        </div>
                                    </div>
                                </div>

                                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Documento Contable</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <input type="text" class="form-control " value="<?php echo $Contable ?>"
                                                   required="true" name="Contable" id="Contable"/>
                                        </div>
                                    </div>
                                </div>

                                <!--------------------------------- fecha del contrato ------------------------------>

                                <div class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Fecha</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <input type="text" name="Fecha" id="Fecha"
                                                               class="form-control datepicker"
                                                               value="<?php echo $fecha ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="display: none">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <br>
                                                    <br>
                                                    <div class="row">

                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="row">

                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="col-md-6">
                                                                <legend>Sliders</legend>
                                                                <div id="sliderRegular" class="slider"></div>
                                                                <div id="sliderDouble" class="slider slider-info"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-4">


                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end card -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!----------------------------- Area de Transferencia ------------------------------>

                                <div class="row">

                                    <label class="col-sm-2 label-on-left">Transferencia</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <?php echo areaclass::selectedarea("Area", "Area", "form-control", $area) ?>
                                        </div>
                                    </div>

                                </div>
                                <!----------------------------- Descripcion ------------------------------>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Descripcion</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <textarea class="form-control " required="true" id="Descripcion"
                                                      name="Descripcion"><?php echo $descripcion ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!----------------------------- Ubicacion topografica del contrato ------------------------------>


                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Ubicacion Topografica</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3    ">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" placeholder="Sala"
                                                           value="<?php echo $sala ?>" name="Sala" id="Sala">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="Fila" id="Fila" class="form-control"
                                                           placeholder="Fila" value="<?php echo $fila ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="Cara" id="Cara"
                                                           placeholder="Cara" value="<?php echo $cara ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3    ">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" placeholder="Estante"
                                                           name="Estante" id="Estante" value="<?php echo $estante ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" placeholder="Balda"
                                                           name="Balda" id="Balda" value="<?php echo $balda ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Archivo modular" name="Arcivo_Modular"
                                                           id="Arcivo_Modular" value="<?php echo $am ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button class="btn btn-primary" type="submit">
                                    <span style="font-size: 15px"><i class="icon-rocket">  </i></span> Guardar
                                </button>
                                <a href="ver_factura.php">
                                    <button class="btn btn-danger" type="button">
                                        <span style="font-size: 15px"><i class="icon-ban">  </i></span>Cancelar
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php require("../theme/pie.php"); ?>
    <?php
} else {

    header('Location: ../index/index.php');

} ?>
