<?php

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    $idcurso = $_POST['eliminar'];

    //Creamos variable drop para eliminar al profesor
    $drop = "DELETE FROM cursos WHERE id='$idcurso'";

    //Creamos variable return para conectarnos a la base de datos y eliminar al profesor seleccionado 
    $return = mysqli_query($conn, $drop);
    echo "<br>" . "Se ha borrado correctamente";
    header('Location: admincursos.php');
    mysqli_close($conn);

?>