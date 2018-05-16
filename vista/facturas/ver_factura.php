<?php

session_start();
if(isset($_SESSION['sesion'])){

    ?>

    <?php require("../theme/head.php");?>
<?php require("../theme/menuizquierdo.php");?>
<?php require_once('../../modelo/facturaclass.php');?>
<script>
    window.onload=function() {
        var element = document.getElementById("verfactura");
        element.classList.add("active");
    }
</script>



        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">

                <div class="navbar-header">

                    <a class="navbar-brand" href="#"> Lista de Facturas </a>
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
                                            var mensaje = "La factura se a editado exitosamente";
                                            demo.showSwal('success-message',mensaje)
                                            var color = 2;
                                            //demo.showNotification('top','center',mensaje,color);
                                        }
                                    </script>

                                <?php }else {?>

                                    <script>
                                        window.onload=function() {
                                            var mensaje = "La factura no se a editado por favor intente de nuevo";
                                            demo.showSwal('error-message',mensaje)
                                            var color = 2;
                                            //demo.showNotification('top','center',mensaje,color);
                                        }
                                    </script>

                                <?php } ?>
                            <?php } ?>


                            <?php
                            $arrayfactura = facturaclass::getAll();
                            if (count($arrayfactura)>=1){
                                ?>
                                <div class="card-header card-header-icon" data-background-color="blue">
                                    <span style="font-size: 30px"><i class="icon-shopping-cart"></i></span>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"> Facturas </h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Numero</th>
                                                <th>Titular</th>
                                                <th>NIT</th>
                                                <th>Tipo</th>
                                                <th>Doc. Contable</th>
                                                <th>Fecha</th>
                                                <th>Ubicacion-Descripcion</th>
                                            </tr>
                                            </thead>

                                            <tbody>


                                            <?php
                                            foreach ($arrayfactura as $factura) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $factura->getNumero(); ?></td>
                                                    <td><?php echo $factura->getTitular(); ?></td>
                                                    <td><?php echo $factura->getNIT(); ?></td>
                                                    <td><?php echo $factura->getTipo(); ?></td>
                                                    <td><?php echo $factura->getContable(); ?></td>
                                                    <td><?php echo $factura->getFecha(); ?></td>
                                                    <td>
                                                        <button type="button"
                                                                onclick="demo.showSwal('basic','<?php echo $factura->getDescripcion(); ?>')"
                                                                rel="tooltip" title="Ver Descripcion"
                                                                class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                            <span style="font-size: 15px"><i class="icon-list-ul"></i></span>
                                                        </button>

                                                        <button type="button"
                                                                onclick="demo.showSwal('title-and-text','<?php echo $factura->getUbicacion(); ?>')"
                                                                rel="tooltip" title="Ver Ubicacion"
                                                                class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                            <span style="font-size: 15px"><i class="icon-location2"></i></span>
                                                        </button>

                                                        <button type="button" rel="tooltip" title="Editar "
                                                                class="btn btn-warning btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                            <a href="../../Controlador/facturacontroller.php?action=editar&id=<?php echo $factura->getIdFactura(); ?>">
                                                                <span style="font-size: 15px"><i class="icon-pencil2"></i></span></a>
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
                                    <i class="material-icons">priority_high</i>
                                </div>
                                <div class="card-content"  >
                                    <h4 class="card-title"></h4>
                                    <div class="card-content col-md-6">
                                        <div class="alert alert-primary" >
                                            <span >No se han encontrado impotaciones  </span>
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


<?php require("../theme/pie.php");?>
    <?php
}
else{

    header('Location: ../index/index.php');

} ?>
