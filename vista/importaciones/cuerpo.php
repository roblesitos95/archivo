<?php require_once('../../modelo/areaclass.php');?>


    <div class="card">
        <form id="TypeValidation" class="form-horizontal" action="../../Controlador/imporacioncontroller.php?action=crear" method="post">
            <div class="card-header card-header-text" data-background-color="blue">
                <h4 class="card-title">Importaciones</h4>
            </div>

            <div class="card-content">
                <div class="row">

                    <!---------------------- NOmbre de la carpeta ---------------------------------->

                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre Carpeta</label>
                            <input class="form-control" type="text" name="Nombre" id="Nombre" required="true" />
                        </div>
                    </div>
                </div>

                <!--------------------------------- descripcioin de la importacion------------------------------>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Productos</label>
                            <textarea class="form-control" name="Productos" required="true" id="Productos" ></textarea>
                        </div>
                    </div>
                </div>

                <!--------------------------------- fecha de la importacion------------------------------>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="control-label">Fecha</label>
                                        <input type="text" name="Fecha" id="Fecha" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date("Y-m-d"); ?> " />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <?php echo areaclass::selectarea("area","area","form-control")  ?>
                        </div>
                    </div>
                </div>

                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Consecutivo de liquidacion</label>
                            <input type="text" class="form-control " required="true" name="liquidacion" id="liquidacion" />
                        </div>
                    </div>
                </div>

                <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Consecutivo de pedido</label>
                            <input type="text" class="form-control " required="true" id="pedido" name="pedido"  />
                        </div>
                    </div>
                </div>

                <!----------------------------- Ubicacion topografica de la importacion------------------------------>

            </div>

            <div class="card-footer text-center">
                <button class="btn btn-primary hvr-float "  type="submit"  >
                    <span style="font-size: 15px"><i class="icon-rocket">  </i></span>Guardar
                </button>
                <a href=""> <button class="btn btn-danger hvr-float "  type="reset"  >
                        <span style="font-size: 15px"><i class="icon-refresh">  </i></span> Cancelar
                    </button></a>
            </div>
        </form>
    </div>
