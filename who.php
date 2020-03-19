<?php
/*
$who = $_POST['tipo'];

    if ($who == 'profesor'){
        echo 'Soy un profesor';
    }

    elseif ($who == 'alumno'){
        echo 'Soy un alumno';
    }

    else {
        echo 'Ha dao un caske xD';
    }
*/

    $conn = mysqli_connect('localhost', 'root', '1234', 'dominguez');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    //Variable con los datos de inicio de sesión
    $usu = $_POST['usuario'];
    $contra = md5($_POST['contrasenia']);

    $alumno = mysqli_query("SELECT usuario FROM alumnos WHERE usuario = '".$usu."'");
    $profesor = mysqli_query("SELECT usuario FROM profesores WHERE usuario = '".$usu."'");

    //Creamos la sentencia para realizar la consulta
    if(isset($alumno) && ($alumno === true)){
        echo "Soy un alumno";
    }
    if(isset($profesor) && ($profesor === true)){
        echo "Soy un profesor";
    }

?>