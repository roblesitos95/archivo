

    <div class="sidebar" data-active-color="purple" data-background-color="white"
         data-image="../assets/img/sidebar-4.jpg">

        <div class="logo">
            <img src="../assets/img/cliente52.jpg">
        </div>

        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img style="max-height: 50px; max-width: 50px" src="<?php echo $fot ?>"/>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                <?php echo $usu ?>
                                <b class="caret"></b>
                            </span>
                    </a>

                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="../../Controlador/sesioncontroller.php?accion=fin">
                                    <span class="sidebar-mini"><i class="icon-power-off"></i></span>

                                    <span class="sidebar-normal">Salir de sesion</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li id="index">
                    <a href="../Inicio/Salas">
                        <i class="icon-th-large"></i>
                        <p> Inicio
                            <b class=""></b>
                        </p>
                    </a>

                </li>

                <li>
                    <a data-toggle="collapse" href="#Prestamos">
                        <i class="icon-clipboard"></i>
                        <p> Prestamos
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="Prestamos">
                        <ul class="nav">
                            <li id="crearprestamos">
                                <a href="../Prestamos/crear">
                                    <span class="sidebar-mini"><i class="icon-upload2"></i></span>
                                    <span class="sidebar-normal">Crear Prestamos</span>
                                </a>
                            </li>
                            <li id="creardevolucion">
                                <a href="../Prestamos/devolver_<?php echo base64_encode("prestados") ?>">
                                    <span class="sidebar-mini"><i class="icon-download2"></i></span>
                                    <span class="sidebar-normal">Crear Devoluciones</span>
                                </a>
                            </li>
                            <li id="verprestamos">
                                <a href="../Prestamos/devolver_<?php echo base64_encode("todos") ?>">
                                    <span class="sidebar-mini"><i class="icon-inbox"></i></span>
                                    <span class="sidebar-normal">Ver Devueltos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#lol">
                        <i class="icon-suitcase"></i>
                        <p>Trasferencia
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="lol">
                        <ul class="nav">
                            <li id="creararea">
                                <a href="../Trasferencia/Crear">
                                    <span class="sidebar-mini"><i class="icon-save"></i></span>
                                    <span class="sidebar-normal">Crear Transferencia</span>
                                </a>
                            </li>
                            <li id="verarea">
                                <a href="../Trasferencia/Ver">
                                <span class="sidebar-mini"><i class="icon-list"></i></span>
                                <span class="sidebar-normal">Ver listado</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <hr style="border: 1px solid #e1e0df;
                 width:90%;
   border-radius: 100px /8px;
   height: 0px;
   text-align: center; ">

            <ul class="nav">

                <!--                 menu para Cert Desintregracion              -->

                <li>
                    <a data-toggle="collapse" href="#certidesen">
                        <i class="icon-truck"></i>
                        <p> Cert. Desintegracion
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="certidesen">
                        <ul class="nav">
                            <li id="vercerticha">
                                <a href="../Documentos/Chatarrizacion">
                                    <span class="sidebar-mini"><i class="icon-list"></i></span>
                                    <span class="sidebar-normal">Ver listado</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--                 menu para Contratos              -->

                <li>
                    <a data-toggle="collapse" href="#contratos">
                        <i class="icon-handshake-o"></i>
                        <p> Contratos
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="contratos">
                        <ul class="nav">
                            <li id="vercontratos">
                                <a href="../Documentos/Contratos">
                                    <span class="sidebar-mini"><i class="icon-list"></i></span>
                                    <span class="sidebar-normal">Ver Contratos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--                 menu para Documento contable------------------>

                <li>
                    <a data-toggle="collapse" href="#contable">
                        <i class="icon-credit-card-alt"></i>
                        <p> Documento Contable
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="contable">
                        <ul class="nav">
                            <li id="vercontable">
                                <a href="../Documentos/Contables">
                                    <span class="sidebar-mini"><i class="icon-list"></i></span>
                                    <span class="sidebar-normal">Ver Doc. contables</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--                 menu para Escrituras ------------------>

                <li>
                    <a data-toggle="collapse" href="#escrituras">
                        <i class="icon-industry"></i>
                        <p> Escrituras
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="escrituras">
                        <ul class="nav">
                            <li id="verescrituras">
                                <a href="../Documentos/Escrituras">
                                    <span class="sidebar-mini"><i class="icon-list"></i></span>
                                    <span class="sidebar-normal">Ver Escrituras</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--                 menu para Facturas ------------------>

                <li>
                    <a data-toggle="collapse" href="#Facturas">
                        <i class="icon-shopping-cart"></i>
                        <p> Facturas
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="Facturas">
                        <ul class="nav">
                        <ul class="nav">
                            <li id="verfactura">
                                <a href="../Documentos/Facturas">
                                    <span class="sidebar-mini"><i class="icon-list"></i></span>
                                    <span class="sidebar-normal">Ver Facturas</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--                 menu para Historias laborales------------------>

                <li>
                    <a data-toggle="collapse" href="#laborales">
                        <i class="icon-id-badge"></i>
                        <p> Historial Laborales
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="laborales">
                        <ul class="nav">
                            <li id="verlaborales">
                                <a href="../Documentos/HHLL">
                                    <span class="sidebar-mini"><i class="icon-list"></i></span>
                                    <span class="sidebar-normal">Ver Historias Laborales</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--                 menu para Importaciones              -->

                <li>
                    <a data-toggle="collapse" href="#comercioexterior">
                        <i class="icon-coin-dollar"></i>
                        <p> Importaciones
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="comercioexterior">
                        <ul class="nav">
                            <li id="verimport">
                                <a href="../Documentos/Importaciones">
                                    <span class="sidebar-mini"><i class="icon-list"></i></span>
                                    <span class="sidebar-normal">Ver Importacioes</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <!--                 menu para impuestos              -->

                <li>
                    <a data-toggle="collapse" href="#impuestos">
                        <i class="icon-money"></i>
                        <p> Impuestos
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="impuestos">
                        <ul class="nav">
                            <li id="verimpuestos">
                                <a href="../Documentos/Impuestos">
                                    <span class="sidebar-mini"><i class="icon-list"></i></span>
                                    <span class="sidebar-normal">Ver Impuestos</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <!--                 menu para  seguridad social               -->

                <li>
                    <a data-toggle="collapse" href="#seguridad">
                        <i class="icon-universal-access"></i>
                        <p> Seguridad Social
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="seguridad">
                        <ul class="nav">
                            <li id="versocial">
                                <a href="../Documentos/Seguridadsocial">
                                    <span class="sidebar-mini"><i class="icon-list"></i></span>
                                    <span class="sidebar-normal">Ver Seguridad Social</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--                 menu para  informe de entrada -->

                <li>
                    <a data-toggle="collapse" href="#infoentrada">
                        <i class="icon-linode"></i>
                        <p> Info. Entrada
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="infoentrada">
                        <ul class="nav">
                            <li id="verinforme">
                                <a href="../Documentos/InformeEntrada">
                                    <span class="sidebar-mini"><i class="icon-list"></i></span>
                                    <span class="sidebar-normal">Ver Info. Entrada</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--                 menu para  libros oficiales               -->

                <li>
                    <a data-toggle="collapse" href="#libroentrada">
                        <i class="icon-book"></i>
                        <p> Libro Oficial
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="libroentrada">
                        <ul class="nav">
                            <li id="verlibro">
                                <a href="../Documentos/libroOficiales">

                                    <span class="sidebar-mini"><i class="icon-list"></i></span>
                                    <span class="sidebar-normal">Ver Libro Oficial</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>

            <br>
            <br>

        </div>
    </div>


    <div class="main-panel">
