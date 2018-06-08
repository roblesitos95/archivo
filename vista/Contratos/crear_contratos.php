<?php require_once('../../modelo/areaclass.php'); ?>

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
    $sql = "SELECT  archivos.id_Archivos, archivos.Empresa , archivos.Numero, archivos.Contratista, Archivos.fecha, Archivos.Trasferencia, Archivos.Descripcion
 FROM archivos where id_Archivos=" . $_GET["archivo"];
    $con->set_charset("utf8");
    $result = mysqli_query($con, $sql);

    //recorremos el result de la query
    while ($row = mysqli_fetch_array($result)) {
        //Obtenemos la maxima fil en la sala

        $id = $row["id_Archivos"];
        $Empresa = $row["Empresa"];
        $Numero = $row["Numero"];
        $Contratista = $row["Contratista"];
        $Fecha = $row["fecha"];
        $trasferencia = $row["Trasferencia"];
        $descrpcion = $row["Descripcion"];
    }
}
?>


<div class="card">
    <form id="TypeValidation" class="form-horizontal" method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Contratos</h4>
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
                <!---------------------- Nombre de la empresa  ---------------------------------->

                <div class="row">
                    <div class="col-sm-1"></div>

                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la Empresa</label>
                            <input type="text" name="Nombre_Contrato" id="Nombre_Contrato" class="form-control " required
                                   <?php if (isset($Empresa)) {
                                       echo"value='". $Empresa."'";
                                   }
                                   ?> <?php if (isset($diasbled)) {
                                echo $diasbled;
                            } ?> />
                        </div>
                    </div>
                </div>

                <!---------------------- Numero de la empresa ---------------------------------->

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">N° de Contrato </label>
                            <input type="text" name="Numero_Contrato" id="Numero_Contrato" class="form-control" required
                                   <?php if (isset($Numero)) {
                                       echo "value='". $Numero."'";
                                   } ?>  <?php if (isset($diasbled)) {
                                echo $diasbled;
                            } ?> />
                        </div>
                    </div>
                </div>

                <!--------------------------------- Nombre del representante legal ------------------------------>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del Contratista</label>
                            <input type="text" name="Contratista_Contrato" id="Contratista_Contrato" class="form-control"
                                   required <?php if (isset($Contratista)) {
                                echo "value='". $Contratista."'";
                            } ?>  <?php if (isset($diasbled)) {
                                echo $diasbled;
                            } ?> />
                        </div>
                    </div>
                </div>

                <!--------------------------------- fecha del contrato ------------------------------>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label class="control-label">Fecha</label>
                            <input type="text" name="Fecha_Contrato" id="Fecha_Contrato" class="form-control" data-provide="datepicker"
                                   data-date-format="yyyy-mm-dd" value="<?php if (isset($Fecha)) {
                                echo $Fecha;
                            } else {
                                echo date("Y-m-d");
                            } ?> " <?php if (isset($diasbled)) {
                                echo $diasbled;
                            } ?>  />
                        </div>
                    </div>
                </div>

                <!----------------------------- Area de Transferencia ------------------------------>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">transferencia </label>
                            <?php if (isset($trasferencia)){ ?>
                                <?php echo areaclass::selectedarea("area_Contrato", "area_Contrato", "form-control",$trasferencia) ?>

                            <?php }else{ ?>
                                <?php echo areaclass::selectarea("area_Contrato", "area_Contrato", "form-control") ?>

                                <?php
                            }?>

                        </div>
                    </div>
                </div>

                <!----------------------------- Descripcion ------------------------------>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripcion</label>
                            <textarea class="form-control " required id="Descripcion_Contrato"
                                      name="Descripcion_Contrato" <?php if (isset($diasbled)) {
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

                <div class="card-footer text-center">
                    <?php echo $btn?>

                </div>
            </div>
    </form>
</div>

<script>
    function enviar() {

        var balda = $("#am").val();
        var Nombre = $("#Nombre_Contrato").val();
        var Numero = $("#Numero_Contrato").val();
        var Contratista = $("#Contratista_Contrato").val();
        var Fecha = $("#Fecha_Contrato").val();
        var Area = $("#area_Contrato").val();
        var Descripcion = $("#Descripcion_Contrato").val();

        var data = {
            "balda": balda,
            "Nombre": Nombre,
            "Numero": Numero,
            "Contratista": Contratista,
            "Fecha": Fecha,
            "Area": Area,
            "Descripcion": Descripcion,
        }


        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=Contratos",
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

        var id = $("#id").val();
        var Nombre = $("#Nombre_Contrato").val();
        var Numero = $("#Numero_Contrato").val();
        var Contratista = $("#Contratista_Contrato").val();
        var Fecha = $("#Fecha_Contrato").val();
        var Area = $("#area_Contrato").val();
        var Descripcion = $("#Descripcion_Contrato").val();

        var data = {
            "archivo": id,
            "Nombre": Nombre,
            "Numero": Numero,
            "Contratista": Contratista,
            "Fecha": Fecha,
            "Descripcion": Descripcion,
        }


        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=editar&table=Contratos",
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
        $("#Nombre_Contrato").prop('disabled', false );
        $("#Fecha_Contrato").prop('disabled', false );
        $("#Numero_Contrato").prop('disabled', false );
        $("#area_Contrato").prop('disabled', false );
        $("#Contratista_Contrato").prop('disabled', false );
        $("#Descripcion_Contrato").prop('disabled', false );

    }

    function off(){
        $("#btneditar").hide();
        $("#Nombre_Contrato").prop('disabled', true );
        $("#Fecha_Contrato").prop('disabled', true );
        $("#area_Contrato").prop('disabled', true );
        $("#Numero_Contrato").prop('disabled', true );
        $("#Contratista_Contrato").prop('disabled', true );
        $("#Descripcion_Contrato").prop('disabled', true );
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
