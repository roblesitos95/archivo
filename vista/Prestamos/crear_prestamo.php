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
                                                <input type="text" name="Fechaenvio" id="Fechaenvio" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date("Y-m-d"); ?> " />
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
                                                <option value="Doc_Contable">Documento contable</option>
                                                <option value="Escritura">Escrituras</option>
                                                <option value="Factura">Facturas</option>
                                                <option value="Historia_laboral">Historias Laborales</option>
                                                <option value="Importacion">Importaciones</option>
                                                <option value="Impuestos">Impuestos</option>
                                                <option value="Seguridad_Social">Seguridad Social</option>
                                                <option value="Informe_Entrada">Informes de Entrada</option>
                                                <option value="Libro_oficial">Libros Oficiales</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>


                                    <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                                    <div class="row" id="he" style="display: none">
                                        <label class="col-sm-2 label-on-left">Expediente</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating"  id="documento">

                                            </div>
                                        </div>
                                    </div>

                                    <!--------------------------------- fecha de la importacion------------------------------>


                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Soporte</label>
                                        <div class="col-sm-7">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <select class="form-control" id="estado" name="estado">
                                                    <option value="" selected disabled>Seleccione...</option>
                                                    <option value="toda">Expediente</option>
                                                    <option value="unidad">Folio</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


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

                                    <!----------------------------- Consecutivo de pedido de la importacion------------------------------>


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

    <script href=""></script>
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
                $("#he").show();
              $("#documento").append(respuesta);
                $('#carpeta').select2({
                    lenguage:'es',
                });
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
