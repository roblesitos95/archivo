<?php
/**
 * Created by PhpStorm.
 * User: RBTEXCTUTA43
 * Date: 23/03/2018
 * Time: 03:15 PM
 */

require_once("../modelo/areaclass.php");

//recibir una accion y enviarla al menu
if (!empty($_GET['action'])) {
    areacontroller::main($_GET['action']);
} else {
    echo "NO hay accion";
}


class areacontroller
{
    /**
     * @param $action
     */

    static function main($action)
    {
        if ($action == "crear") {
            areacontroller::crear();
        } elseif ($action == "editar") {
            areacontroller::editar();
        } elseif ($action == "saludo") {
            areacontroller::saludo();
        } elseif ($action == "inactivo") {
            areacontroller::inactivo();
        } elseif ($action == "activo") {
            areacontroller::activo();
        } elseif ($action == "upload") {
            areacontroller::upload();
        }
    }

    private static function crear()
    {
        //obtener el consecutivo correspondiente a la trasfrecia

        $consecutivo = areacontroller::conse();

        try {
            $num = $_POST['anho'];
            $anho = "";
            for ($i = 0; $i < count($num); $i++) {
                $anho .= $num[$i];
                $anho .= "-";
                echo $anho;
            }

            $arrayarea = array();
            $arrayarea['Sede'] = $_POST['Sede'];
            $arrayarea['Area'] = $_POST['Area'];
            $arrayarea['Anho'] = $anho;
            $arrayarea['Asunto'] = $_POST['Asunto'];
            $arrayarea['Consecutivo'] = $consecutivo;
            $arrayarea['Estado'] = 'Activo';

            $area = new areaclass($arrayarea);
            $id = $area->insertar();

            // si guarda redirecciona a la vista dando un mensaje de error
            header('Location:../vista/areatrasferencia/addfile.php?respuesta=correcto&id=' . $id);
        } catch (Exception $e) {
            header('Location:../vista/areatrasferencia/creararea.php?respuesta=error');
        }
    }

    private function conse()
    {
        //coneccion remota para obtener el consecutivo
        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

        mysqli_select_db($con, "ajax_demo");

        $sql = "SELECT COUNT(*) FROM trasferencia";
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $ultimo = $row["COUNT(*)"];
            $consecutivo = $ultimo + 1;
        }
        mysqli_close($con);
        return $consecutivo;

    }

    private static function editar()
    {
        //no se permiten ediciones en ese objeto
    }

    private static function inactivo()
    {
        //obtenemos la accion de editar un obj en el atributo estado
        try {
            $id = $_GET['id'];
            $arrayarea['Estado'] = 'Inactivo';
            $arrayarea['Id_Trasferencia'] = $id;
            $area = new areaclass($arrayarea);
            $area->acivar();

            // si logra editar el objeto redirecciona a la vista para actualizar
            header('Location:../vista/areatrasferencia/verarea.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private static function activo()
    {
        //obtenemos la accion de editar un obj en el atributo estado
        try {
            $id = $_GET['id'];
            $arrayarea['Estado'] = 'Activo';
            $arrayarea['Id_Trasferencia'] = $id;
            $area = new areaclass($arrayarea);
            $area->acivar();

            // si se logra editar el objeto redirecciona a la vista para actualizar
            header('Location:../vista/areatrasferencia/verarea.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private static function upload()
    {
        // upload.php
// 'images' refers to your file input name attribute
        if (empty($_FILES['file-es'])) {
            echo json_encode(['error' => 'No files found for upload.']);
            // or you can throw an exception
            return; // terminate
        }

// get the files posted
        $images = $_FILES['file-es'];

// get user id posted
        $userid = $_GET["id"];

// get user name posted
        $username = empty($_POST['username']) ? '' : $_POST['username'];

// a flag to see if everything is ok
        $success = null;

        // file paths to store
        $paths = ["../upload"];

// get file names
        $filenames = $images['name'];

// loop and process files
        for ($i = 0; $i < count($filenames); $i++) {
            $ext = explode('.', basename($filenames[$i]));
            $target = "../upload/" . md5(uniqid()) . "." . array_pop($ext);
            if (move_uploaded_file($images['tmp_name'][$i], $target)) {
                $success = true;
                $paths[] = $target;
            } else {
                $success = false;
                break;
            }
        }

// check and process based on successful status
        if ($success === true) {
            // call the function to save all data to database
            // code for the following function `save_data` is not
            // mentioned in this example

            areacontroller::save_data($userid, $target);

            // store a successful response (default at least an empty array). You
            // could return any additional response info you need to the plugin for
            // advanced implementations.
            $output = [];
            // for example you can get the list of files uploaded this way
            // $output = ['uploaded' => $paths];
        } elseif ($success === false) {
            $output = ['error' => 'Error while uploading images. Contact the system administrator'];
            // delete any uploaded files
            foreach ($paths as $file) {
                unlink($file);
            }
        } else {
            $output = ['error' => 'No files were processed.'];
        }

// return a json encoded response for plugin to process successfully
        echo json_encode($output);
    }

    private function save_data($id, $file)
    {
        $con = mysqli_connect("localhost", "root", "", "bd_documentacion");

        if (!$con) {
            echo "Error al conectar :(";
        }
        $name="../".$file;
        $sql = 'UPDATE `trasferencia` SET `archivo` = "' . $name . '" WHERE `trasferencia`.`idTrasferencia` =' . $id;
        $con->set_charset("utf8");
        mysqli_query($con, $sql);


    }

}