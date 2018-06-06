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
    $sql = "SELECT  archivos.id_Archivos, archivos.fecha , archivos.Documento, archivos.Numero, archivos. Contratista, Archivos.Empresa, Archivos.Trasferencia,archivos.Ciudad, archivos.Descripcion FROM archivos where id_Archivos=" . $_GET["archivo"];
    $con->set_charset("utf8");
    $result = mysqli_query($con, $sql);

    //recorremos el result de la query
    while ($row = mysqli_fetch_array($result)) {
        //Obtenemos la maxima fil en la sala

        $id = $row["id_Archivos"];
        $Fecha = $row["fecha"];
        $Documento = $row["Documento"];
        $Numero = $row["Numero"];
        $Empresa = $row["Contratista"];
        $laboral = $row["Empresa"];
        $Area = $row["Trasferencia"];
        $Ciudad = $row["Ciudad"];
        $Descripcion = $row["Descripcion"];

    }
    echo "hl";
}
?>

<div class="card">


    <form id="TypeValidation" class="form-horizontal" method="post">

        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Seguridad Social</h4>
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
            <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group">
                        <label class="control-label">Fecha</label>
                        <input type="text" name="Fecha_Seguridad" id="Fecha_Seguridad" class="form-control" data-provide="datepicker"
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

            <!---------------------- Tipo de documento ---------------------------------->

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Tipo Documento </label>
                        <input type="text" name="documento_Seguridad" id="documento_Seguridad" class="form-control " required <?php if (isset($Documento)) {
                            echo"value='". $Documento."'";
                        }
                        ?> <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>/>
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
                            <input type="text" name="Numero_Seguridad" id="Numero_Seguridad" class="form-control " <?php if (isset($Numero)) {
                                echo"value='". $Numero."'";
                            }
                            ?> <?php if (isset($diasbled)) {
                                echo $diasbled;
                            } ?>/>
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
                        <input type="text" name="empresadeservicio_Seguridad" id="empresadeservicio_Seguridad" class="form-control "
                               required <?php if (isset($Empresa)) {
                            echo"value='". $Empresa."'";
                        }
                        ?> <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>/>
                    </div>
                </div>
            </div>

            <!------------------------------------ Empresa laboral ----------------------------------------->
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Empresa laboral</label>
                        <input type="text" name="empresalaboral_Seguridad" id="empresalaboral_Seguridad" class="form-control"
                               required <?php if (isset($laboral)) {
                            echo"value='". $laboral."'";
                        }
                        ?> <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>/>
                    </div>
                </div>
            </div>

            <!---------------------------------- Trasferencia ---------------------------------------------->

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">trasferencia</label>
                        <?php if (isset($Area)){ ?>
                            <?php echo areaclass::selectedarea("Area_Seguridad", "Area_Seguridad", "form-control",$Area) ?>

                        <?php }else{ ?>
                            <?php echo areaclass::selectarea("Area_Seguridad", "Area_Seguridad", "form-control") ?>

                            <?php
                        }?>
                    </div>
                </div>
            </div>

            <!--------------------------------- fecha de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Ciudad</label>
                        <input type="text" name="Ciuda_Seguridad" id="Ciudad_Seguridad" class="form-control" required <?php if (isset($Ciudad)) {
                            echo"value='". $Ciudad."'";
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
                        <label class="control-label">Descripcion</label>
                        <input type="text" class="form-control " required id="Descripcion_Seguridad" name="Descripcion_Seguridad" <?php if (isset($Descripcion)) {
                            echo"value='". $Descripcion."'";
                        }
                        ?> <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>    />
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
        var Fecha = $("#Fecha_Seguridad").val();
        var documento = $("#documento_Seguridad").val();
        var Numero = $("#Numero_Seguridad").val();
        var empresadeservicio = $("#empresadeservicio_Seguridad").val();
        var empresalaboral = $("#empresalaboral_Seguridad").val();
        var Area = $("#Area_Seguridad").val();
        var Ciudad = $("#Ciudad_Seguridad").val();
        var Descripcion = $("#Descripcion_Seguridad").val();

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
        var Fecha = $("#Fecha_Seguridad").val();
        var documento = $("#documento_Seguridad").val();
        var Numero = $("#Numero_Seguridad").val();
        var empresadeservicio = $("#empresadeservicio_Seguridad").val();
        var empresalaboral = $("#empresalaboral_Seguridad").val();
        var Area = $("#Area_Seguridad").val();
        var Ciudad = $("#Ciudad_Seguridad").val();
        var Descripcion = $("#Descripcion_Seguridad").val();

        var data = {
            "id": balda,
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
            url: "../../Controlador/documentocontroller.php?action=editar&table=Seguridad_social",
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

        $("#Fecha_Seguridad").prop('disabled', false );
        $("#documento_Seguridad").prop('disabled', false );
        $("#Numero_Seguridad").prop('disabled', false );
        $("#empresadeservicio_Seguridad").prop('disabled', false );
        $("#empresalaboral_Seguridad").prop('disabled', false );
        $("#Area_Seguridad").prop('disabled', false );
        $("#Ciudad_Seguridad").prop('disabled', false );
        $("#Descripcion_Seguridad").prop('disabled', false );
    }

    function off(){
        $("#Fecha_Seguridad").prop('disabled', true );
        $("#documento_Seguridad").prop('disabled', true );
        $("#Numero_Seguridad").prop('disabled', true );
        $("#empresadeservicio_Seguridad").prop('disabled', true );
        $("#empresalaboral_Seguridad").prop('disabled', true );
        $("#Area_Seguridad").prop('disabled', true );
        $("#Ciudad_Seguridad").prop('disabled', true );
        $("#Descripcion_Seguridad").prop('disabled', true );
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