<?php

    function Connect($config = array())
    {
        $conn = mysql_connect($coinfig['host'], $config['username'], $config['password'], $config['database']);
        mysqli_set_charset($conn, $config['encoding']);

        return($conn);
    }

?>