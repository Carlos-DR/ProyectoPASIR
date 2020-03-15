<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>

    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form action="who.php" method="POST">
                <h2>Iniciar sesión</h2>
        <div>
            <div>
                <p>Nombre de usuario: <br>
                <input type="text" name="usuario"></p>
            </div>
            <div>
                <p>Contraseña: <br>
                <input type="password" name="contrasenia"></p>
            </div>
            <div>
                <p>¿Quién eres?
                <input type="radio" id="profesor" name="tipo" value="profesor">
                <label for="profesor">Profesor</label>
                <input type="radio" id="alumno" name="tipo" value="alumno">
                <label for="alumno">Alumno</label></p>
            </div>
            <p class="center"><input type="submit" value="Iniciar Sesión"></p>
        </div>
    </form>
</body>
</html>