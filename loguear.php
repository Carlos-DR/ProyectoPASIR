<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loguear
 *
 * @author usuario
 */
class loguear {
    public function log ($user,$passwd) {
        require_once './connection.php';
        $connect = new connection();
        $sql = "SELECT * FROM usuarios WHERE user like '".$user."' AND passwd = MD5('".$passwd."')";
        $result = $connect->execSQL($sql);
        if ($result) {
            $record = $result->fetch_assoc();
            $return = $record['user'];
            return $return;
        } else {
            $return = 'Error';
            return $return;
        }
    }
}
