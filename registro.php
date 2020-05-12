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

    //Consulta para verificar que el usuario no exíste antes de insertarlo
    $consultausuario = mysqli_query($conn,"SELECT usuario, email FROM alumnos WHERE usuario='$usu' OR email='$email'");
    $usurio = mysqli_fetch_array($consultausuario);
    if ($usurio['usuario'] == $usu) {
        echo "El usuario ya existe";
        header('Location: login.php');
        mysqli_close($conn);

        //Creamos una varible de sesión para indicar que el usuario existe
        session_start();
        $_SESSION['registro'] = 1; 
    }
    elseif ($usurio['email'] == $email) {
        echo "El email ya está registrado";
        header('Location: login.php');
        mysqli_close($conn);

        //Creamos una varible de sesión para indicar que el correo Está en uso
        session_start();
        $_SESSION['registro'] = 2; 
    }
    else {
        //Creamos variable insert para insetar datos
        $insert = "INSERT INTO alumnos(nombre, apellidos, usuario, email, contrasenia) values('$nom', '$ape', '$usu', '$email', '$contra')";

        //Creamos variable return para conectarnos a la base de datos e insertar los datos de la variable insert 
        $return = mysqli_query($conn, $insert);
        echo "Se ha registrado satisfactoriamente";
        header('Location: login.php');
        mysqli_close($conn);
    }

    
?>