<!doctype html>
<html lang="es">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Nov 2017 01:16:44 GMT -->
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/ICONO.ico"/>
    <link rel="icon" type="image/png" href="../assets/img/ICONO.ico"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Archivo General</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <!-- Canonical SEO -->
    <link rel="canonical" href="http://www.creative-tim.com/product/material-dashboard-pro"/>
    <!--  Social tags      -->
    <meta name="keywords"
          content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
    <meta name="description"
          content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description"
          content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content="s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta name="twitter:description"
          content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro"/>
    <meta property="og:image" content="s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg"/>
    <meta property="og:description"
          content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design."/>
    <meta property="og:site_name" content="Creative Tim"/>
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard5438.css?v=1.2.0" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link href="maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>


<body>

<div class="wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-6 col-md-offset-3">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="blue" id="wizardProfile">
                        <form action="../../Controlador/sesioncontroller.php?accion=registrar" method="post"
                              enctype="multipart/form-data">
                            <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                    Crea tu perfil
                                </h3>
                                <h5>Ingresa los siguientes datos </h5>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li>
                                        <a href="#about" data-toggle="tab">Acerca de ti </a
                                    </li>

                                    <a href="#account" data-toggle="tab">Seguridad</a>
                                    </li>
                                    <li>
                                        <a href="#address" data-toggle="tab">Seguridad</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <h4 class="info-text"> empecemos con infomacion basica (contiene
                                            validacion)</h4>
                                        <div class="col-sm-4 col-sm-offset-1">

                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="../assets/img/default-avatar.png" class="picture-src"
                                                         id="wizardPicturePreview" title=""/>
                                                    <input type="file" id="wizard-picture" name="Foto"
                                                           accept="image/jpeg, image/png" required>
                                                </div>
                                                <h6>Selecciona tu foto</h6>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nombres
                                                        <small>(requerido)</small>
                                                    </label>
                                                    <input name="firstname" id="firstname" type="text"
                                                           class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">record_voice_over</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Apellidos
                                                        <small>(requerido)</small>
                                                    </label>
                                                    <input name="lastname" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">sentiment_very_satisfied</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Documento
                                                        <small>(requerido)</small>
                                                    </label>
                                                    <input name="documento" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>

                                                <div class="form-group label-floating">
                                                    <label class="control-label">Usua
                                                </div>

                                                <div class="tab-pane" id="account">
                                                    <div class=row">
                                                        <div class="col-sm-12">
                                                            <h4 class="info-text">
                                                                Tu SEGURIDAD es muy importante por favor ingresa los
                                                                siguientes datos
                                                            </h4>
                                                        </div>

                                                        <div class="col-sm-10 col-sm-offset-1">
                                                            <small>
                                                                <p>Por favor ingresa una contraseña</p>
                                                            </small>
                                                            <br>

                                                            <div class="form-group label-floating">
                                                                <label class="control-label">
                                                                    Contraseña
                                                                </label>
                                                                <input class="form-control" name="min"
                                                                       id="registerPassword">

                                                                <div class="form-group label-floating">
                                                                    <label class="control-label">Confirmar
                                                                        Contraseña</label>
                                                                    <input class="form-control"
                                                                           name="password_confirmation"
                                                                           id="registerPasswordConfirmation"
                                                                           type="password" required="true"
                                                                           equalTo="#registerPassword"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="address">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h4 class="info-text">para mayor seguridad escriba una
                                                                    pregunta y su respectiva respuesta</h4>
                                                            </div>


                                                            <div class="col-sm-10 col-sm-offset-1">
                                                                <br>
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label">Pregunta</label>
                                                                    <input type="text" class="form-control"
                                                                           name="pregunta" onblur="mayus(this);">
                                                                    <span class="help-block">Omita los signos de interrogacion :D</span>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-10 col-sm-offset-1 ">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label">Respuesta</label>
                                                                    <input type="text" class="form-control"
                                                                           name="respuesta" onblur="mayus(this);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="wizard-footer">
                                                    <div class="pull-right">
                                                        <button type='button'
                                                                class='btn btn-next btn-fill btn-primary btn-wd'
                                                                name='next'><i class="material-icons">navigate_next</i>Siguente
                                                        </button>
                                                        <button type='submit'
                                                                class='btn btn-finish btn-fill btn-primary btn-wd'
                                                                name='finish'><i class="material-icons">save</i>Finalizar
                                                        </button>
                                                    </div>

                                                    <div class="pull-left">
                                                        <button type='button'
                                                                class='btn btn-previous btn-fill btn-default btn-wd'
                                                                name='previous'><i class="material-icons">navigate_before</i>Anterior
                                                        </button>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                </div>

                        </form>
                    </div>

                </div>
                <!-- wizard container -->
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <p class="copyright pull-right">
                Creado por Andres Camilo Escobar Robles
                <br>
                <small>Aprendiz SENA 2017</small>
            </p>
        </div>
    </footer>
</div>

</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Library for adding dinamically elements -->
<script src="../assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../assets/js/jquery.validate.min.js"></script>
<!-- Promise Library for SweetAlert2 working on IE -->
<script src="../assets/js/es6-promise-auto.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../assets/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../assets/js/jquery.sharrre.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="../assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard5438.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        demo.initMaterialWizard();
        setTimeout(function () {
            $('.card.wizard-card').addClass('active');
        }, 600);
    });

    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Nov 2017 01:16:44 GMT -->
</html>