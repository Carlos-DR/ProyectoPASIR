<?php

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $contrasenia = md5($_POST['contrasenia']);

    $idprof = $_POST['idprofesor'];

    //Creamos variable edit para editar al profesor
    $edit = "UPDATE profesores SET nombre='$nombre', apellidos='$apellidos', usuario='$usuario', email='$email', contrasenia='$contrasenia' WHERE id='$idprof'";

    //Creamos variable return para conectarnos a la base de datos y editar al profesor seleccionado 
    $return = mysqli_query($conn, $edit);
    echo "<br>" . "Se ha editado correctamente";
    header('Location: admin.php');
    mysqli_close($conn);

?>