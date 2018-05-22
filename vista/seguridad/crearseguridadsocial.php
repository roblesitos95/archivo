<?php require_once('../../modelo/areaclass.php'); ?>


<div class="card">


    <form id="TypeValidation" class="form-horizontal" method="post">

        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Informacion Basica</h4>
        </div>


        <div class="card-content">


            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

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

            <!---------------------- Tipo de documento ---------------------------------->

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Tipo Documento </label>
                        <input type="text" name="documento" id="documento" class="form-control " required/>
                    </div>
                </div>
            </div>

            <!------------------------- Numero Patronal --------------------->

            <div id="patronaldiv">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">N° patronal </label>
                            <input type="text" name="Numero" id="Numero" class="form-control " value=""/>
                        </div>
                    </div>
                </div>
            </div>


            <!--------------------------------- descripcioin de la importacion------------------------------>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Empresa Prestadora de Servicio</label>
                        <input type="text" name="empresadeservicio" id="empresadeservicio" class="form-control "
                               required="true"/>
                    </div>
                </div>
            </div>

            <!------------------------------------ Empresa laboral ----------------------------------------->
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Empresa laboral</label>
                        <input type="text" name="empresalaboral" id="empresalaboral" class="form-control "
                               required="true"/>
                    </div>
                </div>
            </div>

            <!---------------------------------- Trasferencia ---------------------------------------------->

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">trasferencia</label>
                        <?php echo areaclass::selectarea("Area", "Area", "form-control") ?>
                    </div>
                </div>
            </div>

            <!--------------------------------- fecha de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Ciudad</label>
                        <input type="text" name="Ciudad" id="Ciudad" class="form-control " required="true"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Descripcion</label>
                        <input type="text" class="form-control " required="true" id="Descripcion" name="Descripcion"/>
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
        var Fecha = $("#Fecha").val();
        var documento = $("#documento").val();
        var Numero = $("#Numero").val();
        var empresadeservicio = $("#empresadeservicio").val();
        var empresalaboral = $("#empresalaboral").val();
        var Area = $("#Area").val();
        var Ciudad = $("#Ciudad").val();
        var Descripcion = $("#Descripcion").val();

        var data = {
            "balda": balda,
            "Fecha": Fecha,
            "documento": documento,
            "Numero": Numero,
            "empresadeservicio": empresadeservicio,
            "empresalaboral": empresalaboral,
            "Area": Area,
            "Ciudad": Ciudad,
            "Descripcion": Descripcion,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=Seguridad_social",
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