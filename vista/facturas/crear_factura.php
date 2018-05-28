<?php require_once('../../modelo/areaclass.php'); ?>

<script>
    function text() {
        var x = document.getElementById("Tipo").value;

        if (x == "Otros") {
            $("#texttipo").hide();
            $("#texttipo2").show();
            $("#tipo2").focus();

        }
    }

</script>

<div class="card">
    <form id="TypeValidation" class="form-horizontal" action="../../Controlador/facturacontroller.php?action=crear"
          method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Facturas</h4>
        </div>

        <div class="card-content">

            <!---------------------- Nombre de la carpeta ---------------------------------->

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">

                    <div class="form-group label-floating">
                        <label class="control-label">Numero de Factura</label>
                        <input class="form-control" type="text" name="Numero" id="Numero" required="true"/>
                    </div>
                </div>
            </div>

            <!--------------------------------- descripcioin de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Titular</label>
                        <input class="form-control" type="text" name="Titular" id="Titular" required="true"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>


            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">NIT</label>
                        <input type="text" class="form-control" required="true" id="NIT" name="NIT"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row" id="texttipo">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Tipo de factura</label>
                        <select class="form-control" required="true" name="Tipo" id="Tipo" onchange="text()">
                            <option value=""></option>
                            <option value="Compra">Compra</option>
                            <option value="Servicio">Servicio</option>
                            <option value="Venta">Venta</option>
                            <option value="Chatarra">Chatarra</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row" id="texttipo2" style="display: none">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Tipo de factura</label>
                        <input type="text" class="form-control" required name="tipo2" id="tipo2"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Documento Contable</label>
                        <input type="text" class="form-control " required="true" name="Contable" id="Contable"/>
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
        var Numero = $("#Numero").val();
        var Titular = $("#Titular").val();
        var NIT = $("#NIT").val();
        var Tipo = $("#Tipo").val();
        var Tipo2 = $("#tipo2").val();
        var Contable = $("#Contable").val();
        var Fecha = $("#Fecha").val();
        var area = $("#Area").val();
        var Descripcion = $("#Descripcion").val();

        var data = {
            "balda": balda,
            "Numero": Numero,
            "Titular": Titular,
            "NIT": NIT,
            "Tipo": Tipo,
            "Tipo2": Tipo2,
            "Contable": Contable,
            "Fecha": Fecha,
            "area": area,
            "Descripcion": Descripcion,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=Factura",
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