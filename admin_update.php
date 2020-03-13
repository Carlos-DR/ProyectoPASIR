<?php session_start();
if (isset($_POST['edit_usu'])) {
    require_once './connection.php';
    $connect = new connection();
    $sql = "SELECT id,user,name,passwd,mail FROM usuarios WHERE id = ".$_POST['edit_usu'];
    $result = $connect->execSQL($sql);
    $lane = $result->fetch_assoc();
}

if (isset($_POST['boton'])) {
    require_once './connection.php';
    $connect = new connection();
    
    $sql = "UPDATE usuarios SET user = '".$_POST['usuario']."' WHERE id = ".$_POST['id'];
    $sql2 = "UPDATE usuarios SET name = '".$_POST['nombre']."' WHERE id = ".$_POST['id'];
    $sql3 = "UPDATE usuarios SET passwd = '".$_POST['passwd']."' WHERE id = ".$_POST['id'];
    $sql4 = "UPDATE usuarios SET mail = '".$_POST['mail']."' WHERE id = ".$_POST['id'];
            
    $connect->execSQL($sql);     
    $connect->execSQL($sql2);     
    $connect->execSQL($sql3);
    $connect->execSQL($sql4);
    header('location: show_users.php');     
}

?>
<!-- Formulario para registrarte -->
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Actualizar datos</title>
    </head>
    <body style="background-color: #2B2B2B; color: white; margin-top: 25px">
    <div class="container">
        <h2>Actualizar datos</h2>
        <form action="admin_update.php" method="post">
            <table>
                <tr>
                    <td>Id:</td>
                </tr>
                <tr> 
                    <td><input type="text" name="id" value="<?php echo $lane['id'] ?>" readonly="readonly"></td>
                </tr>
                <tr>
                    <td>Usuario:</td>
                </tr>
                <tr>
                    <td><input type="text" name="usuario" value="<?php echo $lane['user'] ?>"></td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                </tr>
                <tr>
                    <td><input type="text" name="nombre" value="<?php echo $lane['name'] ?>"></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                </tr>
                <tr>
                    <td><input type="password" name="passwd" value="<?php echo $lane['passwd'] ?>"></td>
                </tr>
                <tr>
                    <td>Correo:</td>
                </tr>
                <tr>
                    <td><input type="text" name="mail" value="<?php echo $lane['mail'] ?>"></td>
                </tr>
                <tr>
                    <td style="padding-top: 10px; padding-bottom: 10px"><input type="submit" name="boton" class="btn btn-danger" value="Actualizar datos"></td>
                </tr>
            </table>
        </form>
        <a href="show_users.php"><button type="button" class="btn btn-danger">Volver</button></a>
    </div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>
