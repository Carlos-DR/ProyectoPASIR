<?php

class connection {
    //put your code here
    public function execSQL ($sql) {
        $connect = new mysqli('localhost','root','1234','herpic');
        $result = $connect->query($sql);
        return $result;
    }
}
?>