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
    $sql = "SELECT  archivos.id_Archivos, archivos.Numero , archivos.Ciudad, archivos.Contratista ,archivos.fecha , archivos.Trasferencia,  Archivos.Descripcion
    FROM archivos where id_Archivos=" . $_GET["archivo"];
    $con->set_charset("utf8");
    $result = mysqli_query($con, $sql);

    //recorremos el result de la query
    while ($row = mysqli_fetch_array($result)) {
        //Obtenemos la maxima fil en la sala

        $id=$row["id_Archivos"];
        $numero = $row["Numero"];
        $Fecha = $row["fecha"];
        $trasferencia = $row["Trasferencia"];
        $descrpcion = $row["Descripcion"];
        $ciudad = $row["Ciudad"];
        $Proveedor = $row["Contratista"];
    }
}


?>

<div class="card">

    <form id="TypeValidation" class="form-horizontal" method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">Informe de entrada</h4>
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
                        <input class="form-control" type="text" name="Numero_info" id="Numero_info" required <?php if (isset($numero)) {
                            echo "value='".$numero."'";
                        } ?> <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?> />
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Sucursal</label>
                        <input class="form-control" type="text" name="Sucursal_info" id="Sucursal_info" required <?php if (isset($ciudad)) {
                            echo "value='".$ciudad."'";
                        } ?> <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?> />
                    </div>
                </div>
            </div>

            <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Proveedor</label>
                        <input class="form-control" type="text" name="Proveedor_info" id="Proveedor_info" required <?php if (isset($Proveedor)) {
                            echo "value='".$Proveedor."'";
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
                        <input type="text" name="Fecha_info" id="Fecha_info" class="form-control" data-provide="datepicker"
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
                        <label class="control-label" >Trasferencia</label>
                        <?php if (isset($trasferencia)){ ?>
                            <?php echo areaclass::selectedarea("Area__info", "Area__info", "form-control",$trasferencia) ?>

                        <?php }else{ ?>
                            <?php echo areaclass::selectarea("Area__info", "Area_info", "form-control") ?>

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
                        <textarea class="form-control " required id="Descripcion_info" name="Descripcion_info"  <?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>><?php if (isset($descrpcion)) {
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
        var Numero = $("#Numero").val();
        var Sucursal = $("#Sucursal").val();
        var Proveedor = $("#Proveedor").val();
        var Fecha = $("#Fecha").val();
        var area = $("#Area").val();
        var Descripcion = $("#Descripcion").val();

        var data = {
            "balda": balda,
            "Numero": Numero,
            "Sucursal": Sucursal,
            "Proveedor": Proveedor,
            "Descripcion": Descripcion,
            "Fecha": Fecha,
            "Area": area,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=Informe_Entrada",
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

    $("#btnclose").click(function () {
        $("#modalform").modal("toggle");
    });

    <?php if ($_GET["btn"]=="editar"){?>

    function on(){


        $("#Numero"));

    $("#btneditar").show();
    $("#Sucursal").val();
    $("#Proveedor").val();
    $("#Fecha").val();
    $("#Area").val();
    ("#Descripcion").val();


    $("#documento_impuestos").;
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
