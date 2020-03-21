<?php

$who = $_POST['tipo'];
$usu = $_POST['usuario'];
$contra = $_POST['contrasenia'];

    if ($who == 'profesor'){
        echo 'Soy un profesor';
        class loguear {
            public function log ($user,$passwd) {
                require_once './conexion.php';
                $connect = new connection();
                $sql = "SELECT * FROM profesores WHERE usuario like '".$usu."' AND contrasenia = MD5('".$contra."')";
                $result = $connect->execSQL($sql);
                if ($result) {
                    $record = $result->fetch_assoc();
                    $return = $record['usuario'];
                    return $return;
                } else {
                    $return = 'Error';
                    return $return;
                }
            }
        }
        header('Location: profesor.php');
    }

    elseif ($who == 'alumno'){
        echo 'Soy un alumno';
        class loguear {
            public function log ($user,$passwd) {
                require_once './conexion.php';
                $connect = new connection();
                $sql = "SELECT * FROM alumnos WHERE usuario like '".$usu."' AND contrasenia = MD5('".$contra."')";
                $result = $connect->execSQL($sql);
                if ($result) {
                    $record = $result->fetch_assoc();
                    $return = $record['usuario'];
                    return $return;
                } else {
                    $return = 'Error';
                    return $return;
                }
            }
        }
        header('Location: alumno.php');
    }

    else {
        echo 'Ha dao un caske xD';
    }

?>