<?php require_once('../../modelo/areaclass.php'); ?>
<style>
    * {
        box-sizing: border-box;
    }
    body {
        font: 16px Arial;
    }
    .autocomplete {
        /*the container must be positioned relative:*/
        position: relative;
        display: inline-block;
    }
    input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
    }
    input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
    }
    input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
        cursor: pointer;
    }
    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }
    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }
    .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9;
    }
    .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
</style>
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
    $sql = "SELECT  archivos.id_Archivos, archivos.Documento , archivos.Numero, archivos.Placa, Archivos.Clase, Archivos.fecha, Archivos.Trasferencia, Archivos.Descripcion
 FROM archivos where id_Archivos=" . $_GET["archivo"];
    $con->set_charset("utf8");
    $result = mysqli_query($con, $sql);

    //recorremos el result de la query
    while ($row = mysqli_fetch_array($result)) {
        //Obtenemos la maxima fil en la sala

        $id=$row["id_Archivos"];
        $documento = $row["Documento"];
        $Numero = $row["Numero"];
        $Placa = $row["Placa"];
        $Clase = $row["Clase"];
        $Fecha = $row["fecha"];
        $trasferencia = $row["Trasferencia"];
        $descrpcion = $row["Descripcion"];
    }
}
?>
<div class="card">
    <form id="TypeValidation" class="form-horizontal" method="post">
        <div class="card-header card-header-text" data-background-color="blue">
            <h4 class="card-title">certificado de desintegracion </h4>
        </div>
        <div class="card-content ">


<?php if ($_GET["btn"]=="editar"){?>
                <div class="togglebutton">
                    <label>
                        <input id="checkbox" type="checkbox" onselect="lol()"> Editar
                    </label>
                </div>

            <?php  }?>
            <!--------------------------------- fecha de la importacion------------------------------>

            <div class="row" >
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group">
                        <label class="control-label">Fecha</label>
                        <input type="text" name="Fecha" id="Fechaa" class="form-control" data-provide="datepicker"
                               data-date-format="yyyy-mm-dd" value=" <?php if (isset($Fecha)) {
                            echo $Fecha;
                        } else {
                            echo date("Y-m-d");
                        } ?>  "<?php if (isset($diasbled)) {
                            echo $diasbled;
                        } ?>  < />
                    </div>
                </div>
            </div>

            <!------------- ---------------- Consecutivo de liquidacion de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">transferencia </label>

                        <?php if (isset($trasferencia)) {
                            echo areaclass::selectedarea("area", "area", "form-control", $trasferencia);
                        }
                        else{
                            echo areaclass::selectarea("area", "area", "form-control");
                        }?>
                    </div>
                </div>
            </div>

            <!---------------------- NOmbre de la carpeta ---------------------------------->

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Tipo de Documento</label>

                            <input class="form-control" id="myInput" type="text" name="myCountry"  autocomplete="off"  <?php if (isset($documento)) {
                                echo "value='".$documento."'";
                            } ?> <?php if (isset($diasbled)) {
                                echo $diasbled;
                            } ?>  required />

                    </div>
                </div>
            </div>

            <!--------------------------------- descripcioin de la importacion------------------------------>

            <div class="row">
                <div class="col-sm-1"></div>

                <div class="col-sm-10">
                    <div class="form-group label-floating">
                        <label class="control-label">Numero</label>
                        <input class="form-control" type="text" name="Numero" id="Numero" required
                            <?php if (isset($Numero)) {
                                   echo "value='".$Numero."'" ;
                               } ?> <?php if (isset($diasbled)) {
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
                        <label class="control-label">Placa</label>
                        <input type="text" class="form-control " required="true" id="Placa" name="Placa"
                               <?php if (isset($Placa)) {
                                   echo "value='".$Placa."'";
                               } ?><?php if (isset($diasbled)) {
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
                        <label class="control-label">Clase</label>
                        <input type="text" class="form-control " required name="Clase" id="Clase"
                               <?php if (isset($Clase)) {
                                   echo "value='".$Clase."'";
                               } ?><?php if (isset($diasbled)) {
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
                        <label class="control-label">Descripcion</label>
                        <textarea class="form-control " required="true" id="Descripciondoc"
                                  name="Descripciondoc" <?php if (isset($diasbled)) {
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
<?php echo $btn?>

        </div>
    </form>
</div>


<script>
    function enviar() {
        var balda = $("#am").val();

        var Fecha = $("#Fechaa").val();
        var area = $("#area").val();
        var Documento = $("#myInput").val();
        var Numero = $("#Numero").val();
        var Placa = $("#Placa").val();
        var Clase = $("#Clase").val();
        var Descripcion = $("#Descripciondoc").val();

        var data = {
            "balda": balda,
            "Fecha": Fecha,
            "area": area,
            "Documento": Documento,
            "Numero": Numero,
            "Placa": Placa,
            "Clase": Clase,
            "Descripcion": Descripcion,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=crear&table=Cert_Desintegracion",
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


        var id = $("#id").val();
        var Fecha = $("#Fechaa").val();
        var area = $("#area").val();
        var Documento = $("#myInput").val();
        var Numero = $("#Numero").val();
        var Placa = $("#Placa").val();
        var Clase = $("#Clase").val();
        var Descripcion = $("#Descripciondoc").val();

        var data = {
            "archivo":id,
            "Fecha": Fecha,
            "area": area,
            "Documento": Documento,
            "Numero": Numero,
            "Placa": Placa,
            "Clase": Clase,
            "Descripcion": Descripcion,
        }

        $.ajax({
            data: data,
            url: "../../Controlador/documentocontroller.php?action=editar&table=Cert_Desintegracion",
            type: 'POST',

            success: function () {
                $("#modalform").modal("toggle");
                location.reload();

            }
        });
    }



    function autocomplete(inp, arr) {

        /* la función de autocompletar toma dos argumentos,
        el elemento de campo de texto y una matriz de posibles valores autocompletados: */
        var currentFocus;
        /*ejecutar una función cuando alguien escribe en el campo de texto:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*cerrar cualquier lista ya abierta de valores autocompletados*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*crea un elemento DIV que contendrá los elementos (valores):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*añada el elemento DIV como elemento secundario del contenedor de autocompletar:*/
            this.parentNode.appendChild(a);
            /*para cada elemento en la matriz ...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }


    /*An array containing all the country names in the world:*/

    $.ajax({
        url: "../../Controlador/documentocontroller.php?action=Documento",
        type: 'POST',
        dataType: "JSON",
        success: function (res) {
            autocomplete(document.getElementById("myInput"), res);

        }
    });




    $("#btnclose").click(function () {
            $("#modalform").modal("toggle");
    });

    <?php if ($_GET["btn"]=="editar"){?>

    function on(){
        $("#btneditar").show();
        $("#Fechaa").prop('disabled', false );
        $("#area").prop('disabled', false );
        $("#myInput").prop('disabled', false );
        $("#Numero").prop('disabled', false );
        $("#Placa").prop('disabled', false );
        $("#Clase").prop('disabled', false );
        $("#Descripciondoc").prop('disabled', false );

    }

    function off(){
        $("#btneditar").hide();
        $("#Fechaa").prop('disabled', true );
        $("#area").prop('disabled', true );
        $("#myInput").prop('disabled', true );
        $("#Numero").prop('disabled', true );
        $("#Placa").prop('disabled', true );
        $("#Clase").prop('disabled', true );
        $("#Descripciondoc").prop('disabled', true );
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

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/

</script>

</script>
