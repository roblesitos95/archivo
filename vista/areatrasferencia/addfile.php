<?php

session_start();
if (isset($_SESSION['sesion'])) {

    ?>


    <?php require("../theme/head.php"); ?>

    <!-- top navigation -->


    <?php require("../theme/menuizquierdo.php"); ?>

    <?php require_once('../../modelo/areaclass.php'); ?>

    <script>
        function text() {
            var x = document.getElementById("Tipo").value;

            swal({
                title: 'Tipo de Factura',
                html: '<div class="form-group">' +
                '<input id="input-field" name="Tipo2" type="text" class="form-control"/>' +
                '</div>',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false

            }).then(function (result) {

            }).catch(swal.noop)

        }


        window.onload = function () {
            var element = document.getElementById("creararea");
            element.classList.add("active");
            var parend = document.getElementById("prestamos");
            parend.classList.add("active");
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function (e) {
            $('.yearselect').yearselect();

            $('.yrselectdesc').yearselect({step: 1, order: 'desc'});
            $('.yrselectasc').yearselect({order: 'asc'});
        });
    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>


    <?php if (!empty($_GET['respuesta'])) { ?>
        <?php if ($_GET['respuesta'] == "correcto") { ?>

            <script>
                window.onload = function () {
                    var mensaje = "La Transferencia se a Creado exitosamente";
                    demo.showSwal('success-message', mensaje)
                    var color = 2;
                    //demo.showNotification('top','center',mensaje,color);
                }
            </script>

        <?php } else { ?>

            <script>
                window.onload = function () {
                    var mensaje = "La Transferencia no se a Creado por favor intente de nuevo";
                    demo.showSwal('error-message', mensaje)
                    var color = 2;
                    //demo.showNotification('top','center',mensaje,color);
                }
            </script>

        <?php } ?>
    <?php } ?>
    <link href="../assets/fileupload/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../assets/fileupload/themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../assets/fileupload/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="../assets/fileupload/js/fileinput.js" type="text/javascript"></script>
    <script src="../assets/fileupload/js/locales/fr.js" type="text/javascript"></script>
    <script src="../assets/fileupload/js/locales/es.js" type="text/javascript"></script>
    <script src="../assets/fileupload/themes/explorer-fa/theme.js" type="text/javascript"></script>
    <script src="../assets/fileupload/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            type="text/javascript"></script>


    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">

            <div class="navbar-header">

                <a class="navbar-brand" href="#"> Crear Transferencia </a>
            </div>

        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">


                        <form id="TypeValidation" class="form-horizontal"
                              action="../../Controlador/areacontroller.php?action=crear" method="post">
                            <div class="card-header card-header-text" data-background-color="blue">
                                <h4 class="card-title">Adjuntara archivo </h4>
                            </div>
                            <div class="card-content">

                                <!----------------------------- Consecutivo de liquidacion de la importacion----------------------------->
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Archivo Adjunto</label>
                                    <div class="col-sm-7">

                                        <input id="file-es" name="file-es[]" type="file">

                                    </div>
                                </div>


                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>

        $("#file-es").fileinput({
            language: 'es',
            theme: 'fa',
            showUpload: false,
            showCaption: false,
            uploadUrl: '../../Controlador/areacontroller.php?action=upload&id=<?php echo $_GET["id"]  ?>',
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            initialPreviewAsData: true,

        });

    </script>
    </html>

    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({
                language: "es"
            });
        });

    </script>

    <?php require("../theme/pie.php"); ?>
    <?php
} else {

    header('Location:../Inicio/Login');

} ?>
