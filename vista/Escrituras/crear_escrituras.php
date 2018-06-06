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
    $sql = "SELECT  archivos.id_Archivos, archivos.Notaria , archivos.Numero, archivos.De, archivos.A, Archivos.fecha, Archivos.Trasferencia, Archivos.Descripcion
 FROM archivos where id_Archivos=" . $_GET["archivo"];
    $con->set_charset("utf8");
    $result = mysqli_query($con, $sql);

    //recorremos el result de la query
    while ($row = mysqli_fetch_array($result)) {
        //Obtenemos la maxima fil en la sala

        $id = $row["id_Archivos"];
        $Notaria = $row["Notaria"];
        $Numero = $row["Numero"];
        $De = $row["De"];
        $A= $row["A"];
        $Fecha = $row["fecha"];
        $trasferencia = $row["Trasferencia"];
        $descrpcion = $row["Descripcion"];
    }
}


?>


<div class="card">
    <form id="TypeValidation" class="form-horizontal">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Escritura</h4>
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
                        <label class="control-label">Numero</label>
                        <input class="form-control" type="text" name="Numero_escritura" id="Numero_escritura" required  <?php if (isset($Numero)) {
                            echo" value='". $Numero."'";
                        }
                        ?> <?php if (isset($diasbled)) {
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
                        <label class="control-label">Notaria</label>
                        <input class="form-control" type="text" name="Notaria_escritura" id="Notaria_escritura" required <?php if (isset($Notaria)) {
                            echo"value='".$Notaria."'";
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
                        <label class="control-label">De</label>
                        <input type="text" class="form-control" required id="De_escritura" name="De_escritura" <?php if (isset($De)) {
                            echo"value='". $De ."'";
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
                        <label class="control-label">A</label>
                        <input type="text" class="form-control " required name="A_escritura" id="A_escritura" <?php if (isset($A)) {
                            echo"value='". $A."'";
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
                        <input type="text" name="Fecha_escritura" id="Fecha_escritura" class="form-control" data-provide="datepicker"
                               data-date-format="yyyy-mm-dd" value="<?php if (isset($Fecha)) {
                            echo $Fecha;
                        } else {
                            echo date("Y-m-d");
                        } ?> "  <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>  />
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
                            <?php echo areaclass::selectedarea("area_escritura", "area_escritura", "form-control",$trasferencia) ?>

                        <?php }else{ ?>
                            <?php echo areaclass::selectarea("area_escritura", "area_escritura", "form-control") ?>

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
                        <textarea class="form-control " required id="Descripcion_escritura"
                                  name="Descripcion_escritura" <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?> ><?php if (isset($descrpcion)) {
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
            <?php
            echo $btn;
            ?>
        </div>
    </form>
</div>

<script>
    function enviar() {
        var am = $("#am").val();
        var Numero = $("#Numero_escritura").val();
        var Notaria = $("#Notaria_escritura").val();
        var De = $("#De_escritura").val();
        var A = $("#A_escritura").val();
        var Fecha = $("#Fecha_escritura").val();
        var Area = $("#area_escritura").val();
        var Descripcion = $("#Descripcion_escritura").val();

        var data = {
            "balda": am,
            "Numero": Numero,
            "Notaria": Notaria,
            "De": De,
            "A": A,
            "Fecha": Fecha,
            "Area": Area,
            "Descripcion": Descripcion,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=Escritura",
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
        var am = $("#id").val();
        var Numero = $("#Numero_escritura").val();
        var Notaria = $("#Notaria_escritura").val();
        var De = $("#De_escritura").val();
        var A = $("#A_escritura").val();
        var Fecha = $("#Fecha_escritura").val();
        var Area = $("#area_escritura").val();
        var Descripcion = $("#Descripcion_escritura").val();

        var data = {
            "id": am,
            "Numero": Numero,
            "Notaria": Notaria,
            "De": De,
            "A": A,
            "Fecha": Fecha,
            "Area": Area,
            "Descripcion": Descripcion,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=editar&table=Escritura",
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
        $("#Numero_escritura").prop('disabled', false );
        $("#Notaria_escritura").prop('disabled', false );
        $("#De_escritura").prop('disabled', false );
        $("#A_escritura").prop('disabled', false );
        $("#Fecha_escritura").prop('disabled', false );
        $("#area_escritura").prop('disabled', false );
        $("#Descripcion_escritura").prop('disabled', false );

    }

    function off(){
        $("#btneditar").hide();
        $("#Numero_escritura").prop('disabled', true );
        $("#Notaria_escritura").prop('disabled', true );
        $("#De_escritura").prop('disabled', true );
        $("#A_escritura").prop('disabled', true );
        $("#Fecha_escritura").prop('disabled', true );
        $("#area_escritura").prop('disabled', true );
        $("#Descripcion_escritura").prop('disabled', true );
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
    <?php }  ?>
</script>