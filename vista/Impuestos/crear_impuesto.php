<?php require_once('../../modelo/areaclass.php'); ?>


<?php
$btn="";
switch ($_GET["btn"]){

    case "editar":
        $btn='
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
        $btn='<div class="card-footer text-center">
                <a onclick="enviar()" class="btn btn-primary hvr-float">
                    <i class="icon-save"> </i> enviar
                </a>
                
            </div>';
        break;
}
if (isset($_GET["archivo"])) {
    $diasbled="disabled";

    //iniciamos la conexion
    $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
    if (!$con) {
        die('Error no se pudo conectar : ' . mysqli_error($con));
    }
    mysqli_select_db($con, "ajax_demo");

    //creamos y ejecutamos la query
    $sql = "SELECT  archivos.id_Archivos, archivos.Numero , archivos.fecha, archivos.Trasferencia,  Archivos.Descripcion
    FROM archivos where id_Archivos=" . $_GET["archivo"];
    $con->set_charset("utf8");
    $result = mysqli_query($con, $sql);

    //recorremos el result de la query
    while ($row = mysqli_fetch_array($result)) {
        //Obtenemos la maxima fil en la sala

        $id=$row["id_Archivos"];
        $documento = $row["Numero"];
        $Fecha = $row["fecha"];
        $trasferencia = $row["Trasferencia"];
        $descrpcion = $row["Descripcion"];
    }
}


?>


<div class="card">

    <form id="TypeValidation" class="form-horizontal" method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Impuestos</h4>
        </div>

        <div class="card-content">

            <!---------------------- Nombre de la carpeta ---------------------------------->
            <?php if ($_GET["btn"] == "editar") { ?>
                <div class="togglebutton">
                    <label>
                        <input id="checkbox" type="checkbox" onselect="lol()"> Editar
                    </label>
                </div>
                <br>
            <?php } ?>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Documento</label>
                        <input class="form-control" type="text" name="documento_impuestos" id="documento_impuestos" required  <?php if (isset($documento)) {
                            echo "value='".$documento."'";
                        } ?> <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?> />
                    </div>
                </div>
            </div>

            <!--------------------------------- fecha de la importacion------------------------------>


            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group">
                        <label class="control-label">Fecha</label>
                        <input type="text" name="Fecha_impuestos" id="Fecha_impuestos" class="form-control" data-provide="datepicker"
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
                        <?php if (isset($trasferencia)){ ?>
                            <?php echo areaclass::selectedarea("Area_impuestos", "Area_impuestos", "form-control",$trasferencia) ?>

                        <?php }else{ ?>
                            <?php echo areaclass::selectarea("Area_impuestos", "Area_impuestos", "form-control") ?>

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
                        <textarea class="form-control " required="true" id="Descripcion_impuestos" name="Descripcion_impuestos"   <?php if (isset($diasbled)) {
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

            <div class="card-footer text-center">
                <?php echo $btn ?>
            </div>

        </div>

    </form>

</div>

<script>
    function enviar() {
        var balda = $("#am").val();
        var documento = $("#documento_impuestos").val();
        var Fecha = $("#Fecha_impuestos").val();
        var area = $("#Area_impuestos").val();
        var Descripcion = $("#Descripcion_impuestos").val();

        var data = {
            "balda": balda,
            "documento": documento,
            "Descripcion": Descripcion,
            "Fecha": Fecha,
            "area": area,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=Impuestos",
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
        var documento = $("#documento_impuestos").val();
        var Fecha = $("#Fecha_impuestos").val();
        var area = $("#Area_impuestos").val();
        var Descripcion = $("#Descripcion_impuestos").val();

        var data = {
            "id": balda,
            "documento": documento,
            "Descripcion": Descripcion,
            "Fecha": Fecha,
            "area": area,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=editar&table=Impuestos",
            type: 'POST',
            success: function (res) {
               alert(res);
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
        $("#documento_impuestos").prop('disabled', false );
        $("#Fecha_impuestos").prop('disabled', false );
        $("#Area_impuestos").prop('disabled', false );
        $("#Descripcion_impuestos").prop('disabled', false );

    }

    function off(){
        $("#btneditar").hide();
        $("#documento_impuestos").prop('disabled', true );
        $("#Fecha_impuestos").prop('disabled', true );
        $("#Area_impuestos").prop('disabled', true );
        $("#Descripcion_impuestos").prop('disabled', true );
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

    <?php  }?>

</script>
