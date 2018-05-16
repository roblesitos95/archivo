<?php

session_start();
if(isset($_SESSION['sesion'])){

    ?>

    <?php require("../theme/head.php");?>

<?php require("../theme/menuizquierdo.php");?>

<?php require_once('../../modelo/areaclass.php');?>


<script>
    window.onload=function() {
        var element = document.getElementById("crearprestamos");
        element.classList.add("active");
    }
</script>

<?php if(!empty($_GET['respuesta'])){ ?>
    <?php if ($_GET['respuesta'] == "correcto"){ ?>

        <script>
            window.onload=function() {
                var mensaje = "El Prestamo se a Guardado exitosamente";
                demo.showSwal('success-message',mensaje);
            }
        </script>

    <?php }else {?>

        <script>
            window.onload=function() {
                var mensaje = "El Prestamo no se a guardado por favor intente de nuevo";
                demo.showSwal('error-message',mensaje);
            }
        </script>

    <?php } ?>
<?php } ?>



        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">

                <div class="navbar-header">

                    <a class="navbar-brand" href="#"> Crear Prestamo</a>
                </div>

            </div>
        </nav>

        <div class="content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">
                        <div class="card">

                            <form id="TypeValidation" class="form-horizontal" action="../../Controlador/prestamoscontroller.php?action=crear" method="post">
                                <div class="card-header card-header-text" data-background-color="blue">
                                    <h4 class="card-title">Informacion Basica</h4>
                                </div>
                                <div class="card-content">
                                    <div class="row">

                                        <!---------------------- Nombre de la carpeta ---------------------------------->
                                        <label class="col-sm-2 label-on-left">Nombre del Solicitante</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input class="form-control" type="text" name="Solicitante" id="Solicitante" required="true" />
                                            </div>
                                        </div>
                                    </div>

                                    <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Fecha de envio</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input type="text" name="Fecha" id="Fecha" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date("Y-m-d"); ?> " />
                                            </div>
                                        </div>
                                    </div>


                                    <!--------------------------------- descripcioin de la importacion------------------------------>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Serie</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                            <select class="form-control" required onchange="select()" id="tipo">
                                                <option selected disabled value="" >Seleccione...</option>
                                                <option value="Cert_Desintegracion">Certificado de desintegracion</option>
                                                <option value="Contratos">Contratos</option>
                                                <option value="Documento_Contable">Documento contable</option>
                                                <option value="Escrituras">Escrituras</option>
                                                <option value="Facturas">Facturas</option>
                                                <option value="Historias_Laborales">Historias Laborales</option>
                                                <option value="Importaciones">Importaciones</option>
                                                <option value="Impuestos">Impuestos</option>
                                                <option value="Seguridad_Social">Seguridad Social</option>
                                                <option value="Informes_de_Entrada">Informes de Entrada</option>
                                                <option value="Libros_Oficiales">Libros Oficiales</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>


                                    <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Transferencia</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating"  id="documento">
                                                <label class="control-label"></label>

                                                <select class="form-control" required onchange="select()" id="tipo">
                                                    <option selected disabled value="" >Seleccione...</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!--------------------------------- fecha de la importacion------------------------------>



                                    <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Destinatario</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" required name="Destinatario" id="Destinatario" >
                                            </div>
                                        </div>
                                    </div>
                                    <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">N° Guia</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" required  name="N_Guia" id="N_Guia" >
                                            </div>
                                        </div>
                                    </div>
                                    <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Observaciones</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <textarea class="form-control" required="true" name="Observaciones" id="Observaciones" > </textarea>
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
                                                        <input type="text" class="form-control" placeholder="Sala" name="Sala" id="Sala" >
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" name="Fila" id="Fila" class="form-control" placeholder="Fila">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="Cara" id="Cara" placeholder="Cara">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" placeholder="Estante" name="Estante" id="Estante">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" placeholder="Balda" name="Balda" id="Balda">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" placeholder="Archivo modular" name="Arcivo_Modular" id="Arcivo_Modular">
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
                                    <a href="ver_prestamo.php"> <button class="btn btn-danger hvr-float "  type="button"  >
                                            <span style="font-size: 15px"><i class="icon-ban">  </i></span>Cancelar
                                        </button></a>
                                </div>
                            </form>
                            <!-- end card -->
                        </div>
                        <!-- end colm_12-->
                    </div>
                    <!-- end row-->
                </div>
                <!-- end container-->
            </div>
<a href=""></a>
            </div>

<script>
    function select(){
        document.getElementById("documento").innerHTML="";
        var tipo = $("#tipo").val();
        var data={
         "tipo":tipo,
        }
        $.ajax({
            data:data,
            url:"../../Controlador/prestamoscontroller.php?action=select",
            type:"POST",
            dataType:"JSON",
            success:function (respuesta) {
              $("#documento").append(respuesta);
            }
        });
    }

</script>


<?php require("../theme/pie.php");?>
    <?php
}
else{

    header('Location: ../index/index.php');

} ?>
