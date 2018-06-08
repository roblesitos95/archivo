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
    $sql = "SELECT  archivos.id_Archivos, archivos.Documento , archivos.Apellidos, archivos.Nombres, archivos.Tipo, Archivos.Numero, Archivos.Trasferencia, Archivos.Descripcion
 FROM archivos where id_Archivos=" . $_GET["archivo"];
    $con->set_charset("utf8");
    $result = mysqli_query($con, $sql);

    //recorremos el result de la query
    while ($row = mysqli_fetch_array($result)) {
        //Obtenemos la maxima fil en la sala

        $id = $row["id_Archivos"];
        $Documento = $row["Documento"];
        $Apellidos = $row["Apellidos"];
        $Nombres = $row["Nombres"];
        $Tipo = $row["Tipo"];
        $Numero = $row["Numero"];
        $trasferencia = $row["Trasferencia"];
        $descrpcion = $row["Descripcion"];
    }
}
?>
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
            <h4 class="card-title">Historia laboral</h4>
        </div>

        <div class="card-content">

            <?php if ($_GET["btn"] == "editar") { ?>
                <div class="togglebutton">
                    <label>
                        <input id="checkbox" type="checkbox" onselect="lol()"> Editar
                    </label>
                </div>
                <br>
            <?php } ?>
            <!---------------------- Nombre de la carpeta ---------------------------------->
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">N° de Documento</label>
                        <input class="form-control" type="text" name="Documento_hhll" id="Documento_hhll"
                               required <?php if (isset($Documento)) {
                            echo "value='" . $Documento . "'";
                        }
                        ?> <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>/>
                    </div>
                </div>
            </div>

            <!--------------------------------- descripcioin de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Apellidos</label>
                        <input class="form-control" type="text" name="Apellidos_hhll" id="Apellidos_hhll"
                               required <?php if (isset($Apellidos)) {
                            echo "value='" . $Apellidos . "'";
                        }
                        ?> <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class=" row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombres</label>
                        <input type="text" class="form-control" required id="Nombres_hhll"
                               name="Nombres_hhll" <?php if (isset($Nombres)) {
                            echo "value='" . $Nombres . "'";
                        }
                        ?> <?php if (isset($diasbled)) {
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
                        <label class="control-label">Estado</label>
                        <select class="form-control" name="Estado_hhll" id="Estado_hhll" required  <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>>
                            <option value="" disabled selected></option>
                            <option value="activo"<?php if (isset($Tipo)) {if ($Tipo=="activo"){echo "selected" ;}} ?>>Activo</option>
                            <option value="inactivo"<?php  if (isset($Tipo)) {if ($Tipo=="inactivo"){echo "selected" ;}} ?>>Inactivo</option>
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
                        <input type="number" class="form-control" required id="Numero_hhll"
                               name="Numero_hhll" <?php if (isset($Numero)) {
                            echo "value='" . $Numero . "'";
                        }
                        ?> <?php if (isset($diasbled)) {
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
                        <?php if (isset($trasferencia)) { ?>
                            <?php echo areaclass::selectedarea("area_hhll", "area_hhll", "form-control", $trasferencia) ?>

                        <?php } else { ?>
                            <?php echo areaclass::selectarea("area_hhll", "area_hhll", "form-control") ?>

                            <?php
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
                        <textarea class="form-control " required id="Descripcion_hhll"
                                  name="Descripcion_hhll" <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?> ><?php if (isset($descrpcion)) {
                                echo $descrpcion;
                            } ?></textarea>
                    </div>
                </div>
            </div>

            <!----------------------------- Ubicacion topografica de la importacion------------------------------>
            <?php if (isset($id)) { ?>
                <input type="hidden" name="id" id="id" value="<?php echo $id ?>">

            <?php } else { ?>
                <input type="hidden" name="am" id="am" value="<?php echo $_GET["balda"] ?>">
                <?php
            } ?>
            <!----------------------------- Ubicacion topografica de la importacion------------------------------>

            <div class="card-footer text-center">
                <?php echo $btn ?>
            </div>
        </div>
    </form>
</div>


<script>
    function enviar() {
        var balda = $("#am").val();
        var Documento = $("#Documento_hhll").val();
        var Apellidos = $("#Apellidos_hhll").val();
        var Nombres = $("#Nombres_hhll").val();
        var Estado = $("#Estado_hhll").val();
        var Numero = $("#Numero_hhll").val();
        var Area = $("#area_hhll").val();
        var Descripcion = $("#Descripcion_hhll").val();


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
            url: "../../Controlador/documentocontroller.php?action=crear&table=Historia_laboral",
            type: 'POST',
            dataType: "JSON",
            success: function (res) {
                $.notify({
                    icon: "icon-eye",
                    message: "consecutivo numero " + res[0],

                }, {
                    type: "success",
                    timer: 1000,
                    placement: {
                        from: "top",
                        align: "center",
                    }
                });


                $("#div_chatarra").hide();
                $('#tipodoc').val("1");
                $('#myModal').modal('toggle');

                $("#datatable1").append(res[1]);
            }
        });
    }


    function Editar() {
        var balda = $("#id").val();
        var Documento = $("#Documento_hhll").val();
        var Apellidos = $("#Apellidos_hhll").val();
        var Nombres = $("#Nombres_hhll").val();
        var Estado = $("#Estado_hhll").val();
        var Numero = $("#Numero_hhll").val();
        var Area = $("#area_hhll").val();
        var Descripcion = $("#Descripcion_hhll").val();


        var data = {
            "id": balda,
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
            url: "../../Controlador/documentocontroller.php?action=editar&table=Historia_laboral",
            type: 'POST',
            success: function (res) {
                alert(res);
                $("#modalform").modal("toggle");
                location.reload();
            }
        });
    }

    $("#btnclose").click(function () {
        $("#modalform").modal("toggle");
    });

    <?php if ($_GET["btn"]=="editar"){?>
    function on() {
        $("#btneditar").show();
        $("#Numero_hhll").prop('disabled', false);
        $("#Estado_hhll").prop('disabled', false);
        $("#Documento_hhll").prop('disabled', false);
        $("#Apellidos_hhll").prop('disabled', false);
        $("#Nombres_hhll").prop('disabled', false);
        $("#Fecha_hhll").prop('disabled', false);
        $("#area_hhll").prop('disabled', false);
        $("#Descripcion_hhll").prop('disabled', false);

    }

    function off() {
        $("#btneditar").hide();
        $("#Estado_hhll").prop('disabled', true);
        $("#Numero_hhll").prop('disabled', true);
        $("#Documento_hhll").prop('disabled', true);
        $("#Apellidos_hhll").prop('disabled', true);
        $("#Fecha_hhll").prop('disabled', true);
        $("#area_hhll").prop('disabled', true);
        $("#Descripcion_hhll").prop('disabled', true);
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
    <?php } ?>
</script>
