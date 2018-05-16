<?php

session_start();
if(isset($_SESSION['sesion'])){

    ?>

    <?php require("../theme/head.php");?>
<?php require("../theme/menuizquierdo.php");?>
    <?php require_once('../../modelo/prestamosclass.php');?>

<?php
$p=base64_decode($_GET["l"]);
if ($p=="prestados"){
    // si son todos los documentos que estan prestados
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

                        <a class="navbar-brand" href="#"> Lista de Documentacion prestada </a>
                    </div>

                </div>
            </nav>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">


                                <?php if(!empty($_GET['respuesta'])){ ?>
                                    <?php if ($_GET['respuesta'] == "correcto"){ ?>

                                        <script>
                                            window.onload=function() {
                                                var mensaje = "El documento a cambiado de estado exitosamente";
                                                demo.showSwal('success-message',mensaje)
                                                var color = 2;
                                                //demo.showNotification('top','center',mensaje,color);
                                            }
                                        </script>

                                    <?php }else {?>

                                        <script>
                                            window.onload=function() {
                                                var mensaje = "El documento no se a podido devolver por favor intente de nuevo";
                                                demo.showSwal('error-message',mensaje)
                                                var color = 2;
                                                //demo.showNotification('top','center',mensaje,color);
                                            }
                                        </script>

                                    <?php } ?>
                                <?php } ?>

                                <?php
                                $arrayfactura = prestamosclass::getPrestados();
                                if (count($arrayfactura)>=1){
                                    ?>
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
                                                    <th>Documento</th>
                                                    <th>Prestado a</th>
                                                    <th>Fecha de envio</th>
                                                    <th>Acciones</th>
                                                </tr>
                                                </thead>
                                                <tfoot>

                                                </tfoot>
                                                <tbody>


                                                <?php
                                                foreach ($arrayfactura as $factura) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $factura->getDocumento(); ?></td>
                                                        <td><?php echo $factura->getDestinatario(); ?></td>
                                                        <td><?php echo $factura->getFechaEnvio(); ?></td>

                                                        <td>
                                                            <button type="button"
                                                                    onclick="demo.showSwal('basic','<?php echo $factura->getObservaciones(); ?>')"
                                                                    rel="tooltip" title="Ver Observaciones"
                                                                    class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                                <span style="font-size: 20px"><i class="icon-list-ul"></i></span>
                                                            </button>

                                                            <button type="button"
                                                                    onclick="demo.showSwal('title-and-text','<?php echo $factura->getUbicacion(); ?>')"
                                                                    rel="tooltip" title="Ver Ubicacion"
                                                                    class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                                <span style="font-size: 20px"><i class="icon-location2"></i></span>
                                                            </button>

                                                            <button type="button" rel="tooltip" title="Crear Devolucion"
                                                                    class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                                <a href="../../Controlador/prestamoscontroller.php?action=editar&id=<?php echo $factura->getIdPrestamo(); ?>"><i
                                                                    <span style="font-size: 20px"><i class="icon-download2"></i></span>
                                                            </button>

                                                        </td>

                                                    </tr>

                                                    <?php
                                                }?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php }
                                else{ ?>

                                    <div class="card-header card-header-icon" data-background-color="blue">
                                       <span style="font-size: 30px"><i class="icon-info"></i></span>
                                    </div>
                                    <div class="card-content"  >
                                        <h4 class="card-title"></h4>
                                        <div class="card-content col-md-6">
                                            <div class="alert alert-primary" >
                                                <span > En el momento no se encuentran documentos en estado de prestamo </span>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>

                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>
            </div>


    <?php
    // -----------------------------------------------------------------------------------------------------------------
} else
    // si son todos los prestamos
    {?>

     <script>
        window.onload=function() {
            var element = document.getElementById("verprestamos");
            element.classList.add("active");
        }
    </script>


            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">

                    <div class="navbar-header">

                        <a class="navbar-brand" href="#"> Documentacion prestada </a>
                    </div>

                </div>
            </nav>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <?php if(!empty($_GET['respuesta'])){ ?>
                                    <?php if ($_GET['respuesta'] == "correcto"){ ?>

                                        <script>
                                            var element = document.getElementById("verfactura");
                                            element.classList.add("active");
                                            window.onload=function() {
                                                var mensaje = "El documento a cambiado de estado exitosamente";
                                                demo.showSwal('success-message',mensaje)
                                                var color = 2;
                                                //demo.showNotification('top','center',mensaje,color);
                                            }
                                        </script>

                                    <?php }else {?>

                                        <script>
                                            window.onload=function() {
                                                var mensaje = "La Factura no se a podido editar intente nuevamente";
                                                var color = 4;
                                                demo.showNotification('top','center',mensaje,color);
                                            }
                                        </script>

                                    <?php } ?>
                                <?php } ?>
                                <?php
                                $arrayfactura = prestamosclass::getAll();
                                if (count($arrayfactura)>=1){
                                    ?>
                                    <div class="card-header card-header-icon" data-background-color="blue">
                                        <span style="font-size: 30px"><i class="icon-inbox"></i></span>

                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">Documentacion Devuelta</h4>
                                        <div class="toolbar">
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        </div>
                                        <div class="material-datatables">
                                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                                   cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Documento</th>
                                                    <th>Solicitante</th>
                                                    <th>Destinatario</th>
                                                    <th>Fecha envio</th>
                                                    <th>Ubicacion-Observaciones</th>
                                                </tr>
                                                </thead>
                                              
                                                <tbody>


                                                <?php
                                                foreach ($arrayfactura as $factura) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $factura->getDocumento(); ?></td>
                                                        <td><?php echo $factura->getSolicitante(); ?></td>
                                                        <td><?php echo $factura->getDestinatario(); ?></td>
                                                        <td><?php echo $factura->getFechaEnvio(); ?></td>
                                                        <td>
                                                            <button type="button"
                                                                    onclick="demo.showSwal('basic','<?php echo $factura->getObservaciones(); ?>')"
                                                                    rel="tooltip" title="Ver Observaciones"
                                                                    class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                                <span style="font-size: 20px"><i class="icon-search-plus"></i></span>

                                                            </button>

                                                            <button type="button"
                                                                    onclick="demo.showSwal('title-and-text','<?php echo $factura->getUbicacion(); ?>')"
                                                                    rel="tooltip" title="Ver Ubicacion"
                                                                    class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                                <span style="font-size: 20px"><i class="icon-location2"></i></span>
                                                            </button>

                                                            <button type="button" rel="tooltip" title="Ver prestamo"
                                                                    class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out "
                                                                    onclick="showCustomer(<?php echo $factura->getIdPrestamo(); ?>)">
                                                                <span style="font-size: 20px"><i class="icon-eye"></i></span>

                                                            </button>

                                                        </td>

                                                    </tr>

                                                    <?php
                                                }?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
    <script>

            function showCustomer(str) {

                var xhttp;
                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        swal({
                            title: "Informacion del Prestamo",
                            text:this.responseText ,
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-primary"
                        });

                    }
                };
                xhttp.open("GET", "../../Controlador/prestamoscontroller.php?action=saludo&q="+str, true);
                xhttp.setRequestHeader('Content-Type','text/html;charset=utf-8');
                xhttp.send();
            }


    </script>
                                <?php }
                                else{ ?>

                                    <div class="card-header card-header-icon" data-background-color="blue">
                                        <i class="material-icons">priority_high</i>
                                    </div>
                                    <div class="card-content"  >
                                        <h4 class="card-title"></h4>
                                        <div class="card-content col-md-6">
                                            <div class="alert alert-primary" >
                                                <span >No se han encontrado Documentos Devueltos  </span>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>

                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>
            </div>


    <?php
}

?>

<?php require("../theme/pie.php");?>
    <?php
}
else{

    header('Location: ../index/index.php');

} ?>
