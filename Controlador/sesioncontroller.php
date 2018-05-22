<?php

if (!empty($_GET['accion'])) {
    sesioncontroller::main($_GET['accion']);
}
else {
    echo "No se encontro ninguna accion...";
}

class sesioncontroller
{

    static function main($action)
    {
        if ($action == "inicio") {
            sesioncontroller::inicio();
        } elseif ($action == "fin") {
            sesioncontroller::fin();
        } elseif ($action == "registrar") {
            sesioncontroller::registrar();
        }
    }

    static public function inicio()
    {
        $usu = $_POST['email'];
        $pass = $_POST['password'];

        $con = mysqli_connect('localhost', 'root', '', 'bd_documentacion');
        if (!$con) {
            echo('Error no se pudo conectar : ' . mysqli_error($con));
        }

        mysqli_select_db($con, "ajax_demo");

        $sql = "SELECT * FROM usuario WHERE Usuario ='" . $usu . "' and  Pass='" . $pass . "'";
        $con->set_charset("utf8");
        $result = mysqli_query($con, $sql);
        $p = array();


        while ($row = mysqli_fetch_array($result)) {

            $p["nombre"] = $row["Nombre"];
            $p["apellidos"] = $row["Apellidos"];
            $p["Cedula"] = $row["Cedula"];
            $p["usuario"] = $row["Usuario"];
            $p["pass"] = $row["Pass"];
            $p["foto"] = $row["foto"];
            $p["Pregunta"] = $row["Pregunta"];
            $p["Respuesta"] = $row["Respuesta"];

            session_start();
            $_SESSION["sesion"] = $p;


        }

        if (isset($_SESSION["sesion"])) {
            header('Location:../vista/Inicio/Salas');
        } else {
            header('Location:../vista/Inicio/Login?respuesta=error');

        }

        mysqli_close($con);

    }

    static public function fin()
    {
        session_start();
        session_unset();
        session_destroy();
        header('location:../vista/Inicio/Login');

    }

    private static function registrar()
    {
        $documento = $_POST['documento'];
        $new = $_FILES['Foto']['name'];
        $directorio = '../assets/img/fotos/';
        $newnew = $directorio . $documento . $new;
        move_uploaded_file($_FILES['Foto']['tmp_name'], "../vista/assets/img/fotos/" . $documento . $new);


        $Nombre = $_POST["firstname"];
        $Apellido = $_POST["lastname"];
        $Documento = $_POST["documento"];
        $Usuario = $_POST["email"];
        $Pass = $_POST["min"];
        $Foto = "$newnew";
        $Pregunta = $_POST["pregunta"];
        $Respuesta = $_POST["respuesta"];

        echo $_POST["firstname"];
        $conn = mysqli_connect('localhost', 'root', '', 'bd_documentacion');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->set_charset("utf8");
        $sql = "INSERT INTO usuario (Nombre, Apellidos, Cedula, Usuario, Pass, foto, Pregunta, Respuesta) VALUES ('" . $Nombre . "','" . $Apellido . "','" . $Documento . "','" . $Usuario . "','" . $Pass . "','" . $Foto . "','" . $Pregunta . "','" . $Respuesta . "')";

        if ($conn->query($sql) === TRUE) {
            header('Location:../vista/index/index.php?respuesta=correcto');
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();


    }

}