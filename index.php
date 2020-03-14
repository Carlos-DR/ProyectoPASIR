<?php
//incluimos nuestras librerias de funciones
include_once 'includes/user.php';
include_once 'includes/user_session.php';

//Creamos un objeto de sesión para saber el valor de la sesión
$userSession = new UserSession();
//usuario actual
$user = new User();

//Si exite "user"
if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once 'vistas/home.php';

}
else if(isset($_POST['ususario']) && isset($_POST['contrasenia'])){
    
    $userForm = $_POST['usuario'];
    $passForm = $_POST['contrasenia'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once 'vistas/home.php';
    }
    else{
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'vistas/login.php';
    }
}
else{
    //echo "login";
    include_once 'vistas/login.php';
}

?>