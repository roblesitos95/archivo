<?php
/**
 * Created by PhpStorm.
 * User: RBTEXCTUTA43
 * Date: 23/03/2018
 * Time: 03:10 PM
 */

require_once ('db_abstract_class.php');

class areaclass extends db_abstract_class
{

    Private $Id_Trasferencia;
    private $Sede;
    private $Area;
    private $Anho;
    private $Asunto;
    private $Estado;
    private $Consecutivo;



        // metodo para llamar el constructor
    public function __construct($alumno_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($alumno_data)>=1){ //
            foreach ($alumno_data as $campo => $valor){
                $this->$campo = $valor;

            }
        }else {
            $this->Id_Trasferencia = "";
            $this->Sede = "";
            $this->Area = "";
            $this->Consecutivo = "";
            $this->Anho = "";
            $this->Asunto = "";
            $this->Estado = "";
        }
    }



    // metodo para crear combobox de area con todos los atributos
    public static function  selectedarea($name,$id,$class,$selected)
    {
        $arrmaterias = areaclass::getAll(); /* obtenemos el array con todos los datos  */

        $htmlSelect = "";

        if (count($arrmaterias) > 0) {//verificamos que earray o este nulo

            $htmlSelect.='<select name="'.$name.'" id="'.$id.'" class="'.$class.'" required >';

            foreach ($arrmaterias as $materia) {

                if($materia->getIdTrasferencia()== $selected){ // verificamos que el obj actual no sea el atributo ya seleccionado
                    $htmlSelect.='<option  value="'.$materia->getIdTrasferencia().'" selected>' .$materia->getSede()."-".$materia->getArea()."-".$materia->getConsecutivo().'</option>';
                }
                else{
                    $htmlSelect.='<option value="'.$materia->getIdTrasferencia().'">'.$materia->getSede()."-".$materia->getArea()."-".$materia->getConsecutivo().'</option>';
                }
            }
            $htmlSelect.="</select>";
        }

        else{

            //en caso de que el array esto null responde con mensaje de advertencia
            $htmlSelect='<p class="text-warning ">No hay trasferencias registradas por favor ingrese trasferencias y vuelva a intentarlo</p>';
        }
        //retorna ya sea combobox o texto de advertencia
        return $htmlSelect;
    }



    // obtenemos el select de solo las trasferencias activas
    public static function selectarea($name,$id,$class)
    {
        // mismo proceso que el motodo anterior
        $arrmaterias = areaclass::getAll2();

        $htmlSelect = "";

        if (count($arrmaterias) > 0) {

            $htmlSelect.='<select  name="'.$name.'" id="'.$id.'" class="'.$class.'" required >';


            $htmlSelect.='<option  disabled selected value=""> </option>';
            foreach ($arrmaterias as $materia) {

                $htmlSelect.='<option value="'.$materia->getIdTrasferencia().'">'.$materia->getSede()."-".$materia->getArea()."-".$materia->getConsecutivo().'</option>';
            }

            $htmlSelect.="</select>";
        }

        else{

            $htmlSelect='<p class="text-warning ">No hay trasferencias activas por favor ingrese trasferencias o active y vuelva a intentarlo</p>';
        }

        return $htmlSelect;

    }



    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }


    protected static function buscar($query)
    {
        //metodo para llenar un array dependiendo de la query
        $arrayimportacion= array();
        $tpm= new areaclass();
        $getrows =$tpm->getRows($query);

        foreach ($getrows as $valor) {
            $importacion=  new areaclass();
            $importacion-> Id_Trasferencia = $valor['idTrasferencia'];
            $importacion-> Sede = $valor['Sede'];
            $importacion-> Area =$valor['Area'];
            $importacion-> Consecutivo =$valor['Consecutivo'];
            $importacion-> Anho =$valor['Anho'];
            $importacion-> Asunto =$valor['Asunto'];
            $importacion-> Estado =$valor['estado'];
      ;

            array_push($arrayimportacion,$importacion);
        }
        $tpm->Disconnect();
        return $arrayimportacion;
    }


    // Metodo apara buscar todo
    public static function getAll()
    {
        return areaclass::buscar("select * from trasferencia");
    }

    // metodo para buscar solo las trasferencias con estado Activo
    private static function getAll2()
    {
        return areaclass::buscar('select * from trasferencia WHERE Estado= "Activo"');
    }


    //Metodo para guardar o insetar en la base de datos
    public function insertar()
    {
        $id = $this->insertRow("insert into trasferencia (Sede, Area, consecutivo, Anho, Asunto, Estado)  VALUE (?,?,?,?,?,? )",array(
        $this->Sede,
        $this->Area,
        $this->Consecutivo,
        $this->Anho,
        $this->Asunto,
        $this->Estado,
        ));
return $id;
        $this->Disconnect();
    }

    // metodo para cambiar el estado de activo a inactivo y vicebersa
    public function acivar()
    {
        $this->updateRow ("update trasferencia set Estado = ? WHERE Id_trasferencia = ?",array(
        $this->Estado,
        $this->Id_Trasferencia,
        ));
        $this->Disconnect();
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
    public function getIdTrasferencia()
    {
        return $this->Id_Trasferencia;
    }

    /**
     * @param mixed $Id_Trasferencia
     */
    public function setIdTrasferencia($Id_Trasferencia)
    {
        $this->Id_Trasferencia = $Id_Trasferencia;
    }

    /**
     * @return mixed
     */
    public function getSede()
    {
        return $this->Sede;
    }

    /**
     * @param mixed $Sede
     */
    public function setSede($Sede)
    {
        $this->Sede = $Sede;
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
    public function getConsecutivo()
    {
        return $this->Consecutivo;
    }

    /**
     * @param mixed $Consecutivo
     */
    public function setConsecutivo($Consecutivo)
    {
        $this->Consecutivo = $Consecutivo;
    }


    /**
     * @return mixed
     */
    public function getAnho()
    {
        return $this->Anho;
    }

    /**
     * @param mixed $Anho
     */
    public function setAnho($Anho)
    {
        $this->Anho = $Anho;
    }

    /**
     * @return mixed
     */
    public function getAsunto()
    {
        return $this->Asunto;
    }

    /**
     * @param mixed $Asunto
     */
    public function setAsunto($Asunto)
    {
        $this->Asunto = $Asunto;
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