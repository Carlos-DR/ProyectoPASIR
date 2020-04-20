<?php
 
    $idexamen = $_POST['borrar'];

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    //Creamos variable drop para eliminar al profesor
    $drop = "DELETE FROM examenes WHERE id='$idexamen'";
    $dropp = "DELETE FROM preguntas WHERE idexamen='$idexamen'";

    //Creamos variable return para conectarnos a la base de datos y eliminar al profesor seleccionado 
    $return = mysqli_query($conn, $drop);
    $return = mysqli_query($conn, $dropp);
    echo "<br>" . "Se ha borrado correctamente";
    header('Location: ../profesor.php');
    mysqli_close($conn);

?>