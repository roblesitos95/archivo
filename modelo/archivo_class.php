<?php

require_once ("db_abstract_class.php");

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

    protected static function getAll()
    {
        // TODO: Implement getAll() method.
    }

    Public function  insertar($sql)
    {
        $mysqli = new mysqli("localhost", "root", "", "bd_documentacion");

        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }


        if ($mysqli->query($sql) === TRUE) {

            return $idu=  $mysqli->insert_id;


        } else {
            echo "Error  N: " . $sql . "<br>" . $mysqli->error;
        }
        //

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