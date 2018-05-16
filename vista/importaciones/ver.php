<?php

session_start();
if(isset($_SESSION['sesion'])){

    ?>

    <?php require("../theme/head.php");?>
<?php require("../theme/menuizquierdo.php");?>
<?php require_once('../../modelo/impotacionesclass.php');?>
<script>
    window.onload=function() {
        var element = document.getElementById("verimport");
        element.classList.add("active");
    }
</script>

            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                   
                    <div class="navbar-header">
                     
                        <a class="navbar-brand" href="#"> Lista de Importaciones </a>
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
                                                var mensaje = "La importacion se a editado exitosamente";
                                                demo.showSwal('success-message',mensaje)
                                                var color = 2;
                                                //demo.showNotification('top','center',mensaje,color);
                                            }
                                        </script>

                                    <?php }else {?>

                                        <script>
                                            window.onload=function() {
                                                var mensaje = "la importacion no se a editado por favor intente de nuevo";
                                                demo.showSwal('error-message',mensaje)
                                                var color = 2;
                                                //demo.showNotification('top','center',mensaje,color);
                                            }
                                        </script>

                                    <?php } ?>
                                <?php } ?>

                                <?php
                                                $arrimportacion = impotacionesclass::getAll();
                                                if (count($arrimportacion)>=1){
                                         ?>
                                                    <div class="card-header card-header-icon" data-background-color="blue">
                                                        <span style="font-size: 30px"><i class="icon-coin-dollar"></i></span>
                                                    </div>
                                                    <div class="card-content">
                                                    <h4 class="card-title">Importaciones </h4>
                                                    <div class="toolbar">
                                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                    </div>
                                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Fecha</th>
                                                <th>Descripcion</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                                    <tbody>


                                            <?php
                                            foreach ($arrimportacion as $ipmort) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $ipmort->getNombre(); ?></td>
                                                    <td><?php echo $ipmort->getFechaDocumento(); ?></td>
                                                    <td><?php echo $ipmort->getProductos(); ?></td>
                                                    <td>
                                                        <button type="button"
                                                                onclick="demo.showSwal('basic2','<?php echo $ipmort->getPedido()."/".$ipmort->getLiquidacion(); ?>')"
                                                                rel="tooltip" title="Ver Consecutivos"
                                                                class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                            <span style="font-size: 15px"><i class="icon-list-ol"></i></span>
                                                        </button>
                                                        <button type="button"
                                                                onclick="demo.showSwal('title-and-text','<?php echo $ipmort->getUbicacion(); ?>')"
                                                                rel="tooltip" title="Ver Ubicacion"
                                                                class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                            <span style="font-size: 15px"><i class="icon-location2"></i></span>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Editar"
                                                                class="btn btn-warning btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                            <a href="../../Controlador/imporacioncontroller.php?action=editar&id=<?php echo $ipmort->getIdcarpeta(); ?>">
                                                                <span style="font-size: 15px"><i class="icon-pencil2"></i></span></a>
                                                        </button>
                                                    </td>

                                                </tr>


                                                <?php
                                            }
                                            ?>
                                                    </tbody>
                                        </table>
                                                    </div>
                                                    </div>
                                            <?php
                                            }
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