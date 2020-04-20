<?php
    session_start();
    $idexamen = $_SESSION['idexamen'];
    $_SESSION['i'] = $_SESSION['i'] + 1;


    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    //Creamos las variables necesarias para insertar las preguntas
    $pregunta = $_POST["pregunta"];
    $respuestac = $_POST["respuestac"];
    $respuestai1 = $_POST["respuestai1"];
    $respuestai2 = $_POST["respuestai2"];
    $respuestai3 = $_POST["respuestai3"];
    $tipo = $_POST["tipo"];

    if ($tipo == 0) {
        //Creamos variable insert para insetar datos
        $insert = "INSERT INTO preguntas(pregunta, correcta, incorrecta1, incorrecta2, incorrecta3, idexamen) values('$pregunta', '$respuestac', '$respuestai1', '$respuestai2', '$respuestai3', '$idexamen')";
        
        //Creamos variable return para conectarnos a la base de datos e insertar los datos de la variable insert 
        $return = mysqli_query($conn, $insert);

        header('Location: nuevoexamen.php');
        mysqli_close($conn);
    }
    elseif ($tipo == 1) {
        //Creamos variable insert para insetar datos
        $insert = "INSERT INTO preguntas(pregunta, correcta, incorrecta1, incorrecta2, incorrecta3, idexamen) values('$pregunta', NULL, NULL, NULL, NULL, '$idexamen')";
        
        //Creamos variable return para conectarnos a la base de datos e insertar los datos de la variable insert 
        $return = mysqli_query($conn, $insert);

        header('Location: nuevoexamen.php');
        mysqli_close($conn);
    }
    else {
        echo "Ha dao un caske xD";
    }


?>