<?php
/**
 * Created by PhpStorm.
 * User: RBTEXCTUTA43
 * Date: 10/04/2018
 * Time: 04:33 PM
 */

require_once ("db_abstract_class.php");
class filasclass extends  db_abstract_class
{
    private $id_fila;
    private $Nombre;
    private $Sala;

    public function __construct($contratos_data= array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if (count($contratos_data) >= 1) { //
            foreach ($contratos_data as $campo => $valor) {
                $this->$campo = $valor;

            }
        } else {
            $this->id_fila="";
            $this->Nombre="";
            $this->Sala="";
        }

        }


    Public static function buscarForId($id)
    {
        $lol=array("Sala"=>$id);
        $_SESSION["ubi"]=$lol;
        return filasclass::buscar('SELECT * FROM filas WHERE idFilas='.$id);
    }

    protected static function buscar($query)
    {
        $arrayimportacion= array();
        $tpm= new filasclass();
        $getrows =$tpm->getRows($query);

        foreach ($getrows as $valor) {
            $fila= new filasclass();
            $fila->id_fila= $valor['idFilas'];
            $fila->Nombre= $valor['Nombre'];

            array_push($arrayimportacion,$fila);
        }
        $tpm->Disconnect();
        return $arrayimportacion;
    }

    protected static function getAll()
    {
        // TODO: Implement getAll() method.
    }

    protected function insertar()
    {
        // TODO: Implement insertar() method.
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
     * @return string
     */
    public function getIdFila()
    {
        return $this->id_fila;
    }

    /**
     * @param string $id_fila
     */
    public function setIdFila($id_fila)
    {
        $this->id_fila = $id_fila;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param string $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return string
     */
    public function getSala()
    {
        return $this->Sala;
    }

    /**
     * @param string $Sala
     */
    public function setSala($Sala)
    {
        $this->Sala = $Sala;
    }

}