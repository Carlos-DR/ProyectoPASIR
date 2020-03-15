<?php
    echo "<pre>";
    $conn = mysqli_connect('localhost', 'root', '1234', 'prueba');

    //Variable para actualizar registros con la sentencia de actualización
        //users es la tabla, name el regustro a cambiar, id lo que usaremos de condición
    $update = "UPDATE users SET name = 'alex22' WHERE id = 1";

    //varible que realiza la conexión y el update
    $return = mysqli_query($conn, $update);

    print_r($return);

    //Cerramos la conexión de la varible conn
    mysqli_close($conn);

?>