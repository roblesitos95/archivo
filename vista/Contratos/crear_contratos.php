<?php require_once('../../modelo/areaclass.php'); ?>

<div class="card">
    <form id="TypeValidation" class="form-horizontal" action="../../Controlador/Contratoscontroller.php?action=crear"
          method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Contratos</h4>
        </div>
        <div class="card-content">
            <div class="row">
                <!---------------------- Nombre de la empresa  ---------------------------------->

                <div class="row">
                    <div class="col-sm-1"></div>

                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la Empresa</label>
                            <input type="text" name="Nombre" id="Nombre" class="form-control " required/>
                        </div>
                    </div>
                </div>

                <!---------------------- Numero de la empresa ---------------------------------->

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">N° de Contrato </label>
                            <input type="text" name="Numero" id="Numero" class="form-control" required value=""/>
                        </div>
                    </div>
                </div>

                <!--------------------------------- Nombre del representante legal ------------------------------>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del Contratista</label>
                            <input type="text" name="Contratista" id="Contratista" class="form-control"
                                   required="true"/>
                        </div>
                    </div>
                </div>

                <!--------------------------------- fecha del contrato ------------------------------>

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

                <!----------------------------- Area de Transferencia ------------------------------>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <?php echo areaclass::selectarea("Area", "Area", "form-control") ?>
                        </div>
                    </div>
                </div>

                <!----------------------------- Descripcion ------------------------------>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripcion</label>
                            <textarea class="form-control " required="true" id="Descripcion"
                                      name="Descripcion"></textarea>
                        </div>
                    </div>
                </div>


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
        var Fecha = $("#Fecha").val();
        var area = $("#area").val();
        var Documento = $("#Documento").val();
        var Numero = $("#Numero").val();
        var Placa = $("#Placa").val();
        var Clase = $("#Clase").val();
        var Descripcion = $("#Descripcion").val();

        var data = {
            "Fecha": Fecha,
            "area": area,
            "Documento": Documento,
            "Numero": Numero,
            "Placa": Placa,
            "Clase": Clase,
            "Descripcion": Descripcion,
        }
        /*
        $.ajax({
           data:data,
           url: "../../Controlador/documentocontroller.php?action=crear&table=desintregracion",
            type:'POST',
            success:function (res) {
               $("#div_chatarra").hide();
                $('#tipodoc').val("1");
           }
        });*/
    }
</script>
