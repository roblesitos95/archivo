<?php


//recibir una accion y enviarla al menu
if (! empty($_GET['action'])) {
    require_once("../modelo/archivo_class.php");
    documentocontroller::main($_GET['action']);
} else {
    echo "lol";
}

class documentocontroller
{
    public static function main($action)

    {
        if ($action == "crear") {
            documentocontroller::crear($_GET["table"]);
        } elseif ($action == "editar") {
            documentocontroller::editar($_GET["table"]);
        } elseif ($action == "ver") {
            documentocontroller::ver();
        } elseif ($action == "inactivo") {
            documentocontroller::inactivo();
        } elseif ($action == "activo") {
            documentocontroller::activo();
        } elseif ($action == "Documento") {
            documentocontroller::Documento();
        } elseif ($action == "topo") {
            documentocontroller::topo();
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

                $num = archivo_class::insertar($sql);
                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];

                echo json_encode($arr);

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

                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];

                echo json_encode($arr);

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

                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];

                echo json_encode($arr);
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
                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];
                echo json_encode($arr);

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

                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];

                echo json_encode($arr);
                break;

//HISTORIAS LABORALES
            case "Historia_laboral":
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

                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];

                echo json_encode($arr);
                break;

//IMPORTACIONES
            case "Importacion":

                $tipodocumento = $table;
                $Nombre = $_POST["Nombre"];
                $Fecha = $_POST["Fecha"];
                $liquidacion = $_POST["liquidacion"];
                $Pedido = $_POST["pedido"];
                $Area = $_POST["area"];
                $Descripcion = $_POST["Descripcion"];
                $balda = $_POST["balda"];

                $sql = "INSERT INTO archivos(Tipo_Documento,Documento,fecha,Liquidacion,Pedido,Trasferencia,Descripcion,balda_am_idbalda_am) 
                VALUES ('".$tipodocumento."','".$Nombre."','".$Fecha."','".$liquidacion."','".$Pedido."',".$Area.",'".$Descripcion."',".$balda.")";

                $num = archivo_class::insertar($sql);

                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];

                echo json_encode($arr);

                break;

//IMPUESTOS
            case "Impuestos":

                $tipodocumento = $table;
                $balda = $_POST["balda"];
                $Documento = $_POST["documento"];
                $Fecha = $_POST["Fecha"];
                $Area = $_POST["area"];
                $Descripcion = $_POST["Descripcion"];

                $sql = "INSERT INTO archivos(Tipo_Documento,Numero,fecha,Trasferencia,Descripcion,balda_am_idbalda_am)
                VALUES ('".$tipodocumento."','".$Documento."','".$Fecha."',".$Area.",'".$Descripcion."',".$balda.")";

                $num = archivo_class::insertar($sql);

                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];

                echo json_encode($arr);
                break;

//SEGURIDAD SOSIAL
            case "Seguridad_social":
                $tipodocumento = $table;
                $balda = $_POST["balda"];
                $Fecha = $_POST["Fecha"];
                $documento = $_POST["documento"];
                $empresadeservicio = $_POST["empresadeservicio"];
                $empresalaboral = $_POST["empresalaboral"];
                $Area = $_POST["Area"];
                $Ciudad = $_POST["Ciudad"];
                $Descripcion = $_POST["Descripcion"];
                $Numero = $_POST["Numero"];

                $sql = "INSERT INTO archivos (Tipo_Documento,balda_am_idbalda_am,fecha,Documento,Empresa,Contratista,Trasferencia,Descripcion,Ciudad,Numero)
                VALUES ('".$tipodocumento."',".$balda.",'".$Fecha."','".$documento."','".$empresalaboral."','".$empresadeservicio."',".$Area.",'".$Descripcion."','".$Ciudad."','".$Numero."')";

                $num = archivo_class::insertar($sql);

                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];

                echo json_encode($arr);
                break;

//INFORME DE ENTRADA
            case "Informe_Entrada":
                $tipodocumento = $table;
                $Numero = $_POST["Numero"];
                $Sucursa = $_POST["Sucursal"];
                $Proveedor = $_POST["Proveedor"];
                $Fecha = $_POST["Fecha"];
                $Area = $_POST["Area"];
                $Descripcion = $_POST["Descripcion"];
                $balda = $_POST["balda"];

                $sql = "INSERT INTO archivos (Tipo_Documento,Numero,Ciudad,Contratista,fecha,Trasferencia,Descripcion,balda_am_idbalda_am)
                VALUES ('".$tipodocumento."','".$Numero."','".$Sucursa."','".$Proveedor."','".$Fecha."',".$Area.",'".$Descripcion."',".$balda.")";

                $num = archivo_class::insertar($sql);

                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];

                echo json_encode($arr);
                break;

//NUEVO METODO SOLOCOPI Y PEGAR
            case "Libro_oficial":
                $tipodocumento = $table;
                $Empresa = $_POST["Empresa"];
                $Fecha = $_POST["Fecha"];
                $Area = $_POST["Area"];
                $Descripcion = $_POST["Descripcion"];
                $balda = $_POST["balda"];

                $sql = "INSERT INTO archivos (Tipo_Documento,Empresa,fecha,Trasferencia,Descripcion,balda_am_idbalda_am)
VALUES ('".$tipodocumento."','".$Empresa."','".$Fecha."',".$Area.",'".$Descripcion."',".$balda.")";

                $num = archivo_class::insertar($sql);

                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];

                echo json_encode($arr);
                break;

//NUEVO METODO SOLOCOPI Y PEGAR
            case "New_metod":

                break;
        }
    }

    public static function ver(){
        $tipo=$_POST["Tipo"];
        $id=$_POST["id"];


        switch ($tipo) {
            //certificado de desintegracion
            case "Cert_Desintegracion":
                echo '../cert_desintegracion/Crear_Desintegracion.php?btn=editar&archivo='.$id;
                break;
            //Contratos
            case "Contratos":
                echo '../Contratos/crear_contratos.php?btn=editar&archivo='.$id;
                break;
            //documentos contables
            case "Doc_Contable":
                echo '../contables/crear_contable.php?btn=editar&archivo='.$id;
                break;
            //Escrituras
            case "Escritura":
                echo '../Escrituras/crear_escrituras.php?btn=editar&archivo='.$id;
                break;
            //Facturas
            case "Factura":
                echo '../facturas/crear_factura.php?btn=editar&archivo='.$id;
                break;
            //historias laborales
            case "Historia_laboral":
                echo '../histlaborales/crear.php?btn=editar&archivo='.$id;
                break;
            //importaciones
            case"Importacion":
                echo '../importaciones/cuerpo.php?btn=editar&archivo='.$id;
                break;
            //impuestos
            case"Impuestos":
                echo '../Impuestos/crear_impuesto.php?btn=editar&archivo='.$id;
                break;
            case "Seguridad_social";
                echo '../seguridad/crearseguridadsocial.php?btn=editar&archivo='.$id;
                break;
            case "Informe_Entrada";
                echo '../info_entrada/crear_info_entrada.php?btn=editar&archivo='.$id;
                break;
            case "Libros_Oficiales";
                echo '../Libros_Oficiales/crear_libro.php?btn=editar&archivo='.$id;
                break;
        }
    }

    function editar($table)
    {

        $num = "";

        switch ($table) {

// certificado de desintegracion
            case "Cert_Desintegracion":


                $id = $_POST['archivo'];
                $Documento = $_POST['Documento'];
                $Numero = $_POST['Numero'];
                $Placa = $_POST['Placa'];
                $Clase = $_POST['Clase'];
                $Fecha = $_POST['Fecha'];
                $Descripcion = $_POST['Descripcion'];

                $sql = "UPDATE archivos SET fecha = '".$Fecha."', Descripcion = '".$Descripcion."', Numero = '".$Numero."', Documento = '".$Documento."', Placa = '".$Placa."', Clase = '".$Clase."' WHERE archivos.id_Archivos = ".$id;

               $num = archivo_class::editar($sql);

               echo $num;

                break;

// documento contable ;D
            case "Doc_Contable":

                $balda = $_POST['id'];
                $Documento = $_POST['Documento'];
                $Numero = $_POST['Numero'];
                $Proveedor = $_POST['Proveedor'];
                $NIT = $_POST['NIT'];
                $Factura = $_POST['Factura'];
                $Fecha = $_POST['Fecha'];
                $Descripcion = $_POST['Descripcion'];

                $sql = "UPDATE archivos SET Documento='".$Documento."', Numero='".$Numero."', Contratista ='".$Proveedor."', NIT='".$NIT."', factura='".$Factura."', fecha='".$Fecha."', Descripcion='".$Descripcion."' WHERE id_Archivos = ".$balda;

                $num = archivo_class::editar($sql);


                echo $num;

                break;

//CONTRATOS
            case "Contratos":


                $id = $_POST['archivo'];
                $Nombre = $_POST['Nombre'];
                $Numero = $_POST['Numero'];
                $Contratista = $_POST['Contratista'];
                $Fecha = $_POST['Fecha'];
                $Descripcion = $_POST['Descripcion'];

                $sql = "UPDATE archivos SET fecha = '".$Fecha."', Descripcion = '".$Descripcion."', Numero = '".$Numero."', Empresa = '".$Nombre."', Contratista = '".$Contratista."' WHERE archivos.id_Archivos =".$id;

                $num = archivo_class::editar($sql);

                echo $num;

                break;

//ESCRITURAS
            Case "Escritura":

                $tipodocumento = $table;
                $id= $_POST['id'];
                $Numero = $_POST['Numero'];
                $Notaria = $_POST['Notaria'];
                $De = $_POST['De'];
                $A = $_POST['A'];
                $Fecha = $_POST['Fecha'];
                $Area = $_POST['Area'];
                $Descripcion = $_POST['Descripcion'];

                $sql = "UPDATE archivos SET Numero='".$Numero."', Notaria='".$Notaria."', De='".$De."', A='".$A."',fecha='".$Fecha."', Trasferencia='".$Area."', Descripcion='".$Descripcion."' WHERE archivos.id_Archivos =".$id;

                $num = archivo_class::editar($sql);
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


                $id = $_POST['id'];
                $Numero = $_POST['Numero'];
                $Titular = $_POST['Titular'];
                $NIT = $_POST['NIT'];
                $Contable = $_POST['Contable'];
                $Fecha = $_POST['Fecha'];
                $area = $_POST['area'];
                $Descripcion = $_POST['Descripcion'];

                $sql = "UPDATE archivos SET  Tipo= '".$tipodefactura."',Numero='".$Numero."', Contratista='".$Titular."',NIT='".$NIT."',Documento='".$Contable."', fecha='".$Fecha."',Descripcion='".$Descripcion."' where archivos.id_Archivos=".$id;
                $num = archivo_class::editar($sql);

                echo $num;
                break;

//HISTORIAS LABORALES
            case "Historia_laboral":
                $id = $_POST["id"];
                $Documento = $_POST["Documento"];
                $Apellidos = $_POST["Apellidos"];
                $Nombres = $_POST["Nombres"];
                $Estado = $_POST["Estado"];
                $Numero = $_POST["Numero"];
                $Descripcion = $_POST["Descripcion"];

                $sql = "UPDATE archivos SET Documento='".$Documento."',Apellidos='".$Apellidos."',Nombres='".$Nombres."',Tipo='".$Estado."',Numero='".$Numero."',Descripcion='".$Descripcion."' where archivos.id_Archivos=".$id;

                $num = archivo_class::editar($sql);


                echo $num;
                break;

//IMPORTACIONES
            case "Importacion":

                $tipodocumento = $table;
                $Nombre = $_POST["Nombre"];
                $Fecha = $_POST["Fecha"];
                $liquidacion = $_POST["liquidacion"];
                $Pedido = $_POST["pedido"];
                $Descripcion = $_POST["Descripcion"];
                $id = $_POST["id"];

                $sql = "UPDATE archivos SET Documento='".$Nombre."',Descripcion='".$Descripcion."',fecha='".$Fecha."',Liquidacion='".$liquidacion."',Pedido='".$Pedido."' WHERE archivos.id_Archivos=".$id;

                $num = archivo_class::editar($sql);

                echo $num;

                break;

//IMPUESTOS
            case "Impuestos":

                $id= $_POST["id"];
                $Documento = $_POST["documento"];
                $Fecha = $_POST["Fecha"];
                $Area = $_POST["area"];
                $Descripcion = $_POST["Descripcion"];

                $sql = "UPDATE archivos SET Numero='".$Documento."', fecha='".$Fecha."', Trasferencia='".$Area."', Descripcion='".$Descripcion."' where archivos.id_Archivos=".$id;

                $num = archivo_class::editar($sql);



                echo $num   ;
                break;

//SEGURIDAD SOSIAL
            case "Seguridad_social":
                $id = $_POST["id"];
                $Fecha = $_POST["Fecha"];
                $documento = $_POST["documento"];
                $empresadeservicio = $_POST["empresadeservicio"];
                $empresalaboral = $_POST["empresalaboral"];
                $Area = $_POST["Area"];
                $Ciudad = $_POST["Ciudad"];
                $Descripcion = $_POST["Descripcion"];
                $Numero = $_POST["Numero"];

                $sql = "UPDATE archivos SET fecha= '".$Fecha."', Documento='$documento', Contratista='".$empresadeservicio."', Empresa='".$empresalaboral."', Trasferencia='".$Area."',Ciudad='".$Ciudad."',Descripcion='".$Descripcion."', Numero='".$Numero."' where archivos.id_Archivos=".$id;

                $num = archivo_class::editar($sql);



                echo $num;
                break;

//INFORME DE ENTRADA
            case "Informe_Entrada":
                $tipodocumento = $table;
                $Numero = $_POST["Numero"];
                $Sucursa = $_POST["Sucursal"];
                $Proveedor = $_POST["Proveedor"];
                $Fecha = $_POST["Fecha"];
                $Area = $_POST["Area"];
                $Descripcion = $_POST["Descripcion"];
                $balda = $_POST["balda"];

                $sql = "INSERT INTO archivos (Tipo_Documento,Numero,Ciudad,Contratista,fecha,Trasferencia,Descripcion,balda_am_idbalda_am)
                VALUES ('".$tipodocumento."','".$Numero."','".$Sucursa."','".$Proveedor."','".$Fecha."',".$Area.",'".$Descripcion."',".$balda.")";

                $num = archivo_class::insertar($sql);

                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];

                echo json_encode($arr);
                break;

//NUEVO METODO SOLOCOPI Y PEGAR
            case "Libro_oficial":
                $tipodocumento = $table;
                $Empresa = $_POST["Empresa"];
                $Fecha = $_POST["Fecha"];
                $Area = $_POST["Area"];
                $Descripcion = $_POST["Descripcion"];
                $balda = $_POST["balda"];

                $sql = "INSERT INTO archivos (Tipo_Documento,Empresa,fecha,Trasferencia,Descripcion,balda_am_idbalda_am)
VALUES ('".$tipodocumento."','".$Empresa."','".$Fecha."',".$Area.",'".$Descripcion."',".$balda.")";

                $num = archivo_class::insertar($sql);

                $tabla = archivo_class::table($num);
                $arr = [$num, $tabla];

                echo json_encode($arr);
                break;

//NUEVO METODO SOLOCOPI Y PEGAR
            case "New_metod":

                break;
        }
    }

    private static function Documento()
    {

        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (! $con) {
            die('Error no se pudo conectar : '.mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");



        $sql = "select archivos.Documento FROM archivos where Tipo_Documento='Cert_Desintegracion' GROUP BY Documento";
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);
        $data=array();
        while ($row = mysqli_fetch_array($result)) {
           array_push($data,$row["Documento"]);
        }

       echo json_encode($data);

    }

    public  static function topo(){

        $id=$_POST["id"];



        $sala=null;
        $fila=null;
        $cara=null;
        $estante=null;
        $balda=null;
        $am=null;

        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (! $con) {
            die('Error no se pudo conectar : '.mysqli_error($con));
        }
        mysqli_select_db($con, "ajax_demo");



        $sql = "select archivos.balda_am_idbalda_am FROM archivos where id_Archivos =".$id;
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {

        }
        $con->close();


$lol=array($sala,$fila,$cara,$estante,$balda,$am);

echo json_encode($lol);
    }


}