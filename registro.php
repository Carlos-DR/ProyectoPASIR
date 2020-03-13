<!DOCTYPE html>

<!-- Formulario para registrarte -->
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Registro</title>
    </head>
    <body style="background-color: #2B2B2B; color: white; margin-top: 25px">
    <div class="container">
        <h2>Registrar usuario</h2>
        <form action="registro.php" method="post">
            <table>
                <tr>
                    <td>Nickname</td>
                </tr>
                <tr>
                    <td><input type="text" name="user"></td>
                </tr>
                <tr>
                    <td>Nombre de usuario</td>
                </tr>
                <tr>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                </tr>
                <tr>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td>Correo</td>
                </tr>
                <tr>
                    <td><input type="email" name="mail"></td>
                </tr>
                <tr>
                    <td style="padding-top: 10px"><input type="submit" name="boton" class="btn btn-danger" value="Registrar Usuario"></td>
                </tr>
                <tr>
                    <td style="padding-top: 10px">
                        <a href="index.php">
                            <button type="button" class="btn btn-danger">Volver</button>
                        </a>
                    </td>
                </tr>
            </table>
        </form>
        <?php
        // put your code here
        if ((isset($_POST['boton'])) && (isset($_POST['pass']))) {
            $_SESSION['usuario']=$_POST['user'];
            require_once './connection.php';
            $connect = new connection();
            $sql = "INSERT INTO usuarios (user,name,passwd,mail,admin) VALUES ('".$_POST['user']."','".$_POST['name']."',MD5('".$_POST['pass']."'),'".$_POST['mail']."',false)";
            $connect->execSQL($sql);
            $crearcarpeta = "./imagenes/".$_POST['name']."/"; 
            if (!file_exists($crearcarpeta)) { 
                mkdir($crearcarpeta, 0777, true);
            }
            //header('Location: ./registrado.php');
            session_start();
            $_SESSION['sesion'] = $_POST['user'];
            header('location: index.php');
            echo '<p class="alert alert-success agileits" role="alert">Usuario registrado correctamente<p>';
        }
        ?>
        
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
