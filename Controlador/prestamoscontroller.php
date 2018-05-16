<?php

require_once("../modelo/prestamosclass.php");

if (!empty($_GET['action'])) {
    prestamoscontroller::main($_GET['action']);
} else {
    echo "No hay accion";
}


class prestamoscontroller extends mysqli
{
    /**
     * @param $action
     */
    static function main($action)
    {
        if ($action == "crear") {
            prestamoscontroller::crear();
        } elseif ($action == "editar") {
            prestamoscontroller::editar();
        } elseif ($action == "saludo") {
            prestamoscontroller::saludo();
        } elseif ($action == "devolver") {
            prestamoscontroller::devolver();
        } elseif ($action == "select") {
            prestamoscontroller::select();
        }
    }

    private static function crear()
    {
        try {
            $arrayprestamo = array();
            $arrayprestamo['Solicitante'] = $_POST['Solicitante'];
            $arrayprestamo['Documento'] = $_POST['Documento'];
            $arrayprestamo['Fecha_Envio'] = $_POST['Fecha_Envio'];
            $arrayprestamo['Area'] = $_POST['Area'];
            $arrayprestamo['Destinatario'] = $_POST['Destinatario'];
            $arrayprestamo['Numero_Guia'] = $_POST['N_Guia'];
            $arrayprestamo['Observaciones'] = $_POST['Observaciones'];
            $arrayprestamo['Estado'] = "Prestado";
            $arrayprestamo ['Ubicacion'] = $_POST['Sala'] . "-" . $_POST['Fila'] . "-" . $_POST['Cara'] . "-" . $_POST['Estante'] . "-" . $_POST['Balda'] . "-" . $_POST['Arcivo_Modular'];

            $area = new prestamosclass($arrayprestamo);
            $area->insertar();

            header('Location:../vista/Prestamos/crear_prestamo.php?respuesta=correcto');
        } catch (Exception $e) {
            echo $e->getMessage();

            // header('Location:../vista/Prestamos/crear_prestamo.php?respuesta=error');

        }
    }

    private static function editar()
    {
        //
        if (isset($_POST['id'])) {
            try {
                $p = base64_decode($_POST['id']);
                $arraycontrato = array();
                $arraycontrato['Fecha_Reibido'] = $_POST['Fecha_Recibido'];
                $arraycontrato['Recibido_por'] = $_POST['Recibido_por'];
                $arraycontrato['Observaciones'] = $_POST['Observaciones'];
                $arraycontrato['Estado'] = "Devuelto";
                $arraycontrato ['idPrestamos'] = $p;
                $area = new prestamosclass($arraycontrato);
                $area->devolver();


                header('Location:../vista/Prestamos/ver_prestamo.php?l=' . base64_encode("todos") . '&respuesta=correcto');
            } catch (Exception $e) {
                echo $e->getMessage();

                // header('Location:../vista/Prestamos/ver_prestamo.php?l='.base64_encode("todos").'&respuesta=error');

            }
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            header('Location:../vista/Prestamos/crear_devolucion.php?editar=' . base64_encode($id));


        }
    }

    private static function saludo()
    {
        //metodo ajax para devolver una tabla con el objeto llamoado por id
        $q = intval($_GET['q']);

        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (!$con) {
            die('Error no se pudo conectar : ' . mysqli_error($con));
        }

        mysqli_select_db($con, "ajax_demo");


        $sql = "SELECT * FROM prestamos WHERE idPrestamos = '" . $q . "'";
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $documento = $row['Documento'];
            $Destinatario = $row['Destinatario'];
            $Fechaenvio = $row['Fecha_Envio'];
            $Fecharecivo = $row['Fecha_Reibido'];
            $Recibidopor = $row['Recibido_Por'];
            $Observaciones = $row['Observaciones'];
        }
        // escribo la tabla que se va a enviar en STRING
        $lol = "<div class=\"row\">" .
            "                        <div >" .
            "                            <div class=\"card\">" .
            "                                <div class=\"card-header card-header-icon\" data-background-color=\"blue\">" .
            "                                    <span style='font-size: 30px'><i class=\"icon-exclamation-circle\"></i></span>" .
            "                                </div>\n" .
            "                                <div class=\"card-content\">" .
            "                                    <h4 class=\"card-title\">Informacion de prestamo</h4>" .
            "                                    <div >" .
            "                                        <div >" .
            "                                            <div>" .
            "                                                <table class=\"table\">" .
            "                                                    <tbody>" .

            "                                                        <tr>" .
            "                                                            <td class=\"text-left\">Documento</td>" .
            "                                                            <td class=\"text-center text-primary\">" . $documento .
            "                                                            </td>" .
            "                                                        </tr>" .

            "                                                        <tr>" .
            "                                                            <td class=\"text-left\">Destinatario</td>" .
            "                                                            <td class=\"text-center text-primary\">" . $Destinatario .
            "                                                            </td>" .
            "                                                        </tr>" .

            "                                                        <tr>" .
            "                                                            <td class=\"text-left\">Fecha_Envio</td>" .
            "                                                            <td class=\"text-center text-primary\">" . $Fechaenvio .
            "                                                            </td>" .
            "                                                        </tr>" .

            "                                                        <tr>" .
            "                                                            <td class=\"text-left\">Recibido_por </td>" .
            "                                                           <td class=\"text-center text-primary\">" . $Recibidopor .
            "                                                            </td>" .
            "                                                        </tr>" .

            "                                                        <tr>" .
            "                                                            <td class=\"text-left\">Fecha_Recibido</td>" .
            "                                                            <td class=\"text-center text-primary\">" . $Fecharecivo .
            "                                                            </td>" .
            "                                                        </tr>" .

            "                                                        <tr>" .
            "                                                            <td class=\"text-left\">Observaciones</td>" .
            "                                                            <td class=\"text-center text-primary\">" . $Observaciones .
            "                                                            </td>" .
            "                                                        </tr>" .
            "                                                    </tbody>" .
            "                                                </table>" .
            "                                            </div>" .
            "                                        </div>" .
            "                                    </div>" .
            "                                </div>" .
            "                            </div>" .
            "                        </div>" .
            "                    </div>";
        echo $lol;

        mysqli_close($con);

    }

    private static function devolver()
    {
        //metodo auxiliar para pruebas
    }

    private static function select()
    {
        $tipo = $_POST["tipo"];


        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (!$con) {
            die('Error no se pudo conectar : ' . mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");
        $sql = "SELECT * FROM archivos WHERE  Tipo_Documento=\"" . $tipo . "\"";
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);
        $option = "<select class=\"form-control\" required  id=\"tipo\">
                                                <option selected disabled value=\"\" >Seleccione...</option>";
        while ($row = mysqli_fetch_array($result)) {
            $option .= "<option value='" . $row["id_Archivos"] . "'>" . $row["Numero"] . "</option>";
        }
        $option .= "</select>";

        echo json_encode($option);
    }


}