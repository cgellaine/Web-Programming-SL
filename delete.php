<?php
    session_start();
    if(!isset($_SESSION['loginedUsername'])) header("Location: login.php");
    include("config.php");
    $str_query = "delete from sl2_registration_data where username ='".$_SESSION['loginedUsername']."'"; 
    $query = mysqli_query($connection, $str_query);
    if($query){
        session_start();  
        session_destroy();
        unset($_SESSION['loginedUsername']);
        unset($_SESSION['successfullyLogin']);  
        header("Location: login.php");
        header("Location: welcome.php");
    }else{
        echo "Penghapusan Akun Gagal: ".mysqli_error($connection);
    }
?>