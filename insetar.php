<?php
    //Creamos variable conn que es la conexión a la base de datos
    $conn = mysqli_connect('localhost', 'root', '1234', 'prueba');
    echo "<pre>";
    print_r($conn);

    //Creamos variable insert para insetar datos
    $insert = "insert into users(name, email) values('david', 'david@dominio.es')";

    //Creamos variable return para conectarnos a la base de datos e insertar los datos de la variable insert 
    $return = mysqli_query($conn, $insert);

    //imprimimos por pantalla el resultado
    print_r(($return));

    //Cerramos la conexión de la varible conn
    mysqli_close($conn);

?>