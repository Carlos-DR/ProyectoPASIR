<?php

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    echo $_POST['eliminar'];

    //Creamos variable insert para insetar datos
    //$insert = "INSERT INTO alumnos(nombre, apellidos, usuario, email, contrasenia) values('$nom', '$ape', '$usu', '$email', '$contra')";

    //Creamos variable return para conectarnos a la base de datos e insertar los datos de la variable insert 
    //$return = mysqli_query($conn, $insert);
    echo "<br>" . "Se muestra correctamente";
    //header('Location: admin.php');
    mysqli_close($conn);

?>