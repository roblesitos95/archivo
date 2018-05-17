<?php

require_once('../modelo/archivo_class.php');

require_once("../modelo/areaclass.php");

//recibir una accion y enviarla al menu
if (! empty($_GET['action'])) {

    documentocontroller::main($_GET['action'], $_GET['table']);
} else {
    echo "NO hay accion";
}

class documentocontroller
{
    public static function main($action, $table)
    {
        if ($action == "crear") {
            documentocontroller::crear($table);
        } elseif ($action == "editar") {
            documentocontroller::editar();
        } elseif ($action == "saludo") {
            documentocontroller::saludo();
        } elseif ($action == "inactivo") {
            documentocontroller::inactivo();
        } elseif ($action == "activo") {
            documentocontroller::activo();
        }
    }

    /**
     * @param $table
     */
    private static function crear($table)
    {

        $num = "";

        switch ($table) {

// certificado de desintegracion
            case "Cert_Desintegracion":

                $tipodocumento = $table;
                $balda = $_POST['balda'];
                $Documento = $_POST['Documento'];
                $Numero = $_POST['Numero'];
                $Placa = $_POST['Placa'];
                $Clase = $_POST['Clase'];
                $Fecha = $_POST['Fecha'];
                $area = $_POST['area'];
                $Descripcion = $_POST['Descripcion'];
                $estado = "activo";

                $sql = "INSERT INTO archivos (Tipo_Documento, fecha,Descripcion,
                      Numero, Documento, Placa, Clase, Trasferencia, balda_am_idbalda_am,estado) 
                      VALUES ('".$tipodocumento."','".$Fecha."','".$Descripcion."',
                      '".$Numero."','".$Documento."','".$Placa."','".$Clase."',".$area.",".$balda.",'".$estado."')";

                //   $num = archivo_class::insertar($sql);
                echo $num;

                break;

// documento contable ;D
            case "Doc_Contable":

                $tipodocumento = $table;
                $balda = $_POST['am'];
                $Documento = $_POST['Documento'];
                $Numero = $_POST['Numero'];
                $Proveedor = $_POST['Proveedor'];
                $NIT = $_POST['NIT'];
                $Factura = $_POST['Factura'];
                $Fecha = $_POST['Fecha'];
                $Area = $_POST['Area'];
                $Descripcion = $_POST['Descripcion'];

                $sql = "INSERT INTO archivos (Tipo_Documento,Documento,Numero,Contratista,NIT,fecha,factura,Trasferencia,Descripcion,balda_am_idbalda_am) 
                VALUES ('".$tipodocumento."','".$Documento."','".$Numero."','".$Proveedor."','".$NIT."','".$Fecha."','".$Factura."',".$Area.",'".$Descripcion."',".$balda.") ";

                $num = archivo_class::insertar($sql);

                echo $num;

                break;

//CONTRATOS
            case "Contratos":

                $tipodocumento = $table;
                $balda = $_POST['balda'];
                $Nombre = $_POST['Nombre'];
                $Numero = $_POST['Numero'];
                $Contratista = $_POST['Contratista'];
                $Fecha = $_POST['Fecha'];
                $Area = $_POST['Area'];
                $Descripcion = $_POST['Descripcion'];

                $sql = "INSERT INTO archivos (Tipo_Documento, balda_am_idbalda_am, Empresa, Numero, Contratista,fecha,Trasferencia,Descripcion) 
                VALUES ('".$tipodocumento."',".$balda.",'".$Nombre."','".$Numero."','".$Contratista."','".$Fecha."',".$Area.",'".$Descripcion."')";

                $num = archivo_class::insertar($sql);

                echo $num;

                break;

//ESCRITURAS
            Case "Escritura":

                $tipodocumento = $table;
                $balda = $_POST['balda'];
                $Numero = $_POST['Numero'];
                $Notaria = $_POST['Notaria'];
                $De = $_POST['De'];
                $A = $_POST['A'];
                $Fecha = $_POST['Fecha'];
                $Area = $_POST['Area'];
                $Descripcion = $_POST['Descripcion'];

                $sql = "INSERT INTO archivos (Tipo_Documento,balda_am_idbalda_am,Numero,Notaria,De,A,fecha,Trasferencia,Descripcion) 
                VALUES ('".$tipodocumento."',".$balda.",'".$Numero."','".$Notaria."','".$De."','".$A."','".$Fecha."',".$Area.",'".$Descripcion."')";

                $num = archivo_class::insertar($sql);

                echo $num;

                break;

//FACTURAS
            case "Factura":

                $tipodefactura = "";
                if ($_POST["Tipo"] == "Otros") {
                    $tipodefactura = $_POST["Tipo2"];
                } else {
                    $tipodefactura = $_POST["Tipo"];
                }

                $tipodocumento = $table;
                $balda = $_POST['balda'];
                $Numero = $_POST['Numero'];
                $Titular = $_POST['Titular'];
                $NIT = $_POST['NIT'];
                $Contable = $_POST['Contable'];
                $Fecha = $_POST['Fecha'];
                $area = $_POST['area'];
                $Descripcion = $_POST['Descripcion'];

                $sql = "INSERT INTO archivos (Tipo_Documento,balda_am_idbalda_am,Numero,Contratista,NIT,fecha,Descripcion,Tipo,Documento,Trasferencia)
                        VALUES ('".$tipodocumento."',".$balda.",'".$Numero."','".$Titular."','".$NIT."','".$Fecha."','".$Descripcion."','".$tipodefactura."',
                        '".$Contable."',".$area.")";
                $num = archivo_class::insertar($sql);
                echo $num;
                break;

//HISTORIAS LABORALES
            case "HistLabo":
                $tipodocumento = $table;
                $balda = $_POST["balda"];
                $Documento = $_POST["Documento"];
                $Apellidos = $_POST["Apellidos"];
                $Nombres = $_POST["Nombres"];
                $Estado = $_POST["Estado"];
                $Numero = $_POST["Numero"];
                $Area = $_POST["Area"];
                $Descripcion = $_POST["Descripcion"];

                $sql = 'INSERT INTO archivos (Tipo_Documento,Documento,Apellidos,Nombres,Tipo,Numero, Trasferencia,Descripcion,balda_am_idbalda_am)
   
                  VALUES ("'.$tipodocumento.'","'.$Documento.'","'.$Apellidos.'","'.$Nombres.'","'.$Estado.'","'.$Numero.'","'.$Area.'","'.$Descripcion.'",'.$balda.')';

                $num = archivo_class::insertar($sql);
                echo $num;
                break;

//IMPORTACIONES
            case "Importacion":

                $tipodocumento = $table;
                $Nombre = $_POST["Nombre"];
                $Fecha = $_POST["Fecha"];
                $liquidacion = $_POST["liquidacion"];
                $Pedido = $_POST["pedido"];
                $Area = $_POST["area"];
                $Descripcion= $_POST["Descripcion"];
                $balda = $_POST["balda"];

                $sql="INSERT INTO archivos(Tipo_Documento,Documento,fecha,Liquidacion,Pedido,Trasferencia,Descripcion,balda_am_idbalda_am) 
                VALUES ('".$tipodocumento."','".$Nombre."','".$Fecha."','".$liquidacion."','".$Pedido."',".$Area.",'".$Descripcion."',".$balda.")";

                $num = archivo_class::insertar($sql);

                echo $num;
                break;

//NUEVO METODO SOLOCOPI Y PEGAR
            case "Impuestos":
                $tipodocumento = $table;
                $balda=$_POST["balda"];
                $Documento=$_POST["documento"];
                $Fecha=$_POST["Fecha"];
                $Area=$_POST["area"];
                $Descripcion=$_POST["Descripcion"];


                $sql="INSERT INTO archivos(Tipo_Documento,Documento,fecha,Trasferencia,Descripcion,balda_am_idbalda_am)
                VALUES ('".$tipodocumento."','".$Documento."','".$Fecha."',".$Area.",'".$Descripcion."',".$balda.")";

                $num = archivo_class::insertar($sql);

                echo $num;
                break;

//NUEVO METODO SOLOCOPI Y PEGAR
            case "New_metod":

                break;


        }
    }
}