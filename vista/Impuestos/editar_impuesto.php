<?php

session_start();
if(isset($_SESSION['sesion'])){

    ?>

    <?php require("../theme/head.php");?>

<?php require("../theme/menuizquierdo.php");?>

<?php require_once('../../modelo/impuestoclass.php');?>

<?php require_once('../../modelo/areaclass.php');?>

    <script>
        window.onload=function() {
            var element = document.getElementById("verimpuestos");
            element.classList.add("active");
        }
    </script>

<?php $id=$_GET["editar"];
    $id=base64_decode($id);
    $import=impuestoclass::buscarForId($id);

if (count($import)>0){

    foreach ($import as $valor){
        $id = $valor->getIdimpuesto();
        $nombre = $valor->getDocumento();
        $fecha = $valor-> getFecha();
        $getDescripcion= $valor->getDescripcion();
        $ubicacion= $valor->getUbicacion();
        $area =$valor->getArea();
        list($sala, $fila, $cara,$estante,$balda,$am) = preg_split('[-]', $ubicacion);

    }

}
    ?>


    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">

            <div class="navbar-header">

                <a class="navbar-brand" href="#"> Editar Impuesto  </a>
            </div>

        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">


                        <form id="TypeValidation" class="form-horizontal" action="../../Controlador/impuestocontroller.php?action=editar" method="post">
                            <div class="card-header card-header-text" data-background-color="blue">
                                <h4 class="card-title">Informacion Basica</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <input type="hidden" value="<?php echo base64_encode($id);?>" name="id" id="id">
                                    <!---------------------- NOmbre de la carpeta ---------------------------------->
                                    <label class="col-sm-2 label-on-left">Documento</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <input name="Nombre" id="Nombre" type="text" class="form-control " value="<?php echo $nombre ;?>"  />
                                        </div>
                                    </div>


                                </div>

                                <!--------------------------------- descripcioin de la importacion------------------------------>
                                <div class="row">

                                    <label class="col-sm-2 label-on-left">Descripcion</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <textarea class="form-control" name="Productos" required="true" id="Productos"  ><?php echo $getDescripcion ;?></textarea>
                                        </div>
                                    </div>

                                </div>

                                <!--------------------------------- fecha de la importacion------------------------------>

                                <div class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">fecha</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <input type="text" name="Fecha" id="Fecha" class="form-control datepicker" value="<?php echo date("m/d/y"); ?> " />
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
                                                    <div class="row" >
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
                                <!--------------------------------- fecha de la importacion------------------------------>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Transferencia</label>
                                    <div class="col-sm-7">
                                        <div class="form-group label-floating">
                                            <?php echo areaclass::selectedarea("area","area","form-control",$area)  ?>

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
                                                    <input type="text" class="form-control" placeholder="Sala" value="<?php echo $sala ;?>"  name="Sala" id="Sala" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" name="Fila" id="Fila" class="form-control"  value="<?php echo $fila ;?>"  placeholder="Fila">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="Cara" id="Cara" value="<?php echo $cara ;?>"  placeholder="Cara">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" placeholder="Estante" value="<?php echo $estante;?>"  name="Estante" id="Estante">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" placeholder="Balda" value="<?php echo $balda;?>"  name="Balda" id="Balda">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" placeholder="Archivo modular" value="<?php echo $am ;?>"  name="Arcivo_Modular" id="Arcivo_Modular">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-center">
                                <button class="btn btn-primary hvr-float "  type="submit"  >
                                    <span style="font-size: 15px"><i class="icon-rocket">  </i></span>Guardar
                                </button>
                                <a href="ver_impuestos.php"> <button class="btn btn-danger hvr-float "  type="button"  >
                                        <span style="font-size: 15px"><i class="icon-ban">  </i></span>Cancelar
                                    </button></a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


<?php require("../theme/pie.php");?>
    <?php
}
else{

    header('Location: ../index/index.php');

} ?>
