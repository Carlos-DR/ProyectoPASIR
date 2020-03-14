<?php

class conexion {
    //put your code here
    public function execSQL ($sql) {
        $connect = new mysqli('localhost','root','1234','dominguez');
        if($connect -> connect_error){
            die("Conexión Fallida: " . $connect-> connect_error)
        }
        $result = $connect->query($sql);
        return $result;
    }
}
?>