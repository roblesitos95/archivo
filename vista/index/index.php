<!doctype html>
<html lang="es">

<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Nov 2017 01:15:02 GMT -->
<head> <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../index/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../index/assets//img/ICONO.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,  chrome=1" />
    <title>Archivo Permanente</title>
    <meta content='width=device-width,   initial-scale=1.0,   maximum-scale=1.0,   user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Twitter Card data -->

    <!-- Bootstrap core CSS     -->
    <link href="../index/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../index/assets/css/material-dashboard5438.css?v=1.2.0" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link  href="../assets/lol2/demo-files/demo.css">
    <link rel="stylesheet"  href="../index/assets/lol2/fonts/style.css">

    <link rel="stylesheet"  href="../index/assets/css/stylebutton.css">
    <link rel="stylesheet"  href="../index/assets/css/hoverbutton.css">

    <!--  estyle animate -->
    <link rel="stylesheet" href="../index/assets/css/animate.css">
    <!-- Finally you need to add one of the following classes:

    Class Name {bounce,   flash,   pulse,   rubberBand,   shake,   headShake,   swing,   tada,   wobble,   jello,   bounceIn,   bounceInDown,   bounceInLeft
    bounceInRight,   bounceInUp,   bounceOut,   bounceOutDown,   bounceOutLeft,   bounceOutRight,   bounceOutUp,   fadeIn,   fadeInDown,   fadeInDownBig
    fadeInLeft,   fadeInLeftBig,   fadeInRight,   fadeInRightBig,   fadeInUp,   fadeInUpBig,   fadeOut,   fadeOutDown,   fadeOutDownBig,   fadeOutLeft
    fadeOutLeftBig,   fadeOutRight,   fadeOutRightBig,   fadeOutUp,   fadeOutUpBig,   flipInX,   flipInY,   flipOutX,   flipOutY,   lightSpeedIn,   lightSpeedOut
    rotateIn,   rotateInDownLeft,   rotateInDownRight,   rotateInUpLeft,   rotateInUpRight,   rotateOut,   rotateOutDownLeft,   rotateOutDownRight
    rotateOutUpLeft,   rotateOutUpRight,   hinge,   jackInTheBox,   rollIn,   ollOut,   zoomIn,   zoomInDown,   zoomInLeft,   zoomInRight,   zoomInUp,   oomOut
    zoomOutDown,   zoomOutLeft,   zoomOutRight,   zoomOutUp,   slideInDown,   slideInLeft,   slideInRight,   slideInUp,   slideOutDown,   slideOutLeft
    slideOutRight,   slideOutUp }

    -->


</head>

<body>
<div class="wrapper wrapper-full-page">
    <div class=" login-page" filter-color="black" data-image="../index/assets/img/diaco.JPG">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 animated zoomInDown  ">
                        <form class="" method="post" action="../../Controlador/sesioncontroller.php?accion=inicio">
                            <div class="card  card-login  ">
                                <div class="card-header text-center" data-background-color="blue">
                                    <h4 class="card-title ">Inicio de Sesión</h4>

                                </div>

                                <p class="category text-center">
                                   Ingresa usuario y contraseña
                                </p>

                                <div class="card-content">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="font-size: 20px">
                                            <i class="icon-user-circle"></i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Usuario</label>
                                            <input type="text" name="email" class="form-control">
                                        </div>

                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon " style="font-size: 22px">
                                            <i class="icon-lock"></i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Contraseña</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-primary btn-simple btn-wd btn-lg">Iniciar sesion</button>
                                </div>

                            </div>
                            <a href="registrer"><p class="text-info text-right" >Registro Usuario</p></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<!--   Core JS Files   -->
<script src="../index/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../index/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../index/assets/js/material.min.js" type="text/javascript"></script>
<script src="../index/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Library for adding dinamically elements -->
<script src="../index/assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../index/assets/js/jquery.validate.min.js"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../index/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="js/jquery.sharrre.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../index/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../index/assets/js/material-dashboard5438.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../index/assets/js/demo.js"></script>

<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();
        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Nov 2017 01:15:06 GMT -->
</html>