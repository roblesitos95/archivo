

<?php require_once('../../modelo/areaclass.php');?>


<div class="card">


                            <form id="TypeValidation" class="form-horizontal" action="../../Controlador/seguridadcontroller.php?action=crear" method="post">
                                <div class="card-header card-header-text" data-background-color="blue">
                                    <h4 class="card-title">Informacion Basica</h4>
                                </div>
                                <div class="card-content">
                                    <div class="row">

                                        <!---------------------- Tipo de documento ---------------------------------->
                                        <div class="row">
                                           
                                            <div class="col-sm-10">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Tipo Documento </label>
                                                    <input type="text" name="documento" id="documento" class="form-control " required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <div id="patronaldiv" >
                                    <div class="row">
                                        
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating">
                                                <label class="control-label">N° patronal </label>
                                                <input type="text" name="Numero" id="Numero" class="form-control " value="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                    <!--------------------------------- descripcioin de la importacion------------------------------>
                                    <div class="row">

                                        
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Empresa Prestadora de Servicio</label>
                                                <input type="text" name="empresadeservicio" id="empresadeservicio" class="form-control " required="true" />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Empresa laboral</label>
                                                <input type="text" name="empresalaboral" id="empresalaboral" class="form-control " required="true" />
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
                                    <!--------------------------------- fecha de la importacion------------------------------>

                                    <div class="row">


                                        
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Ciudad</label>
                                                <input type="text" name="Ciudad" id="Ciudad" class="form-control " required="true"/>
                                            </div>
                                        </div>

                                    </div>

                                    <!----------------------------- Consecutivo de liquidacion de la importacion------------------------------>

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
                                    <!----------------------------- Consecutivo de pedido de la importacion------------------------------>

                                    <div class="row">


                                        
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Descripcion</label>
                                                <input type="text" class="form-control " required="true" id="Descripcion" name="Descripcion"  />

                                            </div>
                                        </div>

                                    </div>
                                    

                                </div>

                                <div class="card-footer text-center">
                                    <button class="btn btn-primary"  type="submit"  >
                                        <span style="font-size: 12px"> <i class="icon-rocket">  </i> Guardar</span>
                                    </button>
                                    <a href="ver_seguridad.php"> <button class="btn btn-danger"  type="button"  >
                                            <span style="font-size: 12px"><i class="icon-ban"></i> Cancelar</span>
                                        </button></a>
                                </div>
                            </form>
                        </div>