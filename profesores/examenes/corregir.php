<?php
    session_start(); 
    $usu = $_SESSION['usuario'];
    $idcurso = $_SESSION['idcurso'];
    $idalumno = $_SESSION['idalumno'];
    $idexamen = $_POST['corregir'];

    $_SESSION['h'] = $_SESSION['h'] + 1;
    
    $idpregunta = $_SESSION['idpreg'];

    array_push($_SESSION['pregunta'], $idpregunta);

    //Conexión con la base de datos
    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    //Varibles de respuestas
    $corregir = $_POST['corregir'];


    if ($corregir == 1) {

        //Creamos variable update para modificar la nota
        $update = "UPDATE notas SET nota = nota +1 WHERE idalumno='$idalumno' AND idexamen='$idexamen'";
        
        //Creamos variable return para conectarnos a la base de datos y modificar la nota
        $return = mysqli_query($conn, $update);

        header('Location: ./corregir.php');
        mysqli_close($conn);
    }
    elseif ($corregir == 0) {

        header('Location: corregir.php');
        mysqli_close($conn);

    }
    else {
        echo "Ha dao un caske xD";
    }


?>