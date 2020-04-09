<?php
    session_start(); 
    $usu = $_SESSION['usuario'];
    echo $usu . "<br>";

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    $consultaalumno = mysqli_query($conn, "SELECT id FROM alumnos WHERE usuario='$usu'");
    $idalumno = mysqli_fetch_array($consultaalumno);
    //echo $idalumno['id'];
    
    $idcurso = $_POST['matricular'];
    //echo $idcurso;

    //Matriculamos al alumno
    $insert = "INSERT INTO alumnos_cursos(idalumno, idcurso) VALUES('$idalumno[id]', $idcurso)";

    //Creamos variable return para conectarnos a la base de datos y matricular al alumno en el curso seleccionado 
    $return = mysqli_query($conn, $insert);
    echo "<br>" . "Se ha matriculado correctamente";
    header('Location: alumno.php');
    mysqli_close($conn);

?>