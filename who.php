<?php

$who = $_POST['tipo'];

    if ($who == 'profesor'){
        echo 'Soy un profesor';
        header('Location: profesor.php');
    }

    elseif ($who == 'alumno'){
        echo 'Soy un alumno';
        header('Location: alumno.php');
    }

    else {
        echo 'Ha dao un caske xD';
    }

?>