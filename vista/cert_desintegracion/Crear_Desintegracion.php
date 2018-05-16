<?php require_once('../../modelo/areaclass.php'); ?>


<div class="card">
    <form id="TypeValidation" class="form-horizontal" method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">certificado de desintegracion </h4>
        </div>
        <div class="card-content ">

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

            <!------------- ---------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">transferencia </label>
                        <?php echo areaclass::selectarea("area", "area", "form-control") ?>
                    </div>
                </div>
            </div>

            <!---------------------- NOmbre de la carpeta ---------------------------------->

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Tipo de Documento</label>
                        <input class="form-control" type="text" name="Documento" id="Documento" required/>
                    </div>
                </div>
            </div>

            <!--------------------------------- descripcioin de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Numero</label>
                        <input class="form-control" type="text" name="Numero" id="Numero" required/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Placa</label>
                        <input type="text" class="form-control " required="true" id="Placa" name="Placa"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Clase</label>
                        <input type="text" class="form-control " required name="Clase" id="Clase"/>
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

            <div class="card-footer text-center">
                <a onclick="enviar()" class="btn btn-primary hvr-float">
                    <i class="icon-save"> </i> enviar
                </a>
            </div>
        </div>
    </form>
    <p id="respa"></p>
</div>


<script>
    function enviar() {
        var balda = $("#balda").val();

        var Fecha = $("#Fecha").val();
        var area = $("#area").val();
        var Documento = $("#Documento").val();
        var Numero = $("#Numero").val();
        var Placa = $("#Placa").val();
        var Clase = $("#Clase").val();
        var Descripcion = $("#Descripcion").val();

        var data = {
            "balda": balda,
            "Fecha": Fecha,
            "area": area,
            "Documento": Documento,
            "Numero": Numero,
            "Placa": Placa,
            "Clase": Clase,
            "Descripcion": Descripcion,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=Cert_Desintegracion",
            type: 'POST',
            success: function (res) {
                alert("consecutivo numero " + res);
                $("#div_chatarra").hide();
                $('#tipodoc').val("1");
            }
        });
    }
</script>