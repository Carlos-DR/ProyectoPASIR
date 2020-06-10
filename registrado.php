<?php 
    session_start();
    $resgis = $_SESSION['registro'];
    session_destroy(); 

    if ($resgis == 0) {
        echo "Se ha registrado satisfactoriamente";
        header('Location: login.php');
    }
    elseif ($resgis == 1) {
        echo "El usuario ya existe, por favor intentelo de nuevo con otro nombre de usuario";
        header('Location: userfail.php');
    }
    elseif ($resgis == 2) {
        echo "El email ya está registrado, por favor intentelo de nuevo con otro email o recupera la contraseña";
        header('Location: emailfail.php');
    }
    else {
        echo "Ha dao un caske xD";
    }
?>