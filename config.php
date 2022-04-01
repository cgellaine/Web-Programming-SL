<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "sl_web_prog";

    $connection = mysqli_connect($server, $username, $password, $database);

    if($connection){
        // echo "successfuly connected";    
    } else{
        throw new Exception("Mysql Connection Error: ".mysqli_connect_error());
    }
?>