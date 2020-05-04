<?php
    session_start(); 
    $usu = $_SESSION['usuario'];
    $idcurso = $_SESSION['idcurso'];
    $idalumno = $_SESSION['idalumno'];
    $idexamen = $_POST['corregir'];
    $newnota = $_POST['newnota'];

    //Conexión con la base de datos
    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    $consultanota = mysqli_query($conn,"SELECT nota, notatest FROM notas WHERE idalumno='$idalumno' AND idexamen='$idexamen'");
    $nota = mysqli_fetch_array($consultanota);


    if ($nota['notatest'] < $newnota) {

        //Creamos variable update para modificar la nota
        $update = "UPDATE notas SET nota = $newnota WHERE idalumno='$idalumno' AND idexamen='$idexamen'";
        
        //Creamos variable return para conectarnos a la base de datos y modificar la nota
        $return = mysqli_query($conn, $update);

        header('Location: ../profesor.php');
        mysqli_close($conn);
    }
    elseif ($nota['notatest'] > $newnota) {
        echo "No se puede barjar la nota al alumno";
        header('Location: ../profesor.php');
        mysqli_close($conn);

    }
    elseif ($nota['notatest'] == $newnota) {
        echo "Muy bien cruck";
        header('Location: ../profesor.php');
        mysqli_close($conn);

    }
    else {
        echo "Ha dao un caske xD";
    }


?>