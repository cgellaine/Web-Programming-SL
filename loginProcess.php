<?php
    include("config.php");
    session_start();
    if(isset($_POST['login'])){       
        $_SESSION['usernameLogin'] = $_POST['usernameLogin'];    
        $_SESSION['passwordLogin'] = $_POST['passwordLogin'];
        $_SESSION['loginError'] = '';
        $str_query = "select username, password from sl2_registration_data where username ='".$_POST['usernameLogin']."'"; 
        $query = mysqli_query($connection, $str_query);
        $row = mysqli_fetch_array($query);
        
        echo $row['username'];
        echo $row['password'];
        if($row['username']){
            if(($_POST['usernameLogin'] == $row['username']) && ($_POST['passwordLogin'] == $row['password'])){
                $_SESSION['successfullyLogin'] = 'Login Successfully'; 
                $_SESSION['loginedUsername'] = $row['username'];       
                header("Location: home.php?username=".$_SESSION['loginedUsername']);
            } 
            else if(($_POST['usernameLogin'] == $row['username']) && ($_POST['passwordLogin'] != $row['password'])){
                $_SESSION['loginError'] = '<h2 align=center><font color=red>Data Login Tidak Tepat.</h2>';
                header("Location: login.php");
            }
        }else{
            $_SESSION['loginError'] = '<h2 align=center><font color=red>Maaf, Akun Tidak Ditemukan.</h2>';
            header("Location: login.php");
        }
    }
?>