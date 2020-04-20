<?php

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    $tema = $_POST['tema'];
    $num = $_POST['num'];
    $idcurso = $_POST['curso'];
    $i = 0;

    //echo $tema . "<br>";
    //echo $num . "<br>";
    //echo $idcurso . "<br>";

        //Sacamos el id del último examen creado
        $consultaultimoid = mysqli_query($conn, "SELECT id FROM examenes ORDER BY id DESC");
        $ultimoid = mysqli_fetch_array($consultaultimoid);
        echo $ultimoid['id'] . "<br>";

        //creamos una variable para predecir cual va a ser el id del nuevo examen (lo necesitaremos mas adelante)
        $idexamen = $ultimoid['id'] + 1;
        echo $idexamen;

        //Creamos variable insert para insetar datos
        $insert = "INSERT INTO examenes(id, tema, temanum, idcurso) values('$idexamen', '$tema', '$num', '$idcurso')";

        //Creamos variable return para conectarnos a la base de datos e insertar los datos de la variable insert 
        $return = mysqli_query($conn, $insert);
        echo "Se ha registrado satisfactoriamente" . "<br>";

        session_start();
        $_SESSION['idexamen'] = $idexamen;
        $_SESSION['i'] = $i;
        header('Location: nuevoexamen.php');
        mysqli_close($conn);

?>