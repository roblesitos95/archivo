<?php
/**
 * Created by PhpStorm.
 * User: RBTEXCTUTA43
 * Date: 02/04/2018
 * Time: 02:30 PM
 */

require_once ('db_abstract_class.php');

class prestamosclass extends db_abstract_class
{
    private $idPrestamos;
    private $Solicitante;
    private $Documento;
    private $Fecha_Envio;
    private $Area;
    private $Destinatario;
    private $Numero_Guia;
    private $Fecha_Reibido;
    private $Recibido_por;
    private $Observaciones;
    private $Ubicacion;
    private $Estado;



    public function __construct($Prestamo_data= array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Prestamo_data)>=1){ //
            foreach ($Prestamo_data as $campo => $valor){
                $this->$campo = $valor;

            }
        }else {
            $this->idPrestamos = "";
            $this->Solicitante = "";
            $this->Documento = "";
            $this->Fecha_Envio = "";
            $this->Area = "";
            $this->Destinatario = "";
            $this->Numero_Guia= "";
            $this->Fecha_Reibido = "";
            $this->Recibido_por = "";
            $this->Observaciones = "";
            $this->Ubicacion = "";
            $this->Estado= "";
        }
    }

    public static function buscarForId($id)
    {
        return prestamosclass::buscar('Select * from Prestamos where idPrestamos= '.$id);
    }

    protected static function buscar($query)
    {
        $arraycontratos= array();
        $tpm= new prestamosclass();
        $getrows =$tpm->getRows($query);

        foreach ($getrows as $valor) {
            $importacion=  new prestamosclass();
            $importacion->idPrestamos= $valor['idPrestamos'];
            $importacion-> Solicitante =$valor['Solicitante'];
            $importacion-> Documento =$valor['Documento'];
            $importacion-> Fecha_Envio =$valor['Fecha_Envio'];
            $importacion-> Area=$valor['Area'];
            $importacion-> Destinatario=$valor['Destinatario'];
            $importacion-> Numero_Guia =$valor['Numero_Guia'];
            $importacion-> Fecha_Reibido =$valor['Fecha_Reibido'];
            $importacion-> Recibido_por =$valor['Recibido_Por'];
            $importacion-> Observaciones =$valor['Observaciones'];
            $importacion-> Ubicacion =$valor['Ubicacion'];
            $importacion-> Estado =$valor['Estado'];

            array_push($arraycontratos,$importacion);
        }
        $tpm->Disconnect();
        return $arraycontratos;
    }
    Public static function getPrestados()
    {
        return prestamosclass::buscar('select * from Prestamos WHERE Estado= "Prestado"');
    }
    Public static function getAll()
    {
        return prestamosclass::buscar('select * from Prestamos WHERE Estado= "Devuelto"');
    }

    public function insertar()
    {
        $this->insertRow("insert into Prestamos (Solicitante, Documento, Fecha_Envio, Area, Destinatario, Numero_Guia, Estado, Ubicacion, Observaciones)VALUE (?, ?, ?, ?, ?, ?, ? , ? ,? )",array(
                $this->Solicitante,
                $this->Documento,
                $this->Fecha_Envio,
                $this->Area,
                $this->Destinatario,
                $this->Numero_Guia,
                $this->Estado,
                $this->Ubicacion,
                $this->Observaciones,
            )
        );
        $this->Disconnect();
    }

    public function devolver()
    {

        $this->updateRow ("update Prestamos set Fecha_Reibido= ?, Recibido_por= ?, Observaciones=?, Estado=? WHERE idPrestamos= ?",array(
            $this->Fecha_Reibido,
            $this->Recibido_por,
            $this->Observaciones,
            $this->Estado,
            $this->idPrestamos,
        ));
        $this->Disconnect();}

    public function editar()
    {

        $this->updateRow ("update Prestamos set Solicitante= ?, Documento= ?, Fecha_Envio=?, Area=?, Destinatario=?, Numero_Guia=?, Estado = ?, Ubicacion = ? WHERE Id_Prestamo= ?",array(
            $this->Solicitante,
            $this->Documento,
            $this->Fecha_Envio,
            $this->Area,
            $this->Destinatario,
            $this->Numero_Guia,
            $this->Estado,
            $this->Ubicacion,
            $this->idPrestamos,
        ));
        $this->Disconnect();}

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    /**
     * @return mixed
     */
    public function getIdPrestamo()
    {
        return $this->idPrestamos;
    }

    /**
     * @param mixed $Id_Prestamo
     */
    public function setIdPrestamo($idPrestamos)
    {
        $this->idPrestamos = $idPrestamos;
    }

    /**
     * @return mixed
     */
    public function getSolicitante()
    {
        return $this->Solicitante;
    }

    /**
     * @param mixed $Solicitante
     */
    public function setSolicitante($Solicitante)
    {
        $this->Solicitante = $Solicitante;
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
    public function getFechaEnvio()
    {
        return $this->Fecha_Envio;
    }

    /**
     * @param mixed $Fecha_Envio
     */
    public function setFechaEnvio($Fecha_Envio)
    {
        $this->Fecha_Envio = $Fecha_Envio;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->Area;
    }

    /**
     * @param mixed $Area
     */
    public function setArea($Area)
    {
        $this->Area = $Area;
    }

    /**
     * @return mixed
     */
    public function getDestinatario()
    {
        return $this->Destinatario;
    }

    /**
     * @param mixed $Destinatario
     */
    public function setDestinatario($Destinatario)
    {
        $this->Destinatario = $Destinatario;
    }

    /**
     * @return mixed
     */
    public function getNumeroGuia()
    {
        return $this->Numero_Guia;
    }

    /**
     * @param mixed $Numero_Guia
     */
    public function setNumeroGuia($Numero_Guia)
    {
        $this->Numero_Guia = $Numero_Guia;
    }

    /**
     * @return mixed
     */
    public function getFechaRecibido()
    {
        return $this->Fecha_Reibido;
    }

    /**
     * @param mixed $Fecha_Recibido
     */
    public function setFechaRecibido($Fecha_Recibido)
    {
        $this->Fecha_Reibido = $Fecha_Recibido;
    }

    /**
     * @return mixed
     */
    public function getRecibidoPor()
    {
        return $this->Recibido_por;
    }

    /**
     * @param mixed $Recibido_por
     */
    public function setRecibidoPor($Recibido_por)
    {
        $this->Recibido_por = $Recibido_por;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->Observaciones;
    }

    /**
     * @param mixed $Observaciones
     */
    public function setObservaciones($Observaciones)
    {
        $this->Observaciones = $Observaciones;
    }

    /**
     * @return mixed
     */
    public function getUbicacion()
    {
        return $this->Ubicacion;
    }

    /**
     * @param mixed $Ubicacion
     */
    public function setUbicacion($Ubicacion)
    {
        $this->Ubicacion = $Ubicacion;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param mixed $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

}