<?php require_once('../../modelo/areaclass.php'); ?>


<div class="card">
    <form id="TypeValidation" class="form-horizontal"
          action="../../Controlador/archivo_controller.php?action=crear&table=contables" method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Documento contable</h4>
        </div>
        <div class="card-content">

            <!---------------------- Nombre de la carpeta ---------------------------------->

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Tipo de Documento</label>
                        <input class="form-control" type="text" name="Documento" id="Documento" required="true"/>
                    </div>
                </div>
            </div>

            <!--------------------------------- descripcioin de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Numero</label>
                        <input class="form-control" type="text" name="Numero" id="Numero" required="true"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Proveedor</label>
                        <input type="text" class="form-control" required="true" id="Proveedor" name="Proveedor"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">NIT</label>
                        <input type="text" class="form-control " required="true" name="NIT" id="NIT"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Factura N°</label>
                        <input type="text" class="form-control " required="true" name="Factura" id="Factura"/>
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
                        <label class="control-label">transferencia </label>
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
            <input type="hidden" id="am" value="<?php echo $_GET["balda"] ?>">
        </div>

        <div class="card-footer text-center">
            <a onclick="enviar()" class="btn btn-primary hvr-float">
                <i class="icon-save"> </i> enviar
            </a>
        </div>
    </form>
</div>

<script>
    function enviar() {
        var am = $("#am").val();
        var Documento = $("#Documento").val();
        var Numero = $("#Numero").val();
        var Proveedor = $("#Proveedor").val();
        var NIT = $("#NIT").val();
        var Factura = $("#Factura").val();
        var Fecha = $("#Fecha").val();
        var Area = $("#Area").val();
        var Descripcion = $("#Descripcion").val();

        var data = {
            "am": am,
            "Documento": Documento,
            "Numero": Numero,
            "Proveedor": Proveedor,
            "NIT": NIT,
            "Factura": Factura,
            "Fecha": Fecha,
            "Area": Area,
            "Descripcion": Descripcion,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=Doc_Contable",
            type: 'POST',
            dataType: "JSON",
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