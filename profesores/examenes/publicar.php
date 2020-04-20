<?php

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    $idexamen = $_POST['publico'];

    $consultaestado = mysqli_query($conn, "SELECT publico FROM examenes WHERE id='$idexamen'");
    $estado = mysqli_fetch_array($consultaestado);

    if ($estado['publico'] == 0) {
        //Creamos variable edit para editar al profesor
        $edit = "UPDATE examenes SET publico=1 WHERE id='$idexamen'";

        //Creamos variable return para conectarnos a la base de datos y editar al profesor seleccionado 
        $return = mysqli_query($conn, $edit);
        echo "<br>" . "Se ha editado correctamente";
        header('Location: examenes.php');
        mysqli_close($conn);
    }
    elseif ($estado['publico'] == 1) {
        //Creamos variable edit para editar al profesor
        $edit = "UPDATE examenes SET publico=0 WHERE id='$idexamen'";

        //Creamos variable return para conectarnos a la base de datos y editar al profesor seleccionado 
        $return = mysqli_query($conn, $edit);
        echo "<br>" . "Se ha editado correctamente";
        header('Location: examenes.php');
        mysqli_close($conn);
    }

    

?>