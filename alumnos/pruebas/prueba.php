<?php
    session_start(); 
    $usu = $_SESSION['usuario'];
    $idexamen = $_SESSION['idexamen'];
    $_SESSION['i'] = $_SESSION['i'] + 1;
    $idalumno = $_SESSION['idalumno'];

    $idpregunta = $_POST['siguiente'];

    array_push($_SESSION['pregunta'], $idpregunta);

    //Conexión con la base de datos
    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    //Varibles de respuestas
    $test = $_POST['respuesta'];

    if (isset($test)) {

        //Creamos una consulta para comprobar si la respuesta es la correcta
        $consultarespuesta = mysqli_query($conn, "SELECT id FROM preguntas WHERE correcta='$test'");
        $respuesta = mysqli_fetch_array($consultarespuesta);

        if (isset($respuesta['id'])) {
            $_SESSION['nota'] = $_SESSION['nota']+1;
            header('Location: doprueba.php');
            mysqli_close($conn);
        }
        else {
            $_SESSION['fallos'] = $_SESSION['fallos']+1;
            header('Location: doprueba.php');
            mysqli_close($conn);
        }

    }
    else {
        echo "Ha dao un caske xD";
    }


?>