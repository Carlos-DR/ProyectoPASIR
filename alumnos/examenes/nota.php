<?php
    session_start(); 
    $usu = $_SESSION['usuario'];
    $idexamen = $_SESSION['idexamen'];
    $idalumno = $_SESSION['idalumno'];
    $nota = $_SESSION['nota'];
    $fallos = $_SESSION['fallos'];

    $idpregunta = $_POST['siguiente'];

    array_push($_SESSION['pregunta'], $idpregunta);

    //Conexión con la base de datos
    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";


    //Creamos variable insert para insetar datos
    $insert = "INSERT INTO notas(idalumno, idexamen, nota, fallos, hecho) values('$idalumno', '$idexamen', '$nota', '$fallos', 1)";
    
    //Creamos variable return para conectarnos a la base de datos e insertar los datos de la variable insert 
    $return = mysqli_query($conn, $insert);
    header('Location: vernota.php');
    mysqli_close($conn);


?>