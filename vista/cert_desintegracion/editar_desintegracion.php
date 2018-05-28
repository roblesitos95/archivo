<?php

session_start();
if (isset($_SESSION['sesion'])) {

    ?>


    <?php require("../theme/head.php"); ?>

    <!-- top navigation -->


    <?php require("../theme/menuizquierdo.php"); ?>
    <?php require_once('../../modelo/desintegracionclass.php'); ?>
    <?php require_once('../../modelo/areaclass.php'); ?>
    <script>
        window.onload = function () {
            var element = document.getElementById("vercerticha");
            element.classList.add("active");
        }
    </script>
    <?php $id = $_GET["editar"];
    $id = base64_decode($id);

    $desintegracion = desintegracionclass::buscarForId($id);

    if (count($desintegracion) > 0) {

        foreach ($desintegracion as $valor) {
            $id = $valor->getIdCertificado();
            $Documento = $valor->getDocumento();
            $Numero = $valor->getNumero();
            $placa = $valor->getPlaca();
            $clase = $valor->getClase();
            $fecha = $valor->getFecha();
            $area = $valor->getArea();
            $descripcion = $valor->getDescripcion();
            $ubicacion = $valor->getUbicacion();
            list($sala, $fila, $cara, $estante, $balda, $am) = preg_split('[-]', $ubicacion);


        }
    }

    ?>


    <script>

    </script>

    <?php if (!empty($_GET['respuesta'])) { ?>
        <?php if ($_GET['respuesta'] == "correcto") { ?>

            <script>
                window.onload = function () {
                    var mensaje = "el certificado se a editado exitosamente";
                    var color = 2;
                    demo.showNotification('top', 'center', mensaje, color);
                }
            </script>

        <?php } else { ?>

            <script>
                window.onload = function () {
                    var mensaje = "el certificado no se a podido editar intente de nuevo";
                    var color = 4;
                    demo.showNotification('top', 'center', mensaje, color);
                }
            </script>

        <?php } ?>
    <?php } ?>


    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">

            <div class="navbar-header">

                <a class="navbar-brand" href="#"> Editar Importacion </a>
            </div>

        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">


                        <form id="TypeValidation" class="form-horizontal"
                              action="../../Controlador/desintegracioncontroller.php?action=editar" method="post">

                            <div class="card-header card-header-text" data-background-color="blue">
                                <h4 class="card-title">Informacion Basica</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">

                                    <input type="hidden" value="<?php echo base64_encode($id); ?>" name="id" id="id">
                                    <!---------------------- NOmbre de la carpeta ---------------------------------->
                                    <label class="col-sm-2 label-on-left">Tipo de Documento</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input class="form-control" type="text" value="<?php echo $Documento ?>"
                                                   name="Documento" id="Documento" required="true"/>
                                        </div>
                                    </div>
                                </div>

                                <!--------------------------------- descripcioin de la importacion------------------------------>
                                <div class="row">

                                    <label class="col-sm-2 label-on-left">Numero</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input class="form-control" type="text" value="<?php echo $Numero ?>"
                                                   name="Numero" id="Numero" required="true"/>
                                        </div>
                                    </div>

                                </div>

                                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Placa</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control " required="true" id="Placa"
                                                   value="<?php echo $placa ?>" name="Placa"/>

                                        </div>
                                    </div>
                                </div>

                                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Clase</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <input type="text" class="form-control " required="true" name="Clase"
                                                   id="Clase" value="<?php echo $clase ?>"/>
                                        </div>
                                    </div>
                                </div>

                                <!--------------------------------- fecha de la importacion------------------------------>

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
                                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                                <div class="row">

                                    <label class="col-sm-2 label-on-left">Transferencia</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <?php echo areaclass::selectedarea("area", "area", "form-control", $area) ?>
                                        </div>
                                    </div>

                                </div>
                                <!----------------------------- Consecutivo de pedido de la importacion------------------------------>


                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Descripcion</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <textarea class="form-control " required="true" id="Descripcion"
                                                      name="Descripcion"><?php echo $descripcion ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!----------------------------- Ubicacion topografica de la importacion------------------------------>


                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Ubicacion Topografica</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" value="<?php echo $sala ?>"
                                                           placeholder="Sala" name="Sala" id="Sala">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="Fila" id="Fila" class="form-control"
                                                           value="<?php echo $fila ?>" placeholder="Fila">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="Cara" id="Cara"
                                                           value="<?php echo $cara ?>" placeholder="Cara">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" placeholder="Estante"
                                                           name="Estante" value="<?php echo $estante ?>" id="Estante">
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
                                                           value="<?php echo $am ?>" id="Arcivo_Modular">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button class="btn btn-primary hvr-float " type="submit">
                                    <i class="icon-rocket"> </i> Guardar

                                </button>
                                <a href="ver_desintegracion.php">
                                    <button class="btn btn-danger hvr-float " type="button">

                                        <i class="icon-ban"> </i> Cancelar
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

    header('Location: ../index/index');

} ?>
