<?php

require_once("db_abstract_class.php");

class archivo_class extends mysqli
{
    private $id_ArchivosPrimaria;

    private $Tipo_Documento;

    private $fecha;

    private $Descripcion;

    private $Numero;

    private $Documento;

    private $Placa;

    private $Clase;

    private $Empresa;

    private $Contratista;

    private $NIT;

    private $Tipo_Factura;

    private $Notaria;

    private $De;

    private $A;

    private $Tipo;

    private $Liquidacion;

    private $Pedido;

    private $Ciudad;

    private $Trasferencia;

    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    protected static function buscar($query)
    {
        // TODO: Implement buscar() method.
    }

    /**
     * @param $tipo
     */
    public static function getAll($tipodocu)
    {
        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (! $con) {
            die('Error no se pudo conectar : '.mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");



        $sql = "select archivos.id_Archivos, archivos.Documento,archivos.Numero, archivos.Placa, archivos.Clase, archivos.fecha, trasferencia.archivo, archivos.Descripcion, archivos.estado FROM archivos INNER JOIN trasferencia on archivos.Trasferencia = trasferencia.idTrasferencia where Tipo_Documento='".$tipodocu."'";
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);
        $table = "";

        switch ($tipodocu) {
            //certificado de desintegracion
            case "Cert_Desintegracion":
                while ($row = mysqli_fetch_array($result)) {

                    $class ="";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table.='   
                             <tr class="'.$class.'">
                                <td>'.$row["id_Archivos"].'</td>
                                <td>'.$row["Documento"].'</td>
                                <td>'.$row["Numero"].'</td>
                                <td>'.$row["Placa"].'</td>
                                <td>'.$row["Clase"].'</td>
                                <td>'.$row["fecha"].'</td>
                                <td>'.$row["Descripcion"].'</td>
                                <td>
                                     <button type="button" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        <a href="'.$row["archivo"].'" target="_blank">
                                        <span style="font-size: 15px"><i class="icon-file-pdf    "></i></span>
                                        </a>
                                     </button> 
                                 
                                     <button type="button" onclick="ver(\''.$tipodocu.'\',\''.$row["id_Archivos"].'\')" class="btn btn-primary btn-simple btn-xs hvr-bounce-in">
                                        
                                        <span style="font-size: 15px"><i class="icon-pencil2"></i></span>
                                        
                                     </button> 
                                     
                                </td>
                             </tr>
                 ';
                }
                break;

            //Contratos
            case "Contratos":
                while ($row = mysqli_fetch_array($result)) {

                    $class ="";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table.='   
                             <tr class="'.$class.'">
                                <td>'.$row["id_Archivos"].'</td>
                                <td>'.$row["Empresa"].'</td>
                                <td>'.$row["Numero"].'</td>
                                <td>'.$row["Contratista"].'</td>
                                <td>'.$row["fecha"].'</td>
                                <td>'.$row["Descripcion"].'</td>
                                <td>
                                   <button type="button"
                                   onclick="ver()"
                                   rel="tooltip" title="Ver Descripcion"
                                   class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-list-ul    "></i></span>
                                   </button>
                                             
                                   <button type="button" rel="tooltip" title="Editar"
                                   class="btn btn-warning btn-simple btn-xs  hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-pencil2"></i></span></a>
                                   </button>
                                            
                                </td>
                             </tr>
                 ';
                }
                break;


            //documentos contables
            case "Doc_Contable":
                while ($row = mysqli_fetch_array($result)) {

                    $class ="";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table.='   
                             <tr class="'.$class.'">
                                <td>'.$row["id_Archivos"].'</td>
                                <td>'.$row["Documento"].'</td>
                                <td>'.$row["Numero"].'</td>
                                <td>'.$row["Contratista"].'</td>
                                <td>'.$row["NIT"].'</td>
                                <td>'.$row["fecha"].'</td>
                                <td>'.$row["factura"].'</td>
                                <td>'.$row["Descripcion"].'</td>
                                <td>
                                   <button type="button"
                                   onclick="demo.showSwal("basic",'.$row["Descripcion"].')"
                                   rel="tooltip" title="Ver Descripcion"
                                   class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-list-ul    "></i></span>
                                   </button>
                                             
                                   <button type="button" rel="tooltip" title="Editar"
                                   class="btn btn-warning btn-simple btn-xs  hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-pencil2"></i></span></a>
                                   </button>
                                            
                                </td>
                             </tr>
                 ';
                }
                break;


            //Escrituras
            case "Escritura":
                while ($row = mysqli_fetch_array($result)) {

                    $class ="";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table.='   
                             <tr class="'.$class.'">
                                <td>'.$row["id_Archivos"].'</td>
                                <td>'.$row["Numero"].'</td>
                                <td>'.$row["Notaria"].'</td>
                                <td>'.$row["De"].'</td>
                                <td>'.$row["A"].'</td>
                                <td>'.$row["fecha"].'</td>
                                <td>'.$row["Descripcion"].'</td>
                                <td>
                                   <button type="button"
                                   onclick="demo.showSwal("basic",'.$row["Descripcion"].')"
                                   rel="tooltip" title="Ver Descripcion"
                                   class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-list-ul    "></i></span>
                                   </button>
                                             
                                   <button type="button" rel="tooltip" title="Editar"
                                   class="btn btn-warning btn-simple btn-xs  hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-pencil2"></i></span></a>
                                   </button>
                                            
                                </td>
                             </tr>
                 ';
                }
                break;


            //Facturas
            case "Factura":

                while ($row = mysqli_fetch_array($result)) {

                    $class ="";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table.='   
                             <tr class="'.$class.'">
                                <td>'.$row["id_Archivos"].'</td>
                                <td>'.$row["Numero"].'</td>
                                <td>'.$row["Contratista"].'</td>
                                <td>'.$row["NIT"].'</td>
                                <td>'.$row["Tipo"].'</td>
                                <td>'.$row["Documento"].'</td>
                                <td>'.$row["fecha"].'</td>
                                <td>'.$row["Descripcion"].'</td>
                                <td>
                                   <button type="button"
                                   onclick="demo.showSwal("basic",'.$row["Descripcion"].')"
                                   rel="tooltip" title="Ver Descripcion"
                                   class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-list-ul    "></i></span>
                                   </button>
                                             
                                   <button type="button" rel="tooltip" title="Editar"
                                   class="btn btn-warning btn-simple btn-xs  hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-pencil2"></i></span></a>
                                   </button>
                                            
                                </td>
                             </tr>
                 ';
                }

                break;


            //historias laborales
            case "Historia_laboral":
                while ($row = mysqli_fetch_array($result)) {

                    $class ="";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table.='   
                             <tr class="'.$class.'">
                                <td>'.$row["id_Archivos"].'</td>
                                <td>'.$row["Documento"].'</td>
                                <td>'.$row["Apellidos"].'</td>
                                <td>'.$row["Nombres"].'</td>
                                <td>'.$row["Tipo"].'</td>
                                <td>'.$row["Numero"].'</td>
                                <td>'.$row["Descripcion"].'</td>
                           
                                <td>
                                   <button type="button"
                                   onclick="demo.showSwal("basic",'.$row["Descripcion"].')"
                                   rel="tooltip" title="Ver Descripcion"
                                   class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-list-ul    "></i></span>
                                   </button>
                                             
                                   <button type="button" rel="tooltip" title="Editar"
                                   class="btn btn-warning btn-simple btn-xs  hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-pencil2"></i></span></a>
                                   </button>
                                            
                                </td>
                             </tr>
                 ';
                }

                break;


            //importaciones
            case"Importacion":
                while ($row = mysqli_fetch_array($result)) {

                    $class ="";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table.='   
                             <tr class="'.$class.'">
                                <td>'.$row["id_Archivos"].'</td>
                                <td>'.$row["Documento"].'</td>
                                <td>'.$row["fecha"].'</td>
                                <td>'.$row["Liquidacion"].'</td>
                                <td>'.$row["Pedido"].'</td>
                                <td>'.$row["Descripcion"].'</td>
                           
                                <td>
                                   <button type="button"
                                   onclick="demo.showSwal("basic",'.$row["Descripcion"].')"
                                   rel="tooltip" title="Ver Descripcion"
                                   class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-list-ul    "></i></span>
                                   </button>
                                             
                                   <button type="button" rel="tooltip" title="Editar"
                                   class="btn btn-warning btn-simple btn-xs  hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-pencil2"></i></span></a>
                                   </button>
                                            
                                </td>
                             </tr>
                 ';
                }
                break;


            //impuestos
            case"Impuestos":
                while ($row = mysqli_fetch_array($result)) {

                    $class ="";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table.='   
                             <tr class="'.$class.'">
                                <td>'.$row["id_Archivos"].'</td>
                                <td>'.$row["Numero"].'</td>
                                <td>'.$row["fecha"].'</td>
                                <td>'.$row["Descripcion"].'</td>
                           
                                <td>
                                   <button type="button"
                                   onclick="demo.showSwal("basic",'.$row["Descripcion"].')"
                                   rel="tooltip" title="Ver Descripcion"
                                   class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-list-ul    "></i></span>
                                   </button>
                                             
                                   <button type="button" rel="tooltip" title="Editar"
                                   class="btn btn-warning btn-simple btn-xs  hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-pencil2"></i></span></a>
                                   </button>
                                            
                                </td>
                             </tr>
                 ';
                }
                break;

             //seguridad social
            case "Seguridad_social":
                while ($row = mysqli_fetch_array($result)) {

                    $class ="";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table.='   
                             <tr class="'.$class.'">
                                <td>'.$row["id_Archivos"].'</td>
                                <td>'.$row["Documento"].'</td>
                                <td>'.$row["Numero"].'</td>
                                <td>'.$row["Contratista"].'</td>
                                <td>'.$row["Empresa"].'</td>
                                <td>'.$row["fecha"].'</td>
                                <td>'.$row["Descripcion"].'</td>
                                
                                <td>
                                   <button type="button"
                                   onclick="demo.showSwal("basic",'.$row["Descripcion"].')"
                                   rel="tooltip" title="Ver Descripcion"
                                   class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-list-ul    "></i></span>
                                   </button>
                                             
                                   <button type="button" rel="tooltip" title="Editar"
                                   class="btn btn-warning btn-simple btn-xs  hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-pencil2"></i></span></a>
                                   </button>
                                            
                                </td>
                             </tr>
                 ';
                }
                break;

             //Informe_Entrada
            case "Informe_Entrada":
                while ($row = mysqli_fetch_array($result)) {

                    $class ="";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table.='   
                             <tr class="'.$class.'">
                                <td>'.$row["id_Archivos"].'</td>
                                <td>'.$row["Numero"].'</td>
                                <td>'.$row["Ciudad"].'</td>
                                <td>'.$row["Contratista"].'</td>
                                <td>'.$row["fecha"].'</td>
                                <td>'.$row["Descripcion"].'</td>
                                
                                <td>
                                   <button type="button"
                                   onclick="demo.showSwal("basic",'.$row["Descripcion"].')"
                                   rel="tooltip" title="Ver Descripcion"
                                   class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-list-ul    "></i></span>
                                   </button>
                                             
                                   <button type="button" rel="tooltip" title="Editar"
                                   class="btn btn-warning btn-simple btn-xs  hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-pencil2"></i></span></a>
                                   </button>
                                            
                                </td>
                             </tr>
                 ';
                }
                break;

            //Libro_oficial
            case "Libro_oficial":
                while ($row = mysqli_fetch_array($result)) {

                    $class ="";
                    if ($row["estado"] == "toda") {
                        $class = "danger";
                    } else if ($row["estado"] == "unidad") {
                        $class = "warning";
                    }

                    $table.='   
                             <tr class="'.$class.'">
                                <td>'.$row["id_Archivos"].'</td>
                                <td>'.$row["Empresa"].'</td>
                                <td>'.$row["fecha"].'</td>
                                <td>'.$row["Descripcion"].'</td>
                                
                                <td>
                                   <button type="button"
                                   onclick="demo.showSwal("basic",'.$row["Descripcion"].')"
                                   rel="tooltip" title="Ver Descripcion"
                                   class="btn btn-primary btn-simple btn-xs hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-list-ul    "></i></span>
                                   </button>
                                             
                                   <button type="button" rel="tooltip" title="Editar"
                                   class="btn btn-warning btn-simple btn-xs  hvr-bounce-in hvr-radial-out ">
                                   <span style="font-size: 15px"><i class="icon-pencil2"></i></span></a>
                                   </button>
                                            
                                </td>
                             </tr>
                 ';
                }
                break;
        }



    echo $table;
    }


    Public function insertar($sql)
    {
        $mysqli = new mysqli("localhost", "root", "", "bd_documentacion");

        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }

        if ($mysqli->query($sql) === true) {

            return $idu = $mysqli->insert_id;
        } else {
            echo "Error  N: ".$sql."<br>".$mysqli->error;
        }
        //

    }


    public function table($id)
    {
        $mysqli = new mysqli("localhost", "root", "", "bd_documentacion");

        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }

        $sql = "SELECT archivos.Tipo_Documento, archivos.id_Archivos, archivos.estado, trasferencia.Sede, trasferencia.Area,trasferencia.Consecutivo,trasferencia.idTrasferencia , trasferencia.archivo FROM archivos LEFT JOIN trasferencia ON archivos.Trasferencia = trasferencia.idTrasferencia WHERE archivos.id_Archivos=".$id;
        $mysqli->set_charset("utf8");
        $result = mysqli_query($mysqli, $sql);
        $table = "";

        while ($row = mysqli_fetch_array($result)) {
            $class = "";
            if ($row["estado"] == "prestado") {
                $class = "danger";
            }
            $table .= "<tr class='".$class."'>
                 <td>".$row["Tipo_Documento"]."</td>
                 <td><a target='_blank' href='".$row["archivo"]."'>".$row["Sede"]."-".$row["Area"]."-".$row["Consecutivo"]."</a></td>
                 <td>   </td>";
            $table .= "</tr>";
        }

            return  $table;

    }


    protected function editar()
    {
        // TODO: Implement editar() method.
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    /**
     * @return mixed
     */
    public function getIdArchivosPrimaria()
    {
        return $this->id_ArchivosPrimaria;
    }

    /**
     * @param mixed $id_ArchivosPrimaria
     */
    public function setIdArchivosPrimaria($id_ArchivosPrimaria)
    {
        $this->id_ArchivosPrimaria = $id_ArchivosPrimaria;
    }

    /**
     * @return mixed
     */
    public function getTipoDocumento()
    {
        return $this->Tipo_Documento;
    }

    /**
     * @param mixed $Tipo_Documento
     */
    public function setTipoDocumento($Tipo_Documento)
    {
        $this->Tipo_Documento = $Tipo_Documento;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param mixed $Descripcion
     */
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->Numero;
    }

    /**
     * @param mixed $Numero
     */
    public function setNumero($Numero)
    {
        $this->Numero = $Numero;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * @param mixed $Documento
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;
    }

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->Placa;
    }

    /**
     * @param mixed $Placa
     */
    public function setPlaca($Placa)
    {
        $this->Placa = $Placa;
    }

    /**
     * @return mixed
     */
    public function getClase()
    {
        return $this->Clase;
    }

    /**
     * @param mixed $Clase
     */
    public function setClase($Clase)
    {
        $this->Clase = $Clase;
    }

    /**
     * @return mixed
     */
    public function getEmpresa()
    {
        return $this->Empresa;
    }

    /**
     * @param mixed $Empresa
     */
    public function setEmpresa($Empresa)
    {
        $this->Empresa = $Empresa;
    }

    /**
     * @return mixed
     */
    public function getContratista()
    {
        return $this->Contratista;
    }

    /**
     * @param mixed $Contratista
     */
    public function setContratista($Contratista)
    {
        $this->Contratista = $Contratista;
    }

    /**
     * @return mixed
     */
    public function getNIT()
    {
        return $this->NIT;
    }

    /**
     * @param mixed $NIT
     */
    public function setNIT($NIT)
    {
        $this->NIT = $NIT;
    }

    /**
     * @return mixed
     */
    public function getTipoFactura()
    {
        return $this->Tipo_Factura;
    }

    /**
     * @param mixed $Tipo_Factura
     */
    public function setTipoFactura($Tipo_Factura)
    {
        $this->Tipo_Factura = $Tipo_Factura;
    }

    /**
     * @return mixed
     */
    public function getNotaria()
    {
        return $this->Notaria;
    }

    /**
     * @param mixed $Notaria
     */
    public function setNotaria($Notaria)
    {
        $this->Notaria = $Notaria;
    }

    /**
     * @return mixed
     */
    public function getDe()
    {
        return $this->De;
    }

    /**
     * @param mixed $De
     */
    public function setDe($De)
    {
        $this->De = $De;
    }

    /**
     * @return mixed
     */
    public function getA()
    {
        return $this->A;
    }

    /**
     * @param mixed $A
     */
    public function setA($A)
    {
        $this->A = $A;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->Tipo;
    }

    /**
     * @param mixed $Tipo
     */
    public function setTipo($Tipo)
    {
        $this->Tipo = $Tipo;
    }

    /**
     * @return mixed
     */
    public function getLiquidacion()
    {
        return $this->Liquidacion;
    }

    /**
     * @param mixed $Liquidacion
     */
    public function setLiquidacion($Liquidacion)
    {
        $this->Liquidacion = $Liquidacion;
    }

    /**
     * @return mixed
     */
    public function getPedido()
    {
        return $this->Pedido;
    }

    /**
     * @param mixed $Pedido
     */
    public function setPedido($Pedido)
    {
        $this->Pedido = $Pedido;
    }

    /**
     * @return mixed
     */
    public function getCiudad()
    {
        return $this->Ciudad;
    }

    /**
     * @param mixed $Ciudad
     */
    public function setCiudad($Ciudad)
    {
        $this->Ciudad = $Ciudad;
    }

    /**
     * @return mixed
     */
    public function getTrasferencia()
    {
        return $this->Trasferencia;
    }

    /**
     * @param mixed $Trasferencia
     */
    public function setTrasferencia($Trasferencia)
    {
        $this->Trasferencia = $Trasferencia;
    }


}
