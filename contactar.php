<?php

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    $nom = $_POST['nombre'];
    $email = $_POST['email'];
    $tel = $_POST['telefono'];
    $men = $_POST['mensaje'];
    
    //echo $nom . "<br>";
    //echo $email . "<br>";
    //echo $tel . "<br>";
    //echo $men . "<br>";

    //Creamos variable insert para insetar datos
    $insert = "INSERT INTO contactos(nombre, email, telefono, mensaje) values('$nom', '$email', '$tel', '$men')";

    //Creamos variable return para conectarnos a la base de datos e insertar los datos de la variable insert 
    $return = mysqli_query($conn, $insert);
    echo "Se ha contactado satisfactoriamente" . "<br>";
    header('Location: contact.php');
    mysqli_close($conn);

?>