<?php

require_once('../modelo/archivo_class.php');

require_once("../modelo/areaclass.php");

//recibir una accion y enviarla al menu
if (! empty($_GET['action'])) {
    Ubicacion_controller::main($_GET['action']);
} else {
    echo "NO hay accion";
}

class Ubicacion_controller
{
    static function main($action)
    {
        if ($action == "Estante") {
            Ubicacion_controller::Estante();
        } elseif ($action == "newe") {
            Ubicacion_controller::newe();
        } elseif ($action == "addestan") {
            Ubicacion_controller::addestan();
        } elseif ($action == "baldas") {
            Ubicacion_controller::baldas();
        } elseif ($action == "addbaldas") {
            Ubicacion_controller::addbaldas();
        } elseif ($action == "am") {
            Ubicacion_controller::am();
        } elseif ($action == "addam") {
            Ubicacion_controller::addam();
        } elseif ($action == "desc") {
            Ubicacion_controller::desc();
        } elseif ($action == "tipo") {
            Ubicacion_controller::ver();
        } elseif ($action == "archivo") {
            Ubicacion_controller::archivo();
        }
    }

    //motodo para crear una nueva fila
    private static function Estante()
    {
        //Obtenemos los valores por metodo post
        $fila = $_POST["sala"];
        $topo = $_POST["sala_fila"];

        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');

        if (! $con) {
            die('Error no se pudo conectar : '.mysqli_error($con));
        }

        mysqli_select_db($con, "ajax_demo");
        $a = "<h4 class=\"card-title\" id=\"caraA\"> 
                     <a onclick=\"addestan('caraA', ".$topo.");\">                   
                                                                       <span class=\" btn btn-primary\" ><i class=\"icon-plus\"> Agregar estante </i></span>
                    </a> 
            </h4>";

        $topo1 = $topo + 1;

        $b = "<h4 class=\"card-title\" id=\"carab\">
                    <a onclick=\"addestan('carab',".$topo1.");\">                   
                    <span class=\" btn btn-primary\" ><i class=\"icon-plus\"> Agregar estante </i></span>
                    </a> 
            </h4>";

        /*  $sql="SELECT sala_fila. ,fila_estante.Estante_idEstante FROM fila_estante WHERE fila_estante.sala_fila_idsala_fila=".$fila;
          $con->set_charset("utf8");
          $result2 = mysqli_query($con,$sql);

          while($row1 = mysqli_fetch_array($result2)) {

              $idestante=$row1["Cara_Estante_idCara_Estante"];
  */
        $sql = "SELECT fila_estante.idfila_estante, estante.idEstante, estante.Nombre FROM fila_estante LEFT JOIN estante ON fila_estante.Estante_idEstante = estante.idEstante WHERE fila_estante.sala_fila_idsala_fila=".$topo;
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {

            $Nombre = $row['Nombre'];
            $fila_estante = $row['idfila_estante'];
            if ($Nombre == "") {

            } else {
                $a .= ' 
                            <div class="col-lg-3 col-md-6 col-sm-6 animated fadeIn">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <span style="font-size: 12px"><i class="icon-tags"></i></span>
                                </div>
                                <div class="card-content">
                                    <p class="category"></p>
                                    <h3 class="card-title">'.$Nombre.'</h3>
                                </div>
                                <div class="card-footer">
                                    <button type="button"
                                    onclick="showbaldas('.$fila_estante.')"
                                                                    rel="tooltip" title="Ver Baldas"
                                                                    class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                                <span style="font-size: 10px"><i class="icon-table"></i> ver Baldas</span>
                                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>';
            }
        }

        $selecet = "SELECT fila_estante.idfila_estante, estante.idEstante, estante.Nombre FROM fila_estante LEFT JOIN estante ON fila_estante.Estante_idEstante = estante.idEstante WHERE fila_estante.sala_fila_idsala_fila=".$topo1;

        $con->set_charset("utf8");
        $estantes = mysqli_query($con, $selecet);

        while ($row2 = mysqli_fetch_array($estantes)) {
            $Nombre = $row2['Nombre'];
            $fila_estante = $row2['idfila_estante'];
            if ($Nombre == "") {

            } else {
                $b .= '<div class="col-lg-3 col-md-6 col-sm-6 animated fadeIn">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <span style="font-size: 12px"><i class="icon-tags"></i></span>
                                </div>
                                <div class="card-content">
                                    <p class="category"></p>
                                    <h3 class="card-title">'.$Nombre.'</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       <button type="button"
                                    onclick="showbaldas('.$fila_estante.')"
                                                                    rel="tooltip" title="Ver Baldas"
                                                                    class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                                                <span style="font-size: 10px"><i class="icon-table"></i> ver Baldas</span>
                                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>';
            }
        }

        $arr = ["0" => $a, "1" => $b];

        /*
            }*/
        mysqli_close($con);

        echo json_encode($arr);
    }

    // metodo para mostrar los estantes
    private static function newe()
    {
        //optenemos la Sala en done se va a agregar la fila
        session_start();
        $fila = $_SESSION["ubi"];
        $fi = $fila["Sala"];

        //iniciamos la conexion
        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (! $con) {
            die('Error no se pudo conectar : '.mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");

        //creamos y ejecutamos la query
        $sql = "SELECT MAX(Filas_idFilas) FROM sala_fila where Salas_idSalas=".$fi;
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);

        //recorremos el result de la query
        while ($row = mysqli_fetch_array($result)) {
            //Obtenemos la maxima fil en la sala
            $max = $row['MAX(Filas_idFilas)'];
        }

        $id = 0;
        //sumamos una fila y hacemos el insert
        $max += 1;
        for ($i = 1; $i < 3; $i++) {
            $sqlinsert = 'INSERT INTO sala_fila (Salas_idSalas, Filas_idFilas,Cara_idCara)VALUES('.$fi.','.$max.','.$i.')';
            mysqli_query($con, $sqlinsert);
            $id = mysqli_insert_id($con);
        }

        //obtnemos la ID del ultimo insert para agregarlo

        $id = $id - 1;
        $select = "SELECT sala_fila.idsala_fila, filas.idFilas, filas.Nombre FROM sala_fila LEFT JOIN filas ON sala_fila.Filas_idFilas = filas.idFilas WHERE sala_fila.idsala_fila=".$id." GROUP BY sala_fila.Filas_idFilas";
        $con->set_charset("utf8");
        $result = mysqli_query($con, $select);

        //rcoremos el resultado de
        while ($row = mysqli_fetch_array($result)) {
            $Nombre = $row['Nombre'];
            $id = $row['idFilas'];
            $id2 = $row['idsala_fila'];

            //Creamos la vista para enviar como respuesta
            $L = "<div id=\"".$id."\"  class=\"col-md-4 animated zoomInUp\">
                <li class=\"fil\">
                    <header class=\"cd-pricing-header\">
                        <h2>".$Nombre."</h2>
                    </header>
                    <br>
                    <footer class=\"cd-pricing-footer\"> 
                         <a onclick=\"showini(".$id.",".$id2.")\" class=\"hvr-curl-bottom-right\" href=\"#0\">Contenido</a>
                    </footer> 
                </li>
            </div>";
        }
        //cerramos la conexion
        mysqli_close($con);

        //respondemos unccriptando en JSON para que javaScript lo detecte de una manera correcta
        echo json_encode($L);
    }

    //metodo para crear nuevos estantes
    private static function addestan()
    {
        $fila = $_POST["fila"];
        //iniciamos la conexion
        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (! $con) {
            die('Error no se pudo conectar : '.mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");

        //creamos y ejecutamos la query
        $sql = "SELECT MAX(Estante_idEstante) FROM fila_estante where fila_estante.sala_fila_idsala_fila=".$fila;
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);

        //recorremos el result de la query
        while ($row = mysqli_fetch_array($result)) {
            //Obtenemos la maxima fil en la sala
            $max = $row['MAX(Estante_idEstante)'];
        }

        $id = 0;
        //sumamos una fila y hacemos el insert
        $max += 1;

        $sqlinsert = 'INSERT INTO fila_estante ( sala_fila_idsala_fila, Estante_idEstante)VALUES('.$fila.','.$max.')';
        mysqli_query($con, $sqlinsert);
        $id = mysqli_insert_id($con);

        //obtnemos la ID del ultimo insert para agregarlo

        $select = "SELECT fila_estante.idfila_estante, estante.idEstante, estante.Nombre FROM fila_estante LEFT JOIN estante ON fila_estante.Estante_idEstante = estante.idEstante WHERE fila_estante.idfila_estante=".$id;
        $con->set_charset("utf8");
        $result = mysqli_query($con, $select);

        //rcoremos el resultado de
        while ($row = mysqli_fetch_array($result)) {
            $Nombre = $row['Nombre'];
            $fila_estante = $row['idfila_estante'];

            //Creamos la vista para enviar como respuesta
            $L = '<div class="col-lg-3 col-md-6 col-sm-6 animated fadeIn">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <span style="font-size: 12px"><i class="icon-tags"></i></span>
                                </div>
                                <div class="card-content">
                                    <p class="category"></p>
                                    <h3 class="card-title">'.$Nombre.'</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                     <button type="button"
                                      onclick="showbaldas('.$fila_estante.')"
                                      rel="tooltip" title="Ver Baldas"
                                      class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                      <span style="font-size: 10px"><i class="icon-table"></i> ver Baldas</span>
                                     </button>
                                    </div>
                                </div>
                            </div>
                        </div>';
        }
        //cerramos la conexion
        mysqli_close($con);

        //respondemos unccriptando en JSON para que javaScript lo detecte de una manera correcta
        echo json_encode($L);
    }

    //metodo paa mostrar las baldas
    private static function baldas()
    {
        $balda = $_POST["id"];
        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (! $con) {
            die('Error no se pudo conectar : '.mysqli_error($con));
        }

        mysqli_select_db($con, "ajax_demo");

        $sql = "SELECT estante_balda.idestante_balda,estante_balda.fila_estante_idfila_estante, balda.idBalda, balda.Nombre FROM estante_balda LEFT JOIN balda ON estante_balda.Balda_idBalda = balda.idBalda WHERE estante_balda.fila_estante_idfila_estante=".$balda;
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);
        $res = "<h4>Listado de Baldas</h4>";

        while ($row = mysqli_fetch_array($result)) {
            $nombre = $row["Nombre"];
            $idestante = $row["fila_estante_idfila_estante"];
            $idestantebalda = $row["idestante_balda"];

            $res .= '<div class="col-lg-3 col-md-6 col-sm-6 animated flipInX"  >
                        <div class="card card-stats">

                        <a  href="#pill2" data-toggle="tab" onclick="showam('.$idestantebalda.')" class="btn btn-xs btn-primary">
                        <div class="card-content"  >
                            <p class="category"></p>
                            <h3 class="text-center">'.$nombre.'</h3>
                        </div></a>

                    </div>
                </div>  ';
        }
        $res .= ' <div class="col-lg-3 col-md-6 col-sm-6 animated fadeIn"  id="addbalda" >
                        <div class="card card-stats">

                        <div class="card-content" >
                            <a  onclick="addbalda('.$balda.')">
                                <span class="btn btn-primary" ><i class="icon-plus"> Agregar balda </i></span>
                            </a>
                        </div>

                    </div>
                </div>';
        echo json_encode($res);
    }

    //metodo para crear nuevas baldas
    private static function addbaldas()
    {
        $fila = $_POST["fila"];
        //iniciamos la conexion
        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (! $con) {
            die('Error no se pudo conectar : '.mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");

        //creamos y ejecutamos la query
        $sql = "SELECT MAX(Balda_idBalda) FROM estante_balda where estante_balda.fila_estante_idfila_estante=".$fila;
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);

        //recorremos el result de la query
        while ($row = mysqli_fetch_array($result)) {
            //Obtenemos la maxima fil en la sala
            $max = $row['MAX(Balda_idBalda)'];
        }

        $id = 0;
        //sumamos una fila y hacemos el insert
        $max += 1;

        $sqlinsert = 'INSERT INTO estante_balda( fila_estante_idfila_estante, Balda_idBalda)VALUES('.$fila.','.$max.')';
        mysqli_query($con, $sqlinsert);
        $id = mysqli_insert_id($con);

        //obtnemos la ID del ultimo insert para agregarlo

        $select = "SELECT estante_balda.idestante_balda, balda.idBalda, balda.Nombre FROM estante_balda LEFT JOIN balda ON estante_balda.Balda_idBalda = balda.idBalda WHERE estante_balda.idestante_balda=".$id;
        $con->set_charset("utf8");
        $result = mysqli_query($con, $select);

        //rcoremos el resultado de
        while ($row = mysqli_fetch_array($result)) {
            $nombre = $row["Nombre"];
            $idestante = $row["idBalda"];
            $idestantebalda = $row["idestante_balda"];

            //Creamos la vista para enviar como respuesta
            $L = "<div class=\"col-lg-3 col-md-6 col-sm-6 animated fadeIn\"  >
                        <div class=\"card card-stats\">

                               <a  href=\"#pill2\" data-toggle=\"tab\" onclick=\"showam(".$idestantebalda.")\" class=\"btn btn-xs btn-primary\"><div class=\"card-content\"  >
                            <p class=\"category\"></p>
                            <h3 class=\"text-center\">".$nombre."</h3>
                        </div></a>

                    </div>
                </div>  ";
        }
        //cerramos la conexion
        mysqli_close($con);

        //respondemos unccriptando en JSON para que javaScript lo detecte de una manera correcta
        echo json_encode($L);
    }

    //metodo para mostar los archivos modulares
    private static function am()
    {
        $balda = $_POST["balda"];
        //iniciamos la conexion
        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (! $con) {
            die('Error no se pudo conectar : '.mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");

        $sql = "SELECT balda_am.idbalda_am, balda_am.am, balda_am.estante_balda_idestante_balda FROM balda_am WHERE balda_am.estante_balda_idestante_balda=".$balda;
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);
        $res = '<h4>Archivos modulares</h4>';

        while ($row = mysqli_fetch_array($result)) {
            $nombre = $row["am"];
            $idestante = $row["idbalda_am"];
            $idestantebalda = $row["estante_balda_idestante_balda"];

            $res .= '<div class="col-lg-3 col-md-6 col-sm-6 animated flipInX"  >
                        <div class="card card-stats">

                     <a  href="#pill3" onclick="showarchivos('.$idestante.')" data-toggle="tab" class="btn btn-xs btn-primary">
                        <div class="card-content"  >
                            <p class="category"></p>
                            <h3 class="text-center">  '.$nombre.'</h3>
                        </div>
                        </a>

                    </div>
                </div>';
        }
        $res .= '<div class="col-lg-3 col-md-6 col-sm-6 animated flipInX" id="btnadd">
                        <div class="card card-stats">

                        <a onclick="addam('.$balda.');" class="btn btn-xs btn-primary">
                        <div class="card-content"  >
                            <p class="category"></p>
                            <h3 class="text-center"><i class="icon-plus"> Agregar</i></h3>
                        </div>
                        </a>
                    
                    </div>
                </div>';
        echo json_encode($res);
    }

    //metodo para mostar los archivos modulares
    private static function addam()
    {
        $numero = $_POST["numero"];
        $balda = $_POST["balda"];
        //iniciamos la conexion
        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (! $con) {
            die('Error no se pudo conectar : '.mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");

        $sqlinsert = 'INSERT INTO balda_am( am, estante_balda_idestante_balda)VALUES("'.$numero.'",'.$balda.')';
        mysqli_query($con, $sqlinsert);
        $id = mysqli_insert_id($con);

        $sql = "SELECT balda_am.idbalda_am, balda_am.am, balda_am.estante_balda_idestante_balda FROM balda_am WHERE balda_am.idbalda_am=".$id;
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $nombre = $row["am"];
            $idestante = $row["idbalda_am"];
            $idestantebalda = $row["estante_balda_idestante_balda"];

            $res = '<div class="col-lg-3 col-md-6 col-sm-6 animated flipInX"><div class="card card-stats"><a  class="btn btn-xs btn-primary"><div class="card-content"  ><p class="category"></p><h3 class="text-center">'.$nombre.'</h3></div></a></div></div>';
        }

        echo json_encode($res);
    }

    //motodo para editar descripcion
    private static function desc()
    {

        $id = $_POST["id"];
        $desc = $_POST["desc"];
        //iniciamos la conexion
        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (! $con) {
            die('Error no se pudo conectar : '.mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");

        $sql = 'UPDATE salas  SET descripcion = "'.$desc.' "WHERE `salas`.`idSalas` = '.$id;
        $con->set_charset("utf8");
        mysqli_query($con, $sql);
        echo "hola";
    }

    // metodo que devueve la url paralavista del formulario
    private static function ver()
    {
        session_start();

        $tipo = $_POST["doc"];
        $balda = $_POST["balda"];

        switch ($tipo) {
            //certificado de desintegracion
            case "Cert_Desintegracion":
                echo '../cert_desintegracion/Crear_Desintegracion.php?balda='.$balda;
                break;
            //Contratos
            case "Contratos":
                echo '../Contratos/crear_contratos.php?balda='.$balda;
                break;
            //documentos contables
            case "Documento_Contable":
                echo '../contables/crear_contable.php?balda='.$balda;
                break;
            //Escrituras
            case "Escrituras":
                echo '../Escrituras/crear_escrituras.php?balda='.$balda;
                break;
            //Facturas
            case "Facturas":
                echo '../facturas/crear_factura.php?balda='.$balda;
                break;
            //historias laborales
            case "Historias_Laborales":
                echo "../histlaborales/crear.php?balda=".$balda;
                break;
            //importaciones
            case"Importaciones":
                echo "../importaciones/cuerpo.php?balda=".$balda;
                break;
            //impuestos
            case"Impuestos":
                echo "../Impuestos/crear_impuesto.php?balda=".$balda;
                break;
            case "Seguridad_Social";
                echo "../seguridad/crearseguridadsocial.php?balda=".$balda;
                break;
            case "info_entrada";
                echo "../info_entrada/crear_info_entrada.php?balda=".$balda;
                break;
            case "Libros_Oficiales";
                echo "../Libros_Oficiales/crear_libro.php?balda=".$balda;
                break;
        }
    }

    //metodo para mostrar los archivos correspondientes a cada am
    private static function archivo()
    {
        $balda = $_POST["idbalda_am"];
        //iniciamos la conexion
        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (! $con) {
            die('Error no se pudo conectar : '.mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");

        $sql = "SELECT archivos.Tipo_Documento, archivos.id_Archivos, archivos.estado, trasferencia.Sede, trasferencia.Area,trasferencia.Consecutivo,trasferencia.idTrasferencia , trasferencia.archivo FROM archivos LEFT JOIN trasferencia ON archivos.Trasferencia = trasferencia.idTrasferencia WHERE archivos.balda_am_idbalda_am=".$balda;
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);
        $table = "";

        $boton = '<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-balda="'.$balda.'">ADD archivo</button>';

        while ($row = mysqli_fetch_array($result)) {
            $class = "";
            if ($row["estado"] == "prestado") {
                $class = "danger";
            }
            $table .= "<tr class='".$class."'>
                 <td>".$row["Tipo_Documento"]."</td>
                 <td><a target='_blank' href='".$row["archivo"]."'>".$row["Sede"]."-".$row["Area"]."-".$row["Consecutivo"]."</a></td>";
            $table .= "</tr>";
        }

        $arr = [$table, $boton];
        echo json_encode($arr);
    }
}