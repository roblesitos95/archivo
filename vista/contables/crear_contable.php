<?php require_once('../../modelo/areaclass.php'); ?>

<?php
$btn = "";
switch ($_GET["btn"]) {

    case "editar":
        $btn = '
          <div class="card-footer text-center">
            <div id="btneditar" style="display: none"> 
                <a onclick="Editar()" class="btn btn-primary hvr-float">
                  <i class="icon-pencil2"> </i> Editar
                </a>
            </div>
                <button class="btn btn-danger hvr-float " id="btnclose" type="button">
                    <span style="font-size: 15px"><i class="icon-window-close-o">  </i></span>Cerrar
                </button>
          </div>';
        break;
    case "Guardar":
        $btn = '<div class="card-footer text-center">
                <a onclick="enviar()" class="btn btn-primary hvr-float">
                    <i class="icon-save"> </i> enviar
                </a>
               </div>';
        break;
}
if (isset($_GET["archivo"])) {
    $diasbled = "disabled";

    //iniciamos la conexion
    $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
    if (!$con) {
        die('Error no se pudo conectar : ' . mysqli_error($con));
    }
    mysqli_select_db($con, "ajax_demo");

    //creamos y ejecutamos la query
    $sql = "SELECT  archivos.id_Archivos, archivos.Documento , archivos.fecha, archivos.Numero, archivos.factura, Archivos.Contratista, Archivos.NIT, Archivos.Trasferencia, Archivos.Descripcion
 FROM archivos where id_Archivos=" . $_GET["archivo"];
    $con->set_charset("utf8");
    $result = mysqli_query($con, $sql);

    //recorremos el result de la query
    while ($row = mysqli_fetch_array($result)) {
        //Obtenemos la maxima fil en la sala

        $id = $row["id_Archivos"];
        $documento = $row["Documento"];
        $Numero = $row["Numero"];
        $proveedor = $row["Contratista"];
        $NIT = $row["NIT"];
        $factura = $row["factura"];
        $fecha = $row["fecha"];
        $trasferencia = $row["Trasferencia"];
        $descrpcion = $row["Descripcion"];
    }
}
?>


<div class="card">
    <form id="TypeValidation" class="form-horizontal" method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Documento contable</h4>
        </div>
        <div class="card-content">
            <?php if ($_GET["btn"] == "editar") { ?>
                <div class="togglebutton">
                    <label>
                        <input id="checkbox" type="checkbox"> Editar
                    </label>
                </div>
                <br>
            <?php } ?>
            <!---------------------- Nombre de la carpeta ---------------------------------->

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Tipo de Documento</label>
                        <input class="form-control" type="text" name="Documento_contable" id="Documento_contable"
                               required <?php if (isset($documento)) {
                            echo "value='" . $documento . "'";
                        }
                        if (isset($diasbled)) {
                            echo $diasbled;
                        } ?> />
                    </div>
                </div>
            </div>

            <!--------------------------------- descripcioin de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Numero</label>
                        <input class="form-control" type="text" name="Numero_contable" id="Numero_contable"
                               required="true" <?php if (isset($Numero)) {
                            echo "value='" . $Numero . "'";
                        }
                        if (isset($diasbled)) {
                            echo $diasbled;
                        } ?> />
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Proveedor</label>
                        <input type="text" class="form-control" required="true" id="Proveedor_contable"
                               name="Proveedor" <?php if (isset($proveedor)) {
                            echo "value='" . $proveedor . "'";
                        }
                        if (isset($diasbled)) {
                            echo $diasbled;
                        } ?> />
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">NIT</label>
                        <input type="text" class="form-control " required  name="NIT_contable"
                               id="NIT_contable" <?php if (isset($NIT)) {
                            echo "value='" . $NIT . "'";
                        }
                        if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Factura N°</label>
                        <input type="text" class="form-control " required name="Factura_contable"
                               id="Factura_contable" <?php if (isset($factura)) {
                            echo "value='" . $factura . "'";
                        }
                        if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>/>
                    </div>
                </div>
            </div>

            <!--------------------------------- fecha de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group">
                        <label class="control-label">Fecha</label>
                        <input type="text" name="Fecha_contable" id="Fecha_contable" class="form-control" data-provide="datepicker"
                               data-date-format="yyyy-mm-dd" value="<?php if (isset($fecha)) {
                            echo $fecha;
                        } else {
                            echo date("Y-m-d");
                        } ?> " <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">transferencia </label>
                        <?php if (isset($trasferencia)) {
                            echo areaclass::selectedarea("area_contable", "area_contable", "form-control", $trasferencia);
                        } else {
                            echo areaclass::selectarea("area_contable", "area_contable", "form-control");
                        } ?>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Descripcion</label>
                        <textarea class="form-control " required id="Descripcion_contable" name="Descripcion_contable"
                            <?php if (isset($diasbled)) {
                                echo $diasbled;
                            }
                            ?>><?php if (isset($descrpcion)) {
                                echo $descrpcion;
                            } ?></textarea>
                    </div>
                </div>
            </div>

            <!----------------------------- Ubicacion topografica de la importacion------------------------------>
            <?php if (isset($id)){ ?>
                <input type="hidden" name="id" id="id" value="<?php echo $id?>">

            <?php }else{ ?>
                <input type="hidden" name="am" id="am" value="<?php echo $_GET["balda"] ?>">
                <?php
            }?>
        </div>

        <div class="card-footer text-center">
            <?php echo $btn ?>
        </div>
    </form>
</div>

<script>
    function enviar() {
        var am = $("#am").val();
        var Documento = $("#Documento_contable").val();
        var Numero = $("#Numero_contable").val();
        var Proveedor = $("#Proveedor_contable").val();
        var NIT = $("#NIT_contable").val();
        var Factura = $("#Factura_contable").val();
        var Fecha = $("#Fecha_contable").val();
        var Area = $("#area_contable").val();
        var Descripcion = $("#Descripcion_contable").val();

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

    $("#btnclose").click(function () {
        $("#modalform").modal("toggle");
    });

    <?php if ($_GET["btn"]=="editar"){?>


    function on() {
        $("#btneditar").show();
        $("#Fecha_contable").prop('disabled', false);
        $("#area_contable").prop('disabled', false);
        $("#Documento_contable").prop('disabled', false);
        $("#Numero_contable").prop('disabled', false);
        $("#Proveedor_contable").prop('disabled', false);
        $("#NIT_contable").prop('disabled', false);
        $("#Factura_contable").prop('disabled', false);
        $("#Descripcion_contable").prop('disabled', false);

    }

    function off() {
        $("#btneditar").hide();
        $("#Fecha_contable").prop('disabled', true);
        $("#area_contable").prop('disabled', true);
        $("#Documento_contable").prop('disabled', true);
        $("#Numero_contable").prop('disabled', true);
        $("#Proveedor_contable").prop('disabled', true);
        $("#NIT_contable").prop('disabled', true);
        $("#Factura_contable").prop('disabled', true);
        $("#Descripcion_contable").prop('disabled', true);
    }

    var checkbox = document.getElementById('checkbox');

    checkbox.addEventListener("change", comprueba, false);

    function comprueba() {
        if (checkbox.checked) {
            on();
        } else {
            off();
        }
    }

    <?php  }?>


    function Editar() {
        var am = $("#id").val();
        var Documento = $("#Documento_contable").val();
        var Numero = $("#Numero_contable").val();
        var Proveedor = $("#Proveedor_contable").val();
        var NIT = $("#NIT_contable").val();
        var Factura = $("#Factura_contable").val();
        var Fecha = $("#Fecha_contable").val();
        var Area = $("#area_contable").val();
        var Descripcion = $("#Descripcion_contable").val();

        var data = {
            "id": am,
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
            url: "../../Controlador/documentocontroller.php?action=editar&table=Doc_Contable",
            type: 'POST',
            success: function (res) {
                alert(res);
                $('#modalform').modal('toggle');
                location.reload();

            }
        });
    }
</script>