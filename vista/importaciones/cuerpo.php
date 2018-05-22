<?php require_once('../../modelo/areaclass.php'); ?>


<div class="card">
    <form id="TypeValidation" class="form-horizontal"
          method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Importaciones</h4>
        </div>

        <div class="card-content">
            <div class="row">

                <!---------------------- NOmbre de la carpeta ---------------------------------->
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombre Carpeta</label>
                        <input class="form-control" type="text" name="Nombre" id="Nombre" required="true"/>
                    </div>
                </div>
            </div>

            <!--------------------------------- descripcioin de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Descripcion</label>
                        <textarea class="form-control" name="Descripcion" required="true" id="Descripcion"></textarea>
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
                        <label class="control-label">Trasferencia</label>
                        <?php echo areaclass::selectarea("area", "area", "form-control") ?>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Consecutivo de liquidacion</label>
                        <input type="text" class="form-control " required="true" name="liquidacion" id="liquidacion"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Consecutivo de pedido</label>
                        <input type="text" class="form-control " required="true" id="pedido" name="pedido"/>
                    </div>
                </div>
            </div>

            <input type="hidden" name="am" id="am" value="<?php echo $_GET["balda"] ?>">
            <!----------------------------- Ubicacion topografica de la importacion------------------------------>

            <div class="card-footer text-center">
                <a onclick="enviar()" class="btn btn-primary hvr-float">
                    <i class="icon-save"> </i> enviar
                </a>
            </div>
        </div>
    </form>
</div>


<script>
    function enviar() {
        var balda = $("#am").val();
        var Nombre = $("#Nombre").val();
        var Descripcion = $("#Descripcion").val();
        var Fecha = $("#Fecha").val();
        var area = $("#area").val();
        var liquidacion = $("#liquidacion").val();
        var pedido = $("#pedido").val();

        var data = {
            "balda": balda,
            "Nombre": Nombre,
            "Descripcion": Descripcion,
            "Fecha": Fecha,
            "area": area,
            "liquidacion": liquidacion,
            "pedido": pedido,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=Importacion",
            type: 'POST',
            dataType:"JSON",
            success: function (res) {
                alert("consecutivo numero " + res[0]);

                $("#div_chatarra").hide();
                $('#tipodoc').val("1");
                $('#myModal').modal('toggle');

                $("#datatable1").append(res[1]);

            }
        });
    }
</script>