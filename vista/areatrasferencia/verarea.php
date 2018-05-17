<?php

session_start();
if(isset($_SESSION['sesion'])){

    ?>


    <?php require("../theme/head.php");?>
<?php require("../theme/menuizquierdo.php");?>
<?php require_once('../../modelo/areaclass.php');?>

<script>
    window.onload=function() {
        var element = document.getElementById("verarea");
        element.classList.add("active");
    }
</script>


        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">

                <div class="navbar-header">

                    <a class="navbar-brand" href="#"> Transferencias </a>
                </div>

            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">


                            <?php
                            $arrimportacion = areaclass::getAll();
                            if (count($arrimportacion)>=1){
                                ?>
                                <div class="card-header card-header-icon" data-background-color="blue">
                                    <span style="font-size: 30px"><i class="icon-suitcase"></i></span>
                                </div>
                                <div class="card-content">
                                <h4 class="card-title">Transferencias</h4>
                                <div class="toolbar">
                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                </div>
                                <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                       cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sede</th>
                                    <th>Area</th>
                                    <th>Consecutivo</th>
                                    <th>Archivo</th>
                                    <th>Mas</th>
                                </tr>
                                </thead>

                                <tbody>

                 <?php
                                foreach ($arrimportacion as $ipmort) {
                                    ?>

                                    <tr>
                                        <td><?php echo $ipmort->getSede();?></td>
                                        <td><?php echo $ipmort->getArea();?></td>
                                        <td><?php echo $ipmort->getConsecutivo();?></td>
                                        <td>  <button type="button" rel="tooltip" class="btn btn-warning btn-simple btn-xs hvr-bounce-in hvr-radial-out">
                                                <a href="<?php echo $ipmort->getArchivo();?>" target="_blank">
                                                    <span style="font-size: 15px"><i class="icon-file-pdf"></i></span>
                                            </button>
                                        </td>
                                        <td>
                                            <?php
                                            if ($ipmort->getEstado()== "Activo"){?>
                                                <button type="button" rel="tooltip" title="Inactivar"
                                                    class="btn btn-warning btn-simple btn-xs hvr-bounce-in hvr-radial-out   ">
                                                <a href="../../Controlador/areacontroller.php?action=inactivo&id=<?php echo $ipmort->getIdTrasferencia();?>">
                                                    <span style="font-size: 15px"><i class="icon-eye-slash"></i></span></a>
                                                </button>
                                            <?php } elseif ($ipmort->getEstado()=="Inactivo"){?>
                                                <button type="button" rel="tooltip" title="Activar"
                                                    class="btn btn-warning btn-simple btn-xs hvr-bounce-in hvr-radial-out   ">
                                                <a href="../../Controlador/areacontroller.php?action=activo&id=<?php echo $ipmort->getIdTrasferencia();?>">
                                                    <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                            </button>
                                            <?php }?>

                                        </td>
                                    </tr>

                                    <?php
                                }?>

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
                                            <span >No se han encontrado Transferencia  </span>
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

    header('Location: ../index/index');

} ?>
