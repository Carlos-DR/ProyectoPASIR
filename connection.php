<?php

class connection {
    //put your code here
    public function execSQL ($sql) {
        $connect = new mysqli('localhost','root','','dominguez');
        $result = $connect->query($sql);
        return $result;
    }
}
