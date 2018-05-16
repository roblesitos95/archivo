
<?php
session_start();
if(isset($_SESSION['sesion'])){

    require("../theme/head.php");
    require("../theme/menuizquierdo.php");?>


    <script>
        window.onload=function() {
            var element = document.getElementById("index");
            element.classList.add("active");
        }
    </script>

    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"> Crear Documento Contable</a>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <?php
                $con = mysqli_connect('localhost','root','','bd_documentacion');

                if (!$con) {
                    die('Error no se pudo conectar : ' . mysqli_error($con));
                }

                mysqli_select_db($con,"ajax_demo");
                $sql="SELECT * FROM `salas` ORDER BY `salas`.`Nombre` ASC";
                $con->set_charset("utf8");
                $result = mysqli_query($con,$sql);

                while($row = mysqli_fetch_array($result)) {
                    $Nombre= $row['Nombre'];
                    $id= $row['idSalas'];
                    $id2= $row['foto'];
                    $descrpion=$row['descripcion'];
                    ?>

                    <div class="col-md-4 animated zoomIn">
                        <div class="card card-product">
                            <div class="card-image" data-header-animation="true">
                                <img class="img"  src="<?php echo $id2?>">
                            </div>

                            <div class="card-content">
                                <div class="card-actions">

                                    <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out fix-broken-card">
                                        <i class="ion-refresh"></i>
                                    </button>

                                    <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Ver mas">
                                        <a href="verfilas.php?s=<?php echo base64_encode($id); ?>"><i class="icon-list-alt"></i></a>
                                    </button>

                                    <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom"  id="myBtn" title="Editar" onclick="descirp(<?php echo $id; ?>)">
                                        <i class="icon-pencil2"></i>
                                    </button>
                                </div>

                                <h4 class="card-title">
                                    <a href="#pablo"><?php echo $Nombre ?></a>
                                </h4>

                                <div class="card-description">
                                    <?php echo $descrpion; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }?>
            </div>

            <script>
                function descirp(id) {

                    swal({
                        title: 'Descricion de la sala',
                        html: '<div class="form-group">' +
                        '<input id="input-field" name="Tipo2" type="text" class="form-control"/>' +
                        '</div>',
                        showCancelButton: true,
                        confirmButtonClass: 'btn btn-primary',
                        cancelButtonClass: 'btn btn-danger',
                        buttonsStyling: false

                    }).then(function(result) {
                        var datas={
                            "desc":$('#input-field').val(),
                            "id":id,
                        };

                        $.ajax({
                            data:datas,
                            url:'../../Controlador/Ubicacion_controller.php?action=desc',
                            type:'POST',
                            dataType:'JSON',
                            success: function (res) {
                                alert("si o no "+res);
                            }
                        });
                    }).catch(swal.noop)
                }
            </script>

<?php require("../theme/pie.php");?>
<?php  }
else{
header('Location: ../index/index');

} ?>