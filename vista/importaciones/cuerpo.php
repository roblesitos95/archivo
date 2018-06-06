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
    $sql = "SELECT  archivos.id_Archivos, archivos.Documento , archivos.Descripcion, archivos.fecha, archivos.Trasferencia, Archivos.Liquidacion, Archivos.Pedido FROM archivos where id_Archivos=" . $_GET["archivo"];
    $con->set_charset("utf8");
    $result = mysqli_query($con, $sql);

    //recorremos el result de la query
    while ($row = mysqli_fetch_array($result)) {
        //Obtenemos la maxima fil en la sala

        $id = $row["id_Archivos"];
        $Nombre = $row["Documento"];
        $descrpcion = $row["Descripcion"];
        $Fecha = $row["fecha"];
        $trasferencia = $row["Trasferencia"];
        $Liquidacion = $row["Liquidacion"];
        $Pedido = $row["Pedido"];

    }
}
?>


<div class="card">
    <form id="TypeValidation" class="form-horizontal"
          method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Importaciones</h4>
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

            <div class="row">

                <!---------------------- NOmbre de la carpeta ---------------------------------->
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombre Carpeta</label>
                        <input class="form-control" type="text" name="Nombre_import" id="Nombre_import" required <?php if (isset($Nombre)) {
                            echo"value='". $Nombre."'";
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
                        <label class="control-label">Descripcion</label>
                        <textarea class="form-control " required id="Descripcion_import"
                                  name="Descripcion_import" <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?> ><?php if (isset($descrpcion)) {
                                echo $descrpcion;
                            } ?></textarea>
                    </div>
                </div>
            </div>

            <!--------------------------------- fecha de la importacion------------------------------>


            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group">
                        <label class="control-label">Fecha</label>
                        <input type="text" name="Fecha_import" id="Fecha_import" class="form-control" data-provide="datepicker"
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
                        <label class="control-label">Trasferencia</label>
                        <?php if (isset($trasferencia)){ ?>
                            <?php echo areaclass::selectedarea("area_import", "area_import", "form-control",$trasferencia) ?>

                        <?php }else{ ?>
                            <?php echo areaclass::selectarea("area_import", "area_import", "form-control") ?>

                            <?php
                        }?>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Consecutivo de liquidacion</label>
                        <input type="text" class="form-control " required name="liquidacion_import" id="liquidacion_import" <?php if (isset($Liquidacion)) {
                            echo"value='". $Liquidacion."'";
                        }
                        ?> <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>/>
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Consecutivo de pedido</label>
                        <input type="text" class="form-control " required id="pedido_import" name="pedido_import" <?php if (isset($Pedido)) {
                            echo"value='". $Pedido."'";
                        }
                        ?> <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>/>
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

            <div class="card-footer text-center">
                <?php
                echo $btn;
                ?>
            </div>
        </div>
    </form>
</div>


<script>
    function enviar() {
        var balda = $("#am").val();
        var Nombre = $("#Nombre_import").val();
        var Descripcion = $("#Descripcion_import").val();
        var Fecha = $("#Fecha_import").val();
        var area = $("#area_import").val();
        var liquidacion = $("#liquidacion_import").val();
        var pedido = $("#pedido_import").val();

        var data = {
            "balda": balda,
            "Nombre": Nombre,
            "Descripcion": Descripcion,
            "Fecha": Fecha,
            "area": area,
            "liquidacion": liquidacion,
            "pedido": pedido,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=Importacion",
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

    function Editar() {
        var balda = $("#id").val();
        var Nombre = $("#Nombre_import").val();
        var Descripcion = $("#Descripcion_import").val();
        var Fecha = $("#Fecha_import").val();
        var area = $("#area_import").val();
        var liquidacion = $("#liquidacion_import").val();
        var pedido = $("#pedido_import").val();

        var data = {
            "id": balda,
            "Nombre": Nombre,
            "Descripcion": Descripcion,
            "Fecha": Fecha,
            "area": area,
            "liquidacion": liquidacion,
            "pedido": pedido,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=editar&table=Importacion",
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
    function on(){
        $("#btneditar").show();
        $("#Nombre_import").prop('disabled', false );
        $("#Descripcion_import").prop('disabled', false );
        $("#Fecha_import").prop('disabled', false );
        $("#area_import").prop('disabled', false );
        $("#liquidacion_import").prop('disabled', false );
        $("#pedido_import").prop('disabled', false );

    }

    function off(){
        $("#btneditar").hide();
        $("#Nombre_import").prop('disabled', true );
        $("#Descripcion_import").prop('disabled', true );
        $("#Fecha_import").prop('disabled', true );
        $("#Area_import").prop('disabled', true );
        $("#liquidacion_import").prop('disabled', true );
        $("#pedido_import").prop('disabled', true );
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