<?php

//Manejo de sesiones
class UserSession{

    //identificar el valor de la sesión
    public function __construct(){
        session_start();
    }

    //Ayuda a poner una valor a la sesión actual
    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    //
    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    //Función para cerrar la sesión
    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>