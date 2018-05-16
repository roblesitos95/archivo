

<?php require_once('../../modelo/areaclass.php');?>

    <script>
         function text() {
             var x = document.getElementById("Tipo").value;

             if (x == "Otros"){
                 swal({
                     title: 'Tipo de Factura',
                     html: '<div class="form-group">' +
                     '<input id="input-field" name="Tipo2" type="text" class="form-control"/>' +
                     '</div>',
                     showCancelButton: true,
                     confirmButtonClass: 'btn btn-primary',
                     cancelButtonClass: 'btn btn-danger',
                     buttonsStyling: false

                 }).then(function(result) {
                     var porId= $('#input-field').val();
                     document.getElementById("Tipo2").value = porId;
                 }).catch(swal.noop)
             }
         }

    </script>

    <div class="card">
        <form id="TypeValidation" class="form-horizontal" action="../../Controlador/facturacontroller.php?action=crear" method="post">
            <div class="card-header card-header-text" data-background-color="blue">
                <h4 class="card-title">Facturas</h4>
            </div>

            <div class="card-content">

                <!---------------------- Nombre de la carpeta ---------------------------------->

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Numero de Factura</label>
                            <input class="form-control" type="text" name="Numero" id="Numero" required="true" />
                        </div>
                    </div>
                </div>

                <!--------------------------------- descripcioin de la importacion------------------------------>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Titular</label>
                            <input class="form-control" type="text" name="Titular" id="Titular" required="true" />
                        </div>
                    </div>
                </div>

                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">NIT</label>
                            <input type="text" class="form-control" required="true" id="NIT" name="NIT"  />
                        </div>
                    </div>
                </div>

                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Tipo</label>
                            <select class="form-control" required="true" name="Tipo" id="Tipo" onchange="text()" >
                                <option value=""></option>
                                <option value="Compra">Compra</option>
                                <option value="Servicio">Servicio</option>
                                <option value="Venta">Venta</option>
                                <option value="Chatarra">Chatarra</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: none">
                    <label class="col-sm-2 label-on-left">Documento Contable</label>
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label"></label>
                            <input type="hidden" name="Tipo2" id="Tipo2" />
                        </div>
                    </div>
                </div>

                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Documento Contable</label>
                            <input type="text" class="form-control " required="true" name="Contable" id="Contable" />
                        </div>
                    </div>
                </div>

                <!--------------------------------- fecha de la importacion------------------------------>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label class="control-label">Fecha</label>
                                        <input type="text" name="Fecha" id="Fecha" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date("Y-m-d"); ?> " />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <?php echo areaclass::selectarea("Area","Area","form-control")  ?>
                        </div>
                    </div>
                </div>

                <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripcion</label>
                            <textarea class="form-control " required="true" id="Descripcion" name="Descripcion" ></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer text-center">
                <button class="btn btn-primary hvr-float "  type="submit"  >
                    <span style="font-size: 15px"><i class="icon-rocket">  </i></span>Guardar
                </button>
                <a href=""> <button class="btn btn-danger hvr-float "  type="reset"  >
                        <span style="font-size: 15px"><i class="icon-refresh">  </i></span> Cancelar
                    </button></a>
            </div>
        </form>
    </div>
