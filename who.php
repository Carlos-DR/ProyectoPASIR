<?php
$who = $_POST['tipo'];

    if ($who == 'profesor'){
        echo 'Soy un profesor';
    }

    elseif ($who == 'alumno'){
        echo 'Soy un alumno';
    }

    else {
        echo 'Ha dao un caske xD';
    }

?>