<?php
    session_start(); 
    $usu = $_SESSION['usuario'];

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    $email = $_POST['email'];
    $contrasenia = md5($_POST['contrasenia']);

    //echo $email . "<br>";
    //echo $contrasenia;

    //Creamos variable edit para editar al alumno
    $edit = "UPDATE alumnos SET email='$email', contrasenia='$contrasenia' WHERE usuario='$usu'";

    //Creamos variable return para conectarnos a la base de datos y editar al alumno seleccionado 
    $return = mysqli_query($conn, $edit);
    echo "<br>" . "Se ha editado correctamente";
    header('Location: alumno.php');
    mysqli_close($conn);

?>