<?php
    session_start();  
    session_destroy();
    unset($_SESSION['loginedUsername']);
    unset($_SESSION['successfullyLogin']);  
    header("Location: login.php");
?>