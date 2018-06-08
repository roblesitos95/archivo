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
    $sql = "SELECT  archivos.id_Archivos, archivos.Numero , archivos.Contratista, archivos.NIT, archivos.Tipo, Archivos.Documento, Archivos.fecha, Archivos.Trasferencia, Archivos.Descripcion
 FROM archivos where id_Archivos=" . $_GET["archivo"];
    $con->set_charset("utf8");
    $result = mysqli_query($con, $sql);

    //recorremos el result de la query
    while ($row = mysqli_fetch_array($result)) {
        //Obtenemos la maxima fil en la sala

        $id = $row["id_Archivos"];
        $Numero = $row["Numero"];
        $Contratista = $row["Contratista"];
        $NIT = $row["NIT"];
        $Tipo = $row["Tipo"];
        $Documento = $row["Documento"];
        $Fecha= $row["fecha"];
        $trasferencia = $row["Trasferencia"];
        $descrpcion = $row["Descripcion"];
    }
}
?>



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
    <form id="TypeValidation" class="form-horizontal" method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Facturas</h4>
        </div>

        <div class="card-content">
            <?php if ($_GET["btn"] == "editar") { ?>
                <div class="togglebutton">
                    <label>
                        <input id="checkbox" type="checkbox" onselect="lol()"> <b>Editar</b>
                    </label>
                </div>
                <br>
            <?php } ?>
            <!---------------------- Nombre de la carpeta ---------------------------------->

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">

                    <div class="form-group label-floating">
                        <label class="control-label">Numero de Factura</label>
                        <input class="form-control" type="text" name="Numero_factura" id="Numero_factura" required <?php if (isset($Numero)) {
                            echo"value='". $Numero."'";
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
                        <label class="control-label">Titular</label>
                        <input class="form-control" type="text" name="Titular_factura" id="Titular_factura" required <?php if (isset($Contratista)) {
                            echo"value='". $Contratista."'";
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
                        <label class="control-label">NIT</label>
                        <input type="text" class="form-control" required  id="NIT_factura" name="NIT_factura" <?php if (isset($NIT)) {
                            echo"value='". $NIT."'";
                        }
                        ?> <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row" id="texttipo">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <?php if (!isset($Tipo)) {
                            echo ' <label class="control-label">Tipo de factura</label>';
                        } ?>
                       
                        <select class="form-control" required="true" name="Tipo_factura" id="Tipo_factura" onchange="text()" <?php if (isset($diasbled)) {
                            echo $diasbled;
                        }?>>
                            <?php if (isset($Tipo)) {
                                echo '<option disabled selected value="$Tipo">'.$Tipo.'</option>';
                            } else{
                                echo '<option disabled selected value=""></option>';
                            } ?>
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
                        <input type="text" class="form-control" required name="tipo2_factura" id="tipo2_factura"/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Documento Contable</label>
                        <input type="text" class="form-control " required name="Contable_factura" id="Contable_factura" <?php if (isset($Documento)) {
                            echo"value='". $Documento."'";
                        }
                        ?> <?php if (isset($diasbled)) {
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
                        <input type="text" name="Fecha_factura" id="Fecha_factura" class="form-control" data-provide="datepicker"
                               data-date-format="yyyy-mm-dd" value="<?php if (isset($Fecha)) {
                            echo $Fecha;
                        } else {
                            echo date("Y-m-d");
                        } ?> "  <?php if (isset($diasbled)) {
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
                        <label class="control-label">Documento Contable</label>
                        <?php if (isset($trasferencia)){ ?>
                            <?php echo areaclass::selectedarea("area_factura", "area_factura", "form-control",$trasferencia) ?>

                        <?php }else{ ?>
                            <?php echo areaclass::selectarea("area_factura", "area_factura", "form-control") ?>

                            <?php
                        }?>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Descripcion</label>
                        <textarea class="form-control " required id="Descripcion_factura"
                                  name="Descripcion_factura" <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?> ><?php if (isset($descrpcion)) {
                                echo $descrpcion;
                            } ?></textarea>
                    </div>
                </div>
            </div>
            <?php if (isset($id)){ ?>
                <input type="hidden" name="id" id="id" value="<?php echo $id?>">

            <?php }else{ ?>
                <input type="hidden" name="am" id="am" value="<?php echo $_GET["balda"] ?>">
                <?php
            }?>
            <!----------------------------- Ubicacion topografica de la importacion------------------------------>

            <?php
            echo $btn;
            ?>
        </div>
    </form>
</div>


<script>
    function enviar() {
        var balda = $("#am").val();
        var Numero = $("#Numero_factura").val();
        var Titular = $("#Titular_factura").val();
        var NIT = $("#NIT_factura").val();
        var Tipo = $("#Tipo_factura").val();
        var Tipo2 = $("#tipo2_factura").val();
        var Contable = $("#Contable_factura").val();
        var Fecha = $("#Fecha_factura").val();
        var area = $("#area_factura").val();
        var Descripcion = $("#Descripcion_factura").val();

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
        var Numero = $("#Numero_factura").val();
        var Titular = $("#Titular_factura").val();
        var NIT = $("#NIT_factura").val();
        var Tipo = $("#Tipo_factura").val();
        var Tipo2 = $("#tipo2_factura").val();
        var Contable = $("#Contable_factura").val();
        var Fecha = $("#Fecha_factura").val();
        var area = $("#area_factura").val();
        var Descripcion = $("#Descripcion_factura").val();

        var data = {
            "id": balda,
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
            url: "../../Controlador/documentocontroller.php?action=editar&table=Factura",
            type: 'POST',
            success: function (res) {
                 alert(res);
                $("#modalform").modal("toggle");
                location.reload();;

            }
        });
    }
    $("#btnclose").click(function () {
        $("#modalform").modal("toggle");
    });

    <?php if ($_GET["btn"]=="editar"){?>

    function on(){
        $("#btneditar").show();
        $("#Tipo_factura").prop('disabled', false );
        $("#tipo2_factura").prop('disabled', false );
        $("#Numero_factura").prop('disabled', false );
        $("#Titular_factura").prop('disabled', false );
        $("#NIT_factura").prop('disabled', false );
        $("#Contable_factura").prop('disabled', false );
        $("#Fecha_factura").prop('disabled', false );
        $("#area_factura").prop('disabled', false );
        $("#Descripcion_factura").prop('disabled', false );

    }

    function off(){
        $("#btneditar").hide();
        $("#Tipo_factura").prop('disabled', true );
        $("#tipo2_factura").prop('disabled', true );
        $("#Numero_factura").prop('disabled', true );
        $("#Titular_factura").prop('disabled', true );
        $("#NIT_factura").prop('disabled', true );
        $("#Contable_factura").prop('disabled', true );
        $("#Fecha_factura").prop('disabled', true );
        $("#area_factura").prop('disabled', true );
        $("#Descripcion_factura").prop('disabled', true );
    }

    var checkbox = document.getElementById('checkbox');

    checkbox.addEventListener("change", comprueba, false);

    function comprueba(){
        if(checkbox.checked){
            on();
        }else{
            off();
        }
    }
    <?php } ?>

</script>