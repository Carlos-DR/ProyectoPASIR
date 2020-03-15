<?php
    echo "<pre>";

    //Creamos variable conn que es la conexión a la base de datos
    $conn = mysqli_connect('localhost', 'root', '1234', 'prueba');
    
    //Varible con el select de todo lo que queremos ver
    $sql = "SELECT id, name, email, created FROM users";

    //Esta variable almacena los resultado pero no los muestra, realiza la conexión y la vista
    $result = mysqli_query($conn, $sql);

    //Con esta variable metemos el resultado en un array
                                        //MYSQLI_NUM nos devuelve un índice numérico
                                        //MYSQLI_ASSOC nos devuelve un índice con el nombre del campo
                                        //MYSQLI_BOTH nos devuelve ambas cosas
    $rows = mysqli_fetch_array($result, MYSQLI_NUM);

    //Imprimimos el array
    print_r($rows);

    //bucle para mostrar todos los registros
    do {
        //variable array con los resultados
        $data[] = $rows;
    }while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC));

    print_r($data);

    //Cerramos la conexión de la varible conn
    mysqli_close($conn);

?>