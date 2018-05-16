<?php require_once('../../modelo/areaclass.php'); ?>


<div class="card">
    <form id="TypeValidation" class="form-horizontal" action="../../Controlador/Escrituracontroller.php?action=crear"
          method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Crear Escritura</h4>
        </div>

        <div class="card-content">

            <!---------------------- Nombre de la carpeta ---------------------------------->
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Numero</label>
                        <input class="form-control" type="text" name="Numero" id="Numero" required="true"/>
                    </div>
                </div>
            </div>

            <!--------------------------------- descripcioin de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Notaria</label>
                        <input class="form-control" type="text" name="Notaria" id="Notaria" required="true"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">De</label>
                        <input type="text" class="form-control" required="true" id="De" name="De"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">A</label>
                        <input type="text" class="form-control " required="A" name="A" id="A"/>
                    </div>
                </div>
            </div>

            <!--------------------------------- fecha de la importacion------------------------------>


            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group">
                        <label class="control-label">Fecha</label>
                        <input type="text" name="Fecha" id="Fecha" class="form-control" data-provide="datepicker"
                               data-date-format="yyyy-mm-dd" value="<?php echo date("Y-m-d"); ?> "/>
                    </div>
                </div>
            </div>


            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">A</label>
                        <?php echo areaclass::selectarea("Area", "Area", "form-control") ?>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Descripcion</label>
                        <textarea class="form-control " required="true" id="Descripcion" name="Descripcion"></textarea>
                    </div>
                </div>
            </div>

            <!----------------------------- Ubicacion topografica de la importacion------------------------------>

        </div>

        <div class="card-footer text-center">
            <button class="btn btn-primary hvr-float " type="submit">
                <span style="font-size: 15px"><i class="icon-rocket ">  </i></span>Guardar
            </button>
            <a href="">
                <button class="btn btn-danger hvr-float " type="button">
                    <span style="font-size: 15px"><i class="icon-refresh"> </i></span> Cancelar
                </button>
            </a>
        </div>

    </form>
</div>
