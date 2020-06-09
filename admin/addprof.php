<?php

    $array = explode(" ", $_POST['add']);
    $idcurso = $array[0];
    $idprof = $array[1];

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    //Creamos variable add para agregar el profesor al curso correspondiente 
    $add = "INSERT INTO cursos_profesores(idcurso, idprofesor) values('$idcurso', '$idprof')";

    //Creamos variable return para conectarnos a la base de datos y eliminar al profesor seleccionado 
    $return = mysqli_query($conn, $add);
    echo "<br>" . "Se ha agregado correctamente";
    header('Location: admincursos.php');
    mysqli_close($conn);

?>