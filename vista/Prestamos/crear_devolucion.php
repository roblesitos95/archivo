<?php

session_start();
if(isset($_SESSION['sesion'])){

    ?>

    <?php require("../theme/head.php");?>

<?php require("../theme/menuizquierdo.php");?>

<?php require_once('../../modelo/areaclass.php');?>

<?php require_once('../../modelo/prestamosclass.php');?>


<?php if(!empty($_GET['respuesta'])){ ?>
    <?php if ($_GET['respuesta'] == "correcto"){ ?>

        <script>
            window.onload=function() {
                var mensaje = "la devolucion se a guardado exitosamente";
                demo.showSwal('success-message',mensaje)
                var color = 2;
                //demo.showNotification('top','center',mensaje,color);
            }
        </script>

    <?php }else {?>

        <script>
            window.onload=function() {
                var mensaje = "la devolucion no se a guardado por favor intente de nuevo";
                demo.showSwal('error-message',mensaje)
                var color = 2;
                //demo.showNotification('top','center',mensaje,color);
            }
        </script>

    <?php } ?>
<?php } ?>


<?php

$id=$_GET["editar"];
$id=base64_decode($id);

$desintegracion=prestamosclass::buscarForId($id);

if (count($desintegracion)>0){

    foreach ($desintegracion as $valor){
        $ieed = $valor->getObservaciones();
        $u=$valor->getUbicacion();
    }
}
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

                    <a class="navbar-brand" href="#"> Crear Devolucion</a>
                </div>

            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <form id="TypeValidation" class="form-horizontal" action="../../Controlador/prestamoscontroller.php?action=editar" method="post">
                                <div class="card-header card-header-text" data-background-color="blue">
                                    <h4 class="card-title">Informacion Basica</h4>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <input type="hidden" value="<?php echo base64_encode($id);?>" name="id" id="id">

                                        <!---------------------- Nombre de la carpeta ---------------------------------->
                                        <label class="col-sm-2 label-on-left">Recibido por</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input class="form-control" type="text" name="Recibido_por" id="Recibido_por" required="true" />
                                            </div>
                                        </div>
                                    </div>

                                    <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Fecha de Recibido</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control datepicker" required="true" id="Fecha_Recibido" name="Fecha_Recibido"  value="<?php echo date("m/d/y"); ?> "  />
                                            </div>
                                        </div>
                                    </div>



                                    <!--------------------------------- fecha de la importacion------------------------------>

                                    <div class="content" style="display: none">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="row">
                                                    <label class="col-sm-2 label-on-left">Fecha</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group">
                                                            <input type="text" name="Fecha" id="Fecha" class="form-control datepicker" value="<?php echo date(m/d/Y)?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" >
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



                                    <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Observaciones</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <textarea class="form-control" required="true" name="Observaciones" id="Observaciones" > <?php echo $ieed?></textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="card-footer text-center">
                                    <button class="btn btn-primary hvr-float "  type="submit"  >
                                        <span style="font-size: 15px"><i class="icon-rocket">  </i></span>Guardar
                                    </button>
                                    <a href="ver_prestamo.php?l=cHJlc3RhZG9z"> <button class="btn btn-danger hvr-float "  type="button"  >
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
