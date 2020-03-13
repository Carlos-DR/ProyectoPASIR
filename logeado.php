<!-- Loega al usuario y redirige al index -->
<?php
    session_start();

    $usuario = $_POST['user'];
    $contrasena = $_POST['pass'];

    require_once 'connection.php';

    $consulta = mysqli_query ($conn, "SELECT * FROM usuarios WHERE user = '$usuario' AND pass = '$contrasena'");

    if(!$consulta){ 
        echo mysqli_error($mysqli);
        exit;
    }

    if($user = mysqli_fetch_assoc($consulta)) {
        echo "el usuario y la pwd son correctas";
    } 
    else {
        echo "Usuario incorrecto o no existe";
    } 
?>