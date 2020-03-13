<!-- Con esto cerramos sesión y redirige al index -->
<?php
    session_start();
    unset($_SESSION["user"]); 
    session_destroy();
    header("Location: index.php");
    exit;
?>