<?php

$who = $_POST['tipo'];
$usu = $_POST['usuario'];
$contra = $_POST['contrasenia'];

$admin = strtoupper($usu);

    //Identificador del profesor
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
        session_unset();
        session_destroy();
        $usu = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
        $contrasenia_req = trim(htmlspecialchars($_REQUEST["contrasenia"], ENT_QUOTES, "UTF-8"));
        $contrasenia_md5= md5($contrasenia_req);

        $conn = mysqli_connect("localhost", "root", "1234", "herpic") 
        or die("Problemas en la conexion");

        $consulta = "SELECT usuario, contrasenia FROM profesores WHERE usuario='$usu' AND contrasenia='$contrasenia_md5'";
        $registros = mysqli_query($conn, $consulta) or die(mysqli_error($conn));
        $contador = mysqli_num_rows($registros);
        if ($contador != 1) {
            header('location: login.php?error=Usuario o contraseña incorrectos');
        }
        //Identificador del admin
        elseif ($admin == 'HERPIC') {
            session_start();
            $_SESSION['usuario'] = $usu; 
            $_SESSION['estado'] = 'autenticado';
            header('location: admin/admin.php');
        }    
        else {
            session_start();
            $_SESSION['usuario'] = $usu;
            $_SESSION['estado'] = 'autenticado';
            header('location: profesores/profesor.php');
        }
            
        mysqli_close($conn);
    }
    
    //Identificador del alumno
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
        session_unset();
        session_destroy();
        $usu = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
        $contrasenia_req = trim(htmlspecialchars($_REQUEST["contrasenia"], ENT_QUOTES, "UTF-8"));
        $contrasenia_md5= md5($contrasenia_req);

        $conn = mysqli_connect("localhost", "root", "1234", "herpic") 
        or die("Problemas en la conexion");

        $consulta = "SELECT usuario, contrasenia FROM alumnos WHERE usuario='$usu' AND contrasenia='$contrasenia_md5'";
        $registros = mysqli_query($conn, $consulta) or die(mysqli_error($conn));
        $contador = mysqli_num_rows($registros);
        if ($contador != 1) {
            header('location: login.php?error=Usuario o contraseña incorrectos');
        } 
        else {
            session_start();
            $_SESSION['usuario'] = $usu;
            $_SESSION['estado'] = 'autenticado';
            header('location: alumnos/alumno.php');
        }
            
        mysqli_close($conn);
    }

    else {
        echo 'Ha dao un caske xD';
    }

?>

<!-- Si hay problemas con la conexión, consulatar esta página:
https://stackoverflow.com/questions/41645309/mysql-error-access-denied-for-user-rootlocalhost

Básicamente es añadir en el fichero my.ini (my.conf en linux) la línea "skip-grant-tables" justo después de [mysqld]
 -->