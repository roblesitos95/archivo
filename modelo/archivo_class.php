<?php

require_once("db_abstract_class.php");

class archivo_class
{

    public static function getAll($tipodocu)
    {
        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (!$con) {
            die('Error no se pudo conectar : ' . mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");


        $sql = "select archivos.id_Archivos, archivos.Nombres, archivos.Liquidacion, archivos.Pedido, archivos.Apellidos, archivos.Empresa, archivos.De,archivos.A, archivos.Notaria, archivos.Contratista, archivos.NIT, archivos.Tipo, archivos.Documento, archivos.Numero, archivos.Placa, archivos.Clase, archivos.fecha, trasferencia.archivo, archivos.Descripcion, archivos.estado, archivos.factura, archivos.Ciudad FROM archivos INNER JOIN trasferencia on archivos.Trasferencia = trasferencia.idTrasferencia where Tipo_Documento='" . $tipodocu . "'";
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);
        $table = "";

        switch ($tipodocu) {
            //certificado de desintegracion
            case "Cert_Desintegracion":
                while ($row = mysqli_fetch_array($result)) {
                    $btn = null;
                    if ($row["estado"] == "toda" or $row["estado"] == "unidad") {
                        $btn = archivo_class::buscar($row["id_Archivos"]);
                    }
                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Documento"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Placa"] . '</td>
                                <td>' . $row["Clase"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                <td>
                                     <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> ' . $btn . '
                                     
                                </td>
                             </tr>
                 ';
                }
                break;

            //Contratos
            case "Contratos":
                while ($row = mysqli_fetch_array($result)) {

                    $btn = null;
                    if ($row["estado"] == "toda" or $row["estado"] == "unidad") {
                       $btn  = archivo_class::buscar($row["id_Archivos"]);
                    }

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Empresa"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Contratista"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                <td>
                                  
                                     <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button>    ' .$btn. '
                                </td>
                             </tr>
                 ';
                }
                break;


            //documentos contables
            case "Doc_Contable":
                while ($row = mysqli_fetch_array($result)) {

                    $btn = null;
                    if ($row["estado"] == "toda" or $row["estado"] == "unidad") {
                        $btn = archivo_class::buscar($row["id_Archivos"]);
                    }

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Documento"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Contratista"] . '</td>
                                <td>' . $row["NIT"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["factura"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> ' . $btn . '
                                </td>
                             </tr>
                 ';
                }
                break;


            //Escrituras
            case "Escritura":
                while ($row = mysqli_fetch_array($result)) {

                    $btn = null;
                    if ($row["estado"] == "toda" or $row["estado"] == "unidad") {
                        $btn = archivo_class::buscar($row["id_Archivos"]);
                    }

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Notaria"] . '</td>
                                <td>' . $row["De"] . '</td>
                                <td>' . $row["A"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                <td>
                                 <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> ' . $btn . '
                                </td>
                             </tr>
                 ';
                }
                break;


            //Facturas
            case "Factura":

                while ($row = mysqli_fetch_array($result)) {
                    $btn = null;
                    if ($row["estado"] == "toda" or $row["estado"] == "unidad") {
                        $btn = archivo_class::buscar($row["id_Archivos"]);
                    }
                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Contratista"] . '</td>
                                <td>' . $row["NIT"] . '</td>
                                <td>' . $row["Tipo"] . '</td>
                                <td>' . $row["Documento"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                <td>
                                 <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> ' . $btn . '
                                </td>
                             </tr>
                 ';
                }

                break;


            //historias laborales
            case "Historia_laboral":
                while ($row = mysqli_fetch_array($result)) {

                    $btn = null;
                    if ($row["estado"] == "toda" or $row["estado"] == "unidad") {
                        $btn = archivo_class::buscar($row["id_Archivos"]);
                    }

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Documento"] . '</td>
                                <td>' . $row["Apellidos"] . '</td>
                                <td>' . $row["Nombres"] . '</td>
                                <td>' . $row["Tipo"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                           
                                <td>
                                  <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> ' . $btn . '
                                </td>
                             </tr>
                 ';
                }

                break;


            //importaciones
            case"Importacion":
                while ($row = mysqli_fetch_array($result)) {

                    $btn = null;
                    if ($row["estado"] == "toda" or $row["estado"] == "unidad") {
                        $btn = archivo_class::buscar($row["id_Archivos"]);
                    }

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Documento"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Liquidacion"] . '</td>
                                <td>' . $row["Pedido"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                           
                                <td>
                                 <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> ' . $btn . '
                                </td>
                             </tr>
                 ';
                }
                break;


            //impuestos
            case"Impuestos":
                while ($row = mysqli_fetch_array($result)) {

                    $btn = null;
                    if ($row["estado"] == "toda" or $row["estado"] == "unidad") {
                        $btn = archivo_class::buscar($row["id_Archivos"]);
                    }

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                           
                                <td>
                                  <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button>   ' . $btn . '
                                </td>
                             </tr>
                 ';
                }
                break;

            //seguridad social
            case "Seguridad_social":
                while ($row = mysqli_fetch_array($result)) {

                    $btn = null;
                    if ($row["estado"] == "toda" or $row["estado"] == "unidad") {
                        $btn = archivo_class::buscar($row["id_Archivos"]);
                    }


                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Documento"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Contratista"] . '</td>
                                <td>' . $row["Empresa"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                
                                <td>
                                  <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button>  ' . $btn . '
                                </td>
                             </tr>
                 ';
                }
                break;

            //Informe_Entrada
            case "Informe_Entrada":
                while ($row = mysqli_fetch_array($result)) {

                    $btn = null;
                    if ($row["estado"] == "toda" or $row["estado"] == "unidad") {
                        $btn = archivo_class::buscar($row["id_Archivos"]);
                    }

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Ciudad"] . '</td>
                                <td>' . $row["Contratista"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                
                                <td>
                                   <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button>  ' . $btn . '
                                     
                                        
                                </td>
                             </tr>
                 ';
                }
                break;

            //Libro_oficial
            case "Libro_oficial":
                while ($row = mysqli_fetch_array($result)) {

                    $btn = null;
                    if ($row["estado"] == "toda" or $row["estado"] == "unidad") {
                        $btn = archivo_class::buscar($row["id_Archivos"]);
                    }

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Empresa"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                
                                <td>
                                  <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> ' . $btn . '
                                </td>
                             </tr>
                 ';
                }
                break;
        }


        echo $table;
    }

    protected static function buscar($id)
    {

        $mysqli = new mysqli("localhost", "root", "", "bd_documentacion");

        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }

        $sql = "SELECT * FROM prestamos WHERE prestamos.Estado='activo' AND prestamos.Archivos_id_Archivos=" . $id;
        $mysqli->set_charset("utf8");
        $result = mysqli_query($mysqli, $sql);
        $table = "";

        while ($row = mysqli_fetch_array($result)) {

            $table .= '<button type="button" title="'.$row["idPrestamos"].'"  class="btn btn-primary btn-simple btn-xs hvr-bounce-in">                               
                           <a href="../Prestamos/devolver_'.$row["idPrestamos"].'" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-info-circle"></i></span>
                                        </a>  
                       </button>  ';

        }
        $mysqli->close();

        return $table;
    }

    public static function getfiltro($tipodocu, $filtro)
    {
        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (!$con) {
            die('Error no se pudo conectar : ' . mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");


        if ($tipodocu == "Factura") {
            $sql = "select archivos.id_Archivos, archivos.Nombres, archivos.Liquidacion, archivos.Pedido, archivos.Apellidos, archivos.Empresa, archivos.De,archivos.A, archivos.Notaria, archivos.Contratista, archivos.NIT, archivos.Tipo, archivos.Documento, archivos.Numero, archivos.Placa, archivos.Clase, archivos.fecha, trasferencia.archivo, archivos.Descripcion, archivos.estado, archivos.factura FROM archivos INNER JOIN trasferencia on archivos.Trasferencia = trasferencia.idTrasferencia where Tipo='" . $filtro . "' and Tipo_Documento='" . $tipodocu . "' ";
        } else {
            $sql = "select archivos.id_Archivos, archivos.Nombres, archivos.Liquidacion, archivos.Pedido, archivos.Apellidos, archivos.Empresa, archivos.De,archivos.A, archivos.Notaria, archivos.Contratista, archivos.NIT, archivos.Tipo, archivos.Documento, archivos.Numero, archivos.Placa, archivos.Clase, archivos.fecha, trasferencia.archivo, archivos.Descripcion, archivos.estado, archivos.factura FROM archivos INNER JOIN trasferencia on archivos.Trasferencia = trasferencia.idTrasferencia where Documento='" . $filtro . "' and Tipo_Documento='" . $tipodocu . "' ";
        }
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);
        $table = "";

        switch ($tipodocu) {
            //certificado de desintegracion
            case "Cert_Desintegracion":
                while ($row = mysqli_fetch_array($result)) {

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Documento"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Placa"] . '</td>
                                <td>' . $row["Clase"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                <td>
                                     <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> 
                                     
                                </td>
                             </tr>
                 ';
                }
                break;

            //Contratos
            case "Contratos":
                while ($row = mysqli_fetch_array($result)) {

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Empresa"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Contratista"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                <td>
                                  
                                     <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button>    
                                </td>
                             </tr>
                 ';
                }
                break;


            //documentos contables
            case "Doc_Contable":
                while ($row = mysqli_fetch_array($result)) {

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Documento"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Contratista"] . '</td>
                                <td>' . $row["NIT"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["factura"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> 
                                </td>
                             </tr>
                 ';
                }
                break;


            //Escrituras
            case "Escritura":
                while ($row = mysqli_fetch_array($result)) {

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Notaria"] . '</td>
                                <td>' . $row["De"] . '</td>
                                <td>' . $row["A"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                <td>
                                 <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> 
                                </td>
                             </tr>
                 ';
                }
                break;


            //Facturas
            case "Factura":

                while ($row = mysqli_fetch_array($result)) {

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Contratista"] . '</td>
                                <td>' . $row["NIT"] . '</td>
                                <td>' . $row["Tipo"] . '</td>
                                <td>' . $row["Documento"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                <td>
                                 <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> 
                                </td>
                             </tr>
                 ';
                }

                break;


            //historias laborales
            case "Historia_laboral":
                while ($row = mysqli_fetch_array($result)) {

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Documento"] . '</td>
                                <td>' . $row["Apellidos"] . '</td>
                                <td>' . $row["Nombres"] . '</td>
                                <td>' . $row["Tipo"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                           
                                <td>
                                  <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> 
                                </td>
                             </tr>
                 ';
                }

                break;


            //importaciones
            case"Importacion":
                while ($row = mysqli_fetch_array($result)) {

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Documento"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Liquidacion"] . '</td>
                                <td>' . $row["Pedido"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                           
                                <td>
                                 <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> 
                                </td>
                             </tr>
                 ';
                }
                break;


            //impuestos
            case"Impuestos":
                while ($row = mysqli_fetch_array($result)) {

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                           
                                <td>
                                  <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button>   
                                </td>
                             </tr>
                 ';
                }
                break;

            //seguridad social
            case "Seguridad_social":
                while ($row = mysqli_fetch_array($result)) {

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Documento"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Contratista"] . '</td>
                                <td>' . $row["Empresa"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                
                                <td>
                                  <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button>  
                                </td>
                             </tr>
                 ';
                }
                break;

            //Informe_Entrada
            case "Informe_Entrada":
                while ($row = mysqli_fetch_array($result)) {

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Numero"] . '</td>
                                <td>' . $row["Ciudad"] . '</td>
                                <td>' . $row["Contratista"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                
                                <td>
                                   <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button>      
                                </td>
                             </tr>
                 ';
                }
                break;

            //Libro_oficial
            case "Libro_oficial":
                while ($row = mysqli_fetch_array($result)) {

                    $class = "";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table .= '   
                             <tr class="' . $class . '">
                                <td>' . $row["id_Archivos"] . '</td>
                                <td>' . $row["Empresa"] . '</td>
                                <td>' . $row["fecha"] . '</td>
                                <td>' . $row["Descripcion"] . '</td>
                                
                                <td>
                                  <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="' . $row["archivo"] . '" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\'' . $tipodocu . '\',\'' . $row["id_Archivos"] . '\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-eye"></i></span>
                                        
                                     </button> 
                                </td>
                             </tr>
                 ';
                }
                break;
        }


        echo $table;
    }

    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    Public function insertar($sql)
    {
        $mysqli = new mysqli("localhost", "root", "", "bd_documentacion");

        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }
        $mysqli->set_charset("utf8");
        if ($mysqli->query($sql) === true) {

            return $idu = $mysqli->insert_id;
        } else {
            echo "Error  N: " . $sql . "<br>" . $mysqli->error;
        }


    }


    public function table($id)
    {
        $mysqli = new mysqli("localhost", "root", "", "bd_documentacion");

        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }

        $sql = "SELECT archivos.Tipo_Documento, archivos.id_Archivos, archivos.estado, trasferencia.Sede, trasferencia.Area,trasferencia.Consecutivo,trasferencia.idTrasferencia , trasferencia.archivo FROM archivos LEFT JOIN trasferencia ON archivos.Trasferencia = trasferencia.idTrasferencia WHERE archivos.id_Archivos=" . $id;
        $mysqli->set_charset("utf8");
        $result = mysqli_query($mysqli, $sql);
        $table = "";

        while ($row = mysqli_fetch_array($result)) {
            $class = "";
            if ($row["estado"] == "toda") {
                $class = "danger";
            } else if ($row["estado"] == "unidad") {
                $class = "warning";
            }

            $table .= "<tr class='" . $class . "'>
                 <td>" . $row["Tipo_Documento"] . "</td>
                 <td><a target='_blank' href='" . $row["archivo"] . "'>" . $row["Sede"] . "-" . $row["Area"] . "-" . $row["Consecutivo"] . "</a></td>
                 <td> <button type=\"button\" onclick=\"ver('" . $row["Tipo_Documento"] . "','" . $row["id_Archivos"] . "')\" class=\"btn btn-primary btn-simple btn-xs hvr-bounce-in\">
                                        
                                        <span style=\"font-size: 15px\"><i class=\"icon-eye\"></i></span>
                                        
                                     </button>  </td>";
            $table .= "</tr>";
        }

        return $table;

    }


    public function editar($sql)
    {
        $mysqli = new mysqli("localhost", "root", "", "bd_documentacion");

        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }
        $mysqli->set_charset("utf8");
        if ($mysqli->query($sql) === true) {

            echo "exito al editar " . $mysqli->error;
        } else {
            echo "Error  N: " . $sql . "<br>" . $mysqli->error;
        }
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

}
