<?php

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    $nom = $_POST['nombre'];
    $desc = $_POST['descripcion'];

        //$consultaultimoid = mysqli_query($conn, "SELECT id FROM cursos ORDER BY id DESC");
        //$ultimoid = mysqli_fetch_array($consultaultimoid);
        //echo $ultimoid['id'] . "<br>";
        //$idcurso = $ultimoid['id'] + 1;

        //Creamos variable insert para insetar datos
        $insert = "INSERT INTO cursos(nombre, descripcion) values('$nom', '$desc')";

        //Creamos variable return para conectarnos a la base de datos e insertar los datos de la variable insert 
        $return = mysqli_query($conn, $insert);
        
        echo "Se ha creado satisfactoriamente" . "<br>";
        header('Location: admincursos.php');
        mysqli_close($conn);

?>