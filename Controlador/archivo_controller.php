<?php

require_once('../modelo/archivo_class.php');

require_once("../modelo/areaclass.php");

//recibir una accion y enviarla al menu
if (!empty($_GET['action'])) {
    archivo_controller::main($_GET['action'], $_GET['table']);
} else {
    echo "NO hay accion";
}


class archivo_controller
{
    static function main($action, $table)
    {
        if ($action == "crear") {
            archivo_controller::crear($table);
        } elseif ($action == "editar") {
            archivo_controller::editar();
        } elseif ($action == "saludo") {
            archivo_controller::saludo();
        }
    }

    private static function crear($table)
    {
        switch ($table) {
            case "Cert_Desintegracion":
                $tipodocumento = $table;
                $balda = $_POST['balda'];
                $Documento = $_POST['Documento'];
                $Numero = $_POST['Numero'];
                $Placa = $_POST['Placa'];
                $Clase = $_POST['Clase'];
                $Fecha = $_POST['Fecha'];
                $Area = $_POST['area'];
                $Descripcion = $_POST['Descripcion'];

                $sql = "INSERT INTO archivos (Tipo_Documento, fecha,Descripcion,
                      Numero, Documento, Placa, Clase, Trasferencia,balda_am_idbalda_am ) 
                      VALUES ('" . $tipodocumento . "','" . $Fecha . "','" . $Descripcion . "',
                      '" . $Numero . "','" . $Documento . "','" . $Placa . "','" . $Clase . "'," . $Area . "," . $balda . ")";

                $num = archivo_class::insertar($sql);

                echo "so o que";

                // header('Location:../vista/config/Ubicacion.php?respuesta=lol');
                break;
            case "contables":
                echo "hola contable";
                break;


        }
    }

    private static function editar()
    {

    }
}