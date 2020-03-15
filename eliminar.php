<?php
    echo "<pre>";
    $conn = mysqli_connect('localhost', 'root', '1234', 'prueba');

    //Variable para eliminar con la sentencia correspondiente
        //users es la tabla que usaremos, elimiramos lo que tenga la id 1
    $delete = "DELETE FROM users WHERE id = 1";

    //varible que realiza la conexión y el delete.
    $return = mysqli_query($conn, $delete);

    print_r($return);

    //Cerramos la conexión de la varible conn
    mysqli_close($conn);

?>