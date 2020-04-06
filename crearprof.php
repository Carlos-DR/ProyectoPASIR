<?php

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    $nom = $_POST['nombre'];
    $ape = $_POST['apellidos'];
    $usu = $_POST['usuario'];
    $email = $_POST['email'];
    $contra = md5($_POST['contrasenia']);

    /*
    print_r($usu);
    echo "<p>";
    print_r($email);
    echo "<p>";
    */
    //Varible para realizar una comparativa y verificar que el usuario no existe antes de insertarlo
    /*
    $comprobar_usuario = mysqli_query($conn,"SELECT usuario FROM alumnos WHERE usuario = '".$usu."'");
    $comprobar_email = mysqli_query($conn,"SELECT email FROM alumnos WHERE email = '".$email."'");

    echo "<pre>";
    print_r($comprobar_usuario);
    echo "<p>";
    print_r($comprobar_email);
    echo "<p>";
    */
    //Comparativa - Depuración de errores
    /*
    if ("'".$comprobar_usuario."'" == "'".$usu."'"){
        echo "El nombre de usuario ya existe, pruebe con otro";
        mysqli_close($conn);
    }

    if ("'".$comprobar_email."'" == "'".$email."'"){
        echo "Este email ya está registrado";
        echo "Has olvidado tu contraseña? pincha aqui";
        mysqli_close($conn);
    }

    else{
        */
        //Creamos variable insert para insetar datos
        $insert = "INSERT INTO profesores(nombre, apellidos, usuario, email, contrasenia) values('$nom', '$ape', '$usu', '$email', '$contra')";

        //Creamos variable return para conectarnos a la base de datos e insertar los datos de la variable insert 
        $return = mysqli_query($conn, $insert);
        echo "Se ha registrado satisfactoriamente";
        header('Location: admin.php');
        mysqli_close($conn);

?>