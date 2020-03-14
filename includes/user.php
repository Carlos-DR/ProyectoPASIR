<?php
include 'db.php';

class User extends DB{
    private $nombre;
    private $usuario;

    //función para comprobar que el usuario existe
    public function userExists($user, $pass){

        //Pasamos la contraseña a md5 para comparalo con la contraseña encriptada que está en la base de datos
        $md5pass = md5($pass);

        //Validamos los datos
        $query = $this->connect()->prepare('SELECT * FROM alumnos WHERE usuario = :user AND contrasenia = :pass');

        //asignamos los datos a las variables
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        //Si hay filas devuelve true
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //Asigansmos las variables del usuario
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM alumnos WHERE usuario = :user');
        $query->execute(['user' => $user]);
        
        //Con un barrido asignamos las variables
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->usuario = $currentUser['usuario'];
        }
    }

    //Con esta función nos devuelve el nombre
    public function getNombre(){
        return $this->usuario;
    }
}

?>