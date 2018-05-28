<?php

session_start();
if (isset($_SESSION['sesion'])) {

    ?>


    <?php require("../theme/head.php"); ?>

    <!-- top navigation -->


    <?php require("../theme/menuizquierdo.php"); ?>

    <?php require_once('../../modelo/areaclass.php'); ?>
    <?php require_once('../../modelo/Contratosclass.php'); ?>
    <script>
        window.onload = function () {
            var element = document.getElementById("vercontratos");
            element.classList.add("active");
        }

    </script>
    <?php $id = $_GET["editar"];
    $id = base64_decode($id);

    $desintegracion = Contratosclass::buscarForId($id);

    if (count($desintegracion) > 0) {

        foreach ($desintegracion as $valor) {
            $id = $valor->getIdContrato();
            $Nombre = $valor->getNombre();
            $Numero = $valor->getNumero();
            $Contratista = $valor->getContratista();
            $fecha = $valor->getFecha();
            $area = $valor->getArea();
            $descripcion = $valor->getDescripcion();
            $ubicacion = $valor->getUbicacion();
            list($sala, $fila, $cara, $estante, $balda, $am) = preg_split('[-]', $ubicacion);


        }
    }

    ?>
    <?php if (!empty($_GET['respuesta'])) { ?>
        <?php if ($_GET['respuesta'] == "correcto") { ?>

            <script>
                window.onload = function () {
                    var mensaje = "El contrato se a editado exitosamente";
                    var color = 2;
                    demo.showNotification('top', 'center', mensaje, color);
                }
            </script>

        <?php } else { ?>

            <script>
                window.onload = function () {
                    var mensaje = "El contrato no se a podido editar intente nuevamente";
                    var color = 4;
                    demo.showNotification('top', 'center', mensaje, color);
                }
            </script>

        <?php } ?>
    <?php } ?>


    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">

            <div class="navbar-header">

                <a class="navbar-brand" href="#"> Editar Contrato</a>
            </div>

        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">


                        <form id="TypeValidation" class="form-horizontal"
                              action="../../Controlador/Contratoscontroller.php?action=editar" method="post">
                            <div class="card-header card-header-text" data-background-color="blue">
                                <h4 class="card-title">Informacion Basica</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <input type="hidden" value="<?php echo base64_encode($id); ?>" name="id" id="id">

                                    <!---------------------- Nombre de la empresa  ---------------------------------->
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Nombre de la Empresa</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input type="text" name="Nombre" id="Nombre" class="form-control"
                                                       value="<?php echo $Nombre ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!---------------------- Numero de la empresa ---------------------------------->

                                <div id="patronaldiv">
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">N° de Contrato </label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input type="text" name="Numero" id="Numero" class="form-control"
                                                       value="<?php echo $Numero ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--------------------------------- Nombre del representante legal ------------------------------>
                                <div class="row">

                                    <label class="col-sm-2 label-on-left">Nombre del Contratista</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input type="text" name="Contratista" id="Contratista" class="form-control"
                                                   required="true" value="<?php echo $Contratista ?>"/>
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
                                <button class="btn btn-primary hvr-float " type="submit">
                                    <i class="icon-rocket"> </i> Guardar
                                </button>
                                <a href="ver_contratos.php">
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


    <?php require("../theme/pie.php"); ?><?php
} else {

    header('Location: ../index/index.php');

} ?>