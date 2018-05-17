<?php require_once('../../modelo/areaclass.php'); ?>
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

</style>

<div class="card">
    <form id="TypeValidation" class="form-horizontal" action="" method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Crear Historia laboral</h4>
        </div>

        <div class="card-content">

            <!---------------------- Nombre de la carpeta ---------------------------------->
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">N° de Documento</label>
                        <input class="form-control" type="text" name="Documento" id="Documento" required="true"/>
                    </div>
                </div>
            </div>

            <!--------------------------------- descripcioin de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Apellidos</label>
                        <input class="form-control" type="text" name="Apellidos" id="Apellidos" required="true"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombres</label>
                        <input type="text" class="form-control" required="true" id="Nombres" name="Nombres"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Estado</label>
                        <select class="form-control" name="Estado" id="Estado" required>
                            <option value="" disabled selected></option>
                            <option value="Activo">Activo</option>
                            <option value="Activo">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>


            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Numero</label>
                        <input type="number" class="form-control" required="true" id="Numero" name="Numero"/>
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
        var Documento = $("#Documento").val();
        var Apellidos = $("#Apellidos").val();
        var Nombres = $("#Nombres").val();
        var Estado = $("#Estado").val();
        var Numero = $("#Numero").val();
        var Area = $("#Area").val();
        var Descripcion = $("#Descripcion").val();


        var data = {
            "balda": balda,
            "Documento": Documento,
            "Apellidos": Apellidos,
            "Nombres": Nombres,
            "Estado": Estado,
            "Numero": Numero,
            "Area": Area,
            "Descripcion": Descripcion,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=HistLabo",
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
