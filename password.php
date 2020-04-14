<?php
    $usu = $_POST["usuario"];
    $email = $_POST["email"];

    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";
    
    echo $usu . "<br>";
    echo $email . "<br>";

    //Creamos generamos una contraseña aleatoria (la que le enviaremos al usuario)
    $logitud = 8;
    $psswd = substr( md5(microtime()), 1, $logitud);
    echo $psswd . "<br>";

    //Encriptamos la contraseña (para almacenarla en la base de datos)
    $passwd = md5($psswd);
    echo $passwd . "<br>";

    //Creamos variable edit para modificar la contraseña
    $edit = "UPDATE alumnos SET contrasenia='$passwd', temp=1, psswd='$psswd' WHERE usuario='$usu' AND email='$email'";

    //Creamos variable return para conectarnos a la base de datos e insertar los datos de la variable insert 
    $return = mysqli_query($conn, $edit);
    echo "Se ha generado una contraseña satisfactoriamente" . "<br>";

    //Variables para enviar el correo
    $email_subject = "Contacto desde Herpic";

        //Mensaje que recibirá el usuario
    $email_message = "Su contraseña temporal es:\n\n";
    $email_message .= "Contraseña: " . $psswd . "\n";

    //echo $email_message;

    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    echo "¡El formulario se ha enviado con éxito!";

    header('Location: login.php');
    mysqli_close($conn);
?>