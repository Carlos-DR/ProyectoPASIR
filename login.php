<?php
    session_start();
    if (isset($_POST['boton'])) {
        $user = $_POST['name'];
        $passwd = $_POST['pass'];
        if ((empty($user)) || (empty($passwd))) {
            $error = 'Introduce usuario y contraseña!';
        } else {
            require_once './loguear.php';
            $log = new loguear();
            $login = $log->log($user, $passwd);
            $_SESSION['sesion'] = $login;
            header('Location: ./index.php');
        }
    }
?>
<html lang="es">
    <head>
       <!-- Required meta tags -->
       <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Inicio de sesión</title>
    </head>
    <body style="background-color: #2B2B2B; color: white; margin-top: 25px">
    <div class="container">
    <h2>Iniciar sesión</h2>
        <form action="login.php" method="post">
            <table>
                <tr>
                    <td>Nombre de usuario</td>
                </tr>
                <tr>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                </tr>
                <?php if (!empty($error)) {
                echo "<span>".$error."</span>";
                }
                ?>
                <tr>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td style="padding-top: 10px"><input type="submit" name="boton" class="btn btn-danger" value="Iniciar sesión"></td>
                </tr>
            </table>
        </form>
        <a href="index.php"><button type="button" class="btn btn-danger">Volver</button></a>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>