<?php

session_start();
if (isset($_SESSION['sesion'])) {

    ?>

    <?php require("../theme/head.php"); ?>

    <!-- top navigation -->


    <?php require("../theme/menuizquierdo.php"); ?>

    <?php require_once('../../modelo/areaclass.php'); ?>
    <?php require_once('../../modelo/seguridadclass.php'); ?>

    <script>
        window.onload = function () {
            var element = document.getElementById("vercontable");
            element.classList.add("active");
        }
    </script>

    <?php $id = $_GET["editar"];
    $id = base64_decode($id);

    $desintegracion = seguridadclass::buscarForId($id);

    if (count($desintegracion) > 0) {

        foreach ($desintegracion as $valor) {
            $id = $valor->getIdSeguridad();
            $Documento = $valor->getDocumento();
            $Numero = $valor->getNumeropatronal();
            $getEmpresadeservicio = $valor->getEmpresadeservicio();
            $getEmpresalaboral = $valor->getEmpresalaboral();
            $getCiudad = $valor->getCiudad();
            $fecha = $valor->getFecha();
            $area = $valor->getArea();
            $descripcion = $valor->getDescripcion();
            $ubicacion = $valor->getUbicacion();
            list($sala, $fila, $cara, $estante, $balda, $am) = preg_split('[-]', $ubicacion);


        }
    } else {
        header("../theme/404.php");
    }
    ?>


    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">

            <div class="navbar-header">

                <a class="navbar-brand" href="#"> Editar Seguridad social</a>
            </div>

        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">


                        <form id="TypeValidation" class="form-horizontal"
                              action="../../Controlador/seguridadcontroller.php?action=editar" method="post">
                            <div class="card-header card-header-text" data-background-color="blue">
                                <h4 class="card-title">Informacion Basica</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <input type="hidden" name="id" id="id" value="<?php echo base64_encode($id); ?>">
                                    <!---------------------- Tipo de documento ---------------------------------->
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Tipo Documento </label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input type="text" name="documento" id="documento" class="form-control "
                                                       value="<?php echo $Documento ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="patronaldiv">
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">N° patronal </label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input type="text" name="Numero" id="Numero" class="form-control "
                                                       value="<?php echo $Numero ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--------------------------------- descripcioin de la importacion------------------------------>
                                <div class="row">

                                    <label class="col-sm-2 label-on-left">Empresa Prestadora de Servicio</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input type="text" name="empresadeservicio" id="empresadeservicio"
                                                   class="form-control " value="<?php echo $getEmpresadeservicio ?>"
                                                   required="true"/>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <label class="col-sm-2 label-on-left">Empresa laboral</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input type="text" name="empresalaboral" id="empresalaboral"
                                                   class="form-control " value="<?php echo $getEmpresalaboral ?>"
                                                   required="true"/>
                                        </div>
                                    </div>

                                </div>

                                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Transferencia</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <?php echo areaclass::selectedarea("Area", "Area", "form-control", $area) ?>
                                        </div>
                                    </div>
                                </div>
                                <!--------------------------------- fecha de la importacion------------------------------>

                                <div class="row">


                                    <label class="col-sm-2 label-on-left">Ciudad</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">

                                            <input type="text" name="Ciudad" id="Ciudad" class="form-control "
                                                   value="<?php echo $getCiudad ?>" required="true"/>
                                        </div>
                                    </div>

                                </div>

                                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

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

                                <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

                                <div class="row">


                                    <label class="col-sm-2 label-on-left">Descripcion</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">

                                            <input type="text" class="form-control " required="true" id="Descripcion"
                                                   name="Descripcion" value="<?php echo $descripcion ?>"/>

                                        </div>
                                    </div>

                                </div>

                                <!----------------------------- Ubicacion topografica de la importacion------------------------------>


                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Ubicacion Topografica</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3    ">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" placeholder="Sala"
                                                           name="Sala" id="Sala" value="<?php echo $sala ?>">
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
                                    <span style="font-size: 12px"> <i class="icon-rocket">  </i> Guardar</span>
                                </button>
                                <a href="ver_seguridad.php">
                                    <button class="btn btn-danger" type="button">
                                        <span style="font-size: 12px"><i class="icon-ban"></i> Cancelar</span>
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
