<?php require_once('../../modelo/areaclass.php'); ?>


<div class="card">

    <form id="TypeValidation" class="form-horizontal" method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Impuestos</h4>
        </div>

        <div class="card-content">

            <!---------------------- Nombre de la carpeta ---------------------------------->

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Documento</label>
                        <input class="form-control" type="text" name="documento" id="documento" required="true"/>
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
        var documento = $("#documento").val();
        var Fecha = $("#Fecha").val();
        var area = $("#Area").val();
        var Descripcion = $("#Descripcion").val();

        var data = {
            "balda": balda,
            "documento": documento,
            "Descripcion": Descripcion,
            "Fecha": Fecha,
            "area": area,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=Impuestos",
            type: 'POST',
            success: function (res) {
                alert("consecutivo numero " + res);
                $("#div_chatarra").hide();
                $('#tipodoc').val("1");
                $('#myModal').modal('toggle');

            }
        });
    }
</script>
