<?php

session_start();
if (isset($_SESSION['sesion'])){

?>
<?php

require("../theme/head.php");

?>

<?php require("../theme/menuizquierdo.php"); ?>
<?php require_once('../../modelo/filasclass.php'); ?>




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../assets/bonito/animated-sign-up-flow-master/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../assets/bonito/animated-sign-up-flow-master/css/style.css"> <!-- Resource style -->
    <script src="../assets/bonito/animated-sign-up-flow-master/js/modernizr.js"></script> <!-- Modernizr -->


<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"> Ver Estante </a>
        </div>
    </div>
</nav>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="cd-pricing" id="filas">

                    <script>
                        window.onload = function () {
                            var element = document.getElementById("index");
                            element.classList.add("active");
                        }
                    </script>


                    <?php
                    $f = $_GET['fila'];
                    $lol = ["Sala" => $f];
                    $_SESSION["ubi"] = $lol;
                    $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
                    if (!$con) {
                        die('Error no se pudo conectar : ' . mysqli_error($con));
                    }
                    mysqli_select_db($con, "ajax_demo");

                    $sql = "SELECT sala_fila.idsala_fila, filas.idFilas, filas.Nombre FROM sala_fila LEFT JOIN filas ON sala_fila.Filas_idFilas = filas.idFilas WHERE sala_fila.Salas_idSalas=" . $f . " GROUP BY sala_fila.Filas_idFilas";
                    $con->set_charset("utf8");
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        ?>

                        <div class="col-md-4 animated bounceIn">
                            <li class="fil">
                                <header class="cd-pricing-header">
                                    <h2><?php echo $row['Nombre']; ?></h2>
                                </header> <!-- .cd-pricing-header -->
                                <br>

                                <footer class="cd-pricing-footer">
                                    <a onclick="showini(<?php echo $row['idFilas']; ?>,<?php echo $row['idsala_fila']; ?>)"
                                       class="hvr-curl-bottom-right" href="#0">Contenido</a>
                                </footer> <!-- .cd-pricing-footer -->
                            </li>
                        </div>

                    <?php } ?>


                </ul> <!-- .cd-pricing -->
            </div>

            <div class="cd-form">

                <div class="cd-more-info">
                    <h1 style="font-size:25px ">Necesitas ayuda</h1>
                    <br>
                    <h6>Seleccione una de las dos cara para ver sus respectivos Estantes</h6>
                </div>

                <form action="">
                    <div class="col-md-12 " id="perro">

                        <br/>
                        <div class="nav-center">
                            <ul class="nav nav-pills nav-pills-primary nav-pills-icons" role="tablist">

                                <li class="active">
                                    <a href="#description-1" onclick="limpiar()" role="tab" data-toggle="tab">
                                        <i class="icon-font"></i> Cara A
                                        <span class="ui-icon ui-icon-arrowthick-1-n"></span>
                                    </a>
                                </li>

                                <li>
                                    <a class="" href="#schedule-1" onclick="limpiar()" role="tab" data-toggle="tab">
                                        <i class="icon-bold"></i> Cara B
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane  active" id="description-1">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Lista de Estante Cara A</h4>
                                        <div id="caraA">

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane" id="schedule-1">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Lista de Estantes cara B</h4>
                                        <div id="carab">

                                        </div>
                                        <br>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background-color: rgba(241,241,241,0.6)">
                            <div class="col-md-12">

                                <div class="card-header">

                                </div>
                                <div class="card-content">
                                    <div class="tab-content">
                                        <div class="tab-pane" id="pill1">

                                        </div>
                                        <div class="tab-pane" id="pill2">

                                        </div>

                                        <div class="tab-pane" id="pill3">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header card-header-icon"
                                                         data-background-color="blue">
                                                        <i class="icon-list"></i>
                                                    </div>
                                                    <div class="card-content">
                                                        <h4 class="card-title">Carpetas</h4>
                                                        <div class="table-responsive">
                                                            <table class="table" id="tablearchivos">
                                                                <thead class="text-primary">
                                                                <th>Serie</th>
                                                                <th>trasfernecia</th>
                                                                <th>Mas</th>
                                                                </thead>

                                                                <tbody id="datatable1">

                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                    <div id="addboton">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>

                <a href="#0" class="cd-close"></a>

            </div> <!-- .cd-form -->

            <div class="text-center"><br>
                <br>
                <br>

                <footer class="cd-pricing-footer">
                    <a onclick="newfila()" class="hvr-radial-in " href="#0">Agregar Fila</a>
                </footer> <!-- .cd-pricing-footer -->
            </div>

            <div class="cd-overlay"></div> <!-- shadow layer -->

            <!-- Modal -->
            <div class="modal" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-color: #f5f5f5">
                        <div class="modal-header text-right" >
                            <button type="button" class="btn btn-xs btn-primary btn-simple" data-dismiss="modal"><i class="icon-close"></i></button>
                        </div>


                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header card-header-text" data-background-color="blue">
                                    <h4 class="card-title">Tipo de Documento</h4>
                                </div>

                                <div class="card-content">

                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating">
                                                <select class="form-control" name="tipodoc" id="tipodoc" required
                                                        onchange="form4()">
                                                    <option value="1" disabled selected>seleccione...</option>
                                                    <option value="Cert_Desintegracion">Certificado de desintegracion
                                                    </option>
                                                    <option value="Contratos">Contratos</option>
                                                    <option value="Documento_Contable">Documento contable</option>
                                                    <option value="Escrituras">Escrituras</option>
                                                    <option value="Facturas">Facturas</option>
                                                    <option value="Historias_Laborales">Historias Laborales</option>
                                                    <option value="Importaciones">Importaciones</option>
                                                    <option value="Impuestos">Impuestos</option>
                                                    <option value="Seguridad_Social">Seguridad Social</option>
                                                    <option value="info_entrada">Informes de Entrada</option>
                                                    <option value="Libros_Oficiales">Libros Oficiales</option>
                                                </select>
                                            </div>
                                            <input type="hidden" id="balda" value="">
                                            <input type="hidden" id="balda2" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body animated slideOutRight" id="div_chatarra" style="display: none;">

                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="container">

            <!-- Modal -->
            <div class="modal fade" id="modalform" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="div-cont">
                        <div id="form"></div>
                    </div>

                </div>
            </div>
        </div>

        <script>

            $('#myModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('balda')
                // Extrae información de los atributos data- *
                // Si es necesario, puede iniciar una solicitud AJAX aquí (y luego hacer la actualización en una devolución de llamada).
                // Actualiza el contenido modal. Utilizaremos jQuery aquí, pero en su lugar podría usar una biblioteca de enlace de datos u otros métodos
                var modal = $(this)
                //alert(recipient);
                $("#balda").val(recipient)
                // modal.find('.modal-body hogar').val(recipient)
                //    $("#balda_am").val(recipient);
            });


            //Funcion para agregar filas a la sala
            function newfila() {
                var parametros = {
                    "caraA": "1",
                    "caraB": "2",
                }

                $.ajax({
                    data: parametros, //datos que se envian a traves de ajax
                    url: '../../Controlador/Ubicacion_controller.php?action=newe', //archivo que recibe la peticion
                    type: 'POST', //método de envio
                    dataType: 'JSON',
                    success: function (L) {
                        if (L == null) {
                            alert("NOT SUCCES");
                        } else {
                            $("#filas").append(L);
                        }
                    }
                });
            }


            //Estanteria que pertenece a cada fila seleccionada
            function showini(str, topo) {
                //limpiamos lo que esta en los div
                document.getElementById("caraA").innerHTML = " ";
                document.getElementById("carab").innerHTML = " ";
                document.getElementById("pill1").innerHTML = " ";
                document.getElementById("pill2").innerHTML = " ";
                $("#pill3").hide();
                document.getElementById("datatable1").innerHTML = " ";
                document.getElementById("addboton").innerHTML = " ";

                //obtenemos los parametros que vamos a enviar por metodo post
                var parametros = {
                    "sala": str,
                    "sala_fila": topo
                }

                //creamos la sentecia de ajax para qeu envie y reciba los datos
                $.ajax({
                    data: parametros, //datos que se envian a traves de ajax
                    url: '../../Controlador/Ubicacion_controller.php?action=Estante', //archivo que recibe la peticion
                    type: 'POST', //método de envio
                    dataType: 'JSON',//tipo de datos
                    success: function (L) {//si la funcion es verdadera
                        if (L == null) {
                            alert("NOT SUCCES");
                        } else {
                            $("#caraA").append(L[0]);//escribimos lo correspondiente a cada cara
                            $("#carab").append(L[1]);
                        }
                    }
                });
            }


            //Agregar un estante para cada cara
            function addestan(cara, fila) {
                var parametros = {
                    "fila": fila,
                    "cara": cara,
                }
                $.ajax({
                    data: parametros, //datos que se envian a traves de ajax
                    url: '../../Controlador/Ubicacion_controller.php?action=addestan', //archivo que recibe la peticion
                    type: 'POST', //método de envio
                    dataType: 'JSON',
                    success: function (L) {
                        if (L == null) {
                            alert("NOT SUCCES");
                        } else {
                            $("#" + cara).append(L);
                        }
                    }
                });
            }


            //Baldas correspondientes a cada estante
            function showbaldas(id) {
                //limpiamos lo que esta en los div
                $('#pill2').hide();
                $('#pill3').hide();
                document.getElementById("pill1").innerHTML = "  ";
                document.getElementById("datatable1").innerHTML = "  ";
                document.getElementById("pill2").innerHTML = '<a  href="#pill1" data-toggle="tab" class="btn btn-primary btn-xs"><i class="icon-hand-o-left"></i></a>';

                // datos que se van a enviar por post
                var datos = {
                    "id": id,
                }
                //sentencia de ajax
                $.ajax({
                    data: datos,//datos que e envian
                    url: '../../Controlador/Ubicacion_controller.php?action=baldas',//url archivo que recibe la peticion
                    type: 'POST',// tipo de envio de los datos
                    dataType: 'JSON',//tipo de datos que recibe
                    success: function (respuesta) {
                        if (respuesta == null) {
                            alert("no hay datos");
                        } else {
                            $("#pill1").show();//mostramos el div donde se establecen
                            $("#pill1").append(respuesta);//establecemos en el id
                        }
                    }
                })
            }


            //Agregar balda a un respectivo estante
            function addbalda(fila) {
                var parametros = {
                    "fila": fila,
                }
                $.ajax({
                    data: parametros, //datos que se envian a traves de ajax
                    url: '../../Controlador/Ubicacion_controller.php?action=addbaldas', //archivo que recibe la peticion
                    type: 'POST', //método de envio
                    dataType: 'JSON',
                    success: function (respuesta) {
                        if (respuesta == null) {
                            alert("NOT SUCCES");
                        } else {
                            $("#addbalda").before(respuesta);
                        }
                    }
                });
            }


            //Archivos Modulares para cada balda
            function showam(fila) {
                document.getElementById("pill2").innerHTML = '';
                document.getElementById("datatable1").innerHTML = '';

                $('#pill1').hide();
                $('#pill3').hide();

                var parametros = {
                    "balda": fila,
                }
                $.ajax({
                    data: parametros, //datos que se envian a traves de ajax
                    url: '../../Controlador/Ubicacion_controller.php?action=am', //archivo que recibe la peticion
                    type: 'POST', //método de envio
                    dataType: 'JSON',
                    success: function (respuesta) {
                        if (respuesta == null) {
                            alert("NOT SUCCES");
                        } else {

                            $('#pill2').show();
                            $("#pill2").append(respuesta);
                        }
                    }
                });
            }


            //agregar Archivos Modulares para la balada seleccionada
            function addam(balda) {

                swal({
                    title: 'AM Numero',
                    html: '<div class="form-group">' +
                    '<input id="input-field" name="Tipo2" type="text" required class="form-control"/>' +
                    '<span class="help-block">Por favor solo digite el numerodel archivo modular</span>' +
                    '</div>',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false

                }).then(function (result) {
                    var data = {
                        "numero": $('#input-field').val(),
                        "balda": balda,

                    }
                    $.ajax({
                        data: data,
                        url: '../../Controlador/Ubicacion_controller.php?action=addam', //archivo que recibe la peticion
                        type: 'POST',
                        dataType: 'JSON',
                        success: function (respuesta) {
                            $("#btnadd").before(respuesta);
                        }

                    });
                }).catch(swal.noop)

            }


            //function para limpiar las respectivos div cargados anteriormente
            function limpiar() {
                document.getElementById("pill1").innerHTML = "";
                $('#pill1').hide();
                document.getElementById("pill2").innerHTML = "";
                $('#pill2').hide();
                document.getElementById("datatable1").innerHTML = "";
                $('#pill3').hide();
            }


            function form4() {
                var doc = $('#tipodoc').val();
                var balda = $("#balda2").val();
                var data2 = {
                    "doc": doc,
                    "balda": balda,
                };
                $.ajax({
                    data: data2,
                    url: '../../Controlador/Ubicacion_controller.php?action=tipo', //archivo que recibe la peticion
                    type: 'POST',

                    success: function (respuesta) {

                        $("#div_chatarra").addClass("animated slideOutRight");
                        document.getElementById("div_chatarra").innerHTML = '';
                        $("#div_chatarra").load(respuesta);
                        $("#div_chatarra").show();
                        $("#div_chatarra").removeClass("animated slideOutRight").addClass("animated slideInLeft");
                    }
                });

            }

            function showarchivos(idbalda_am) {
                $("#balda2").val(idbalda_am);
                var data2 = {
                    "idbalda_am": idbalda_am,
                };

                document.getElementById("datatable1").innerHTML = "";
                document.getElementById("addboton").innerHTML = "";
                $.ajax({
                    data: data2,
                    url: '../../Controlador/Ubicacion_controller.php?action=archivo', //archivo que recibe la peticion
                    type: 'POST',
                    dataType: "JSON",
                    success: function (respuesta) {
                        $("#pill2").hide();
                        $("#pill3").show();
                        $("#datatable1").append(respuesta[0]);
                        $("#addboton").append(respuesta[1]);
                    }
                });
            }



            function ver(tipo,id) {

                var data2 = {
                    "Tipo": tipo,
                    "id": id,
                };
                $.ajax({
                    data: data2,
                    url: '../../Controlador/documentocontroller.php?action=ver', //archivo que recibe la peticion
                    type: 'POST',

                    success: function (respuesta) {

                        $("#form").load(respuesta);
                        $("#modalform").modal();

                    }
                });

            }


            $(document).ready(function(){
                $("#myBtnclose").click(function(){

                });
            });




        </script>


        <script src="../assets/bonito/animated-sign-up-flow-master/js/velocity.min.js"></script>
        <script src="../assets/bonito/animated-sign-up-flow-master/js/main.js"></script> <!-- Resource jQuery -->

        <?php require("../theme/pie.php"); ?>
        <?php
        } else {

            header('Location: ../index/index.php');
        } ?>
