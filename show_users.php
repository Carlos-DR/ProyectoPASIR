<?php session_start();
              
        if (isset($_POST['delete_usu'])) {
            require_once './connection.php';
            $delete = new connection();
            $del = "DELETE FROM usuarios WHERE id = ".$_POST['delete_usu'];
            $delete->execSQL($del);
            header('Refresh: 0');
        }

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Mostrar Usuarios</title>
    </head>
    <body style="background-color: #2B2B2B; color: white; margin-top: 25px">
    <div class="container">

        <?php
        // put your code here
        require_once './connection.php';
        $connect = new connection();
        $sql = "SELECT * FROM usuarios";
        $result = $connect->execSQL($sql);
    
    echo"<div div style='clear: both; padding-top: 20px'>
        <table class='table' style='color: white'>
            <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Mail</th>
                    <th>Editar</th>
                    <th>Borrar</th>
            </tr>";

        while ($lane = $result->fetch_assoc()) {
            if ($lane['user'] != 'admin') {
                    echo"<tr>
                        <td>".$lane['id']."</td>
                        <td>".$lane['user']."</td>
                        <td>".$lane['name']."</td>
                        <td>".$lane['mail']."</td>
                        <td>
                            <form method='post' action='admin_update.php'>
                                <button type='submit' class='btn btn-light' name='edit_usu' value='".$lane['id']."'>
                                    <img src='imagenes/lapiz.png' style='width: 23px; height: 24px'>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form method='post' action='show_users.php'>
                                <button type='submit' class='btn btn-light' name='delete_usu' value='".$lane['id']."'>
                                    <img src='imagenes/goma.png' style='width: 23px; height: 24px'>
                                </button>
                            </form>
                        </td>
                    </tr>";
           }
        }
        echo"</table>
        </div>";
        ?>
        
        <div style="position: relative; float: right; padding-left: 10px"><a href="index.php"><button type="button" class="btn btn-danger">Volver</button></a></div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            </div>
        </body>
</html>
