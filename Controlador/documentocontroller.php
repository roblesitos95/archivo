<?php

require_once ('../modelo/archivo_class.php');

require_once("../modelo/areaclass.php");

//recibir una accion y enviarla al menu
if (!empty($_GET['action'])){

    documentocontroller::main($_GET['action'],$_GET['table']);
}else{
    echo "NO hay accion";
}


class documentocontroller
{

    public static function main($action,$table)
    {
        if ($action=="crear"){
            documentocontroller::crear($table);
        }elseif ($action=="editar"){
            documentocontroller::editar();
        }
        elseif ($action=="saludo"){
            documentocontroller::saludo();
        }
        elseif ($action=="inactivo"){
            documentocontroller::inactivo();
        }
        elseif ($action=="activo"){
            documentocontroller::activo();
        }
    }

    private static function crear($table)
    {

        switch ($table){
            case "Cert_Desintegracion":
                $tipodocumento=$table;
                $balda = $_POST['balda'];
                $Documento = $_POST['Documento'];
                $Numero= $_POST['Numero'];
                $Placa= $_POST['Placa'];
                $Clase= $_POST['Clase'];
                $Fecha= $_POST['Fecha'];
                $area= $_POST['area'];
                $Descripcion= $_POST['Descripcion'];
                $estado="activo";

                $sql="INSERT INTO archivos (Tipo_Documento, fecha,Descripcion,
                      Numero, Documento, Placa, Clase, Trasferencia, balda_am_idbalda_am,estado) 
                      VALUES ('".$tipodocumento."','".$Fecha."','".$Descripcion."',
                      '".$Numero."','".$Documento."','".$Placa."','".$Clase."',".$area.",".$balda.",'".$estado."')";
            $num = archivo_class::insertar($sql);
                 echo $num;
                break;

            case "contables":

            break;


        }
    }

}