<?php
    session_start();
    if(isset($_POST['login'])){       
        $_SESSION['usernameLogin'] = $_POST['usernameLogin'];    
        $_SESSION['passwordLogin'] = $_POST['passwordLogin'];
        if(isset($_SESSION) && isset($_SESSION['successfullyRegister'])){
            if(($_POST['usernameLogin'] == $_SESSION['usernameRegister']) && ($_POST['passwordLogin'] == $_SESSION['passwordRegister'])){
                $_SESSION['loginError'] = '';
                $_SESSION['successfullyLogin'] = 'Login Successfully';
                header("Location: home.php");
            } 
            else if(($_POST['usernameLogin'] == $_SESSION['usernameRegister']) && ($_POST['passwordLogin'] != $_SESSION['passwordRegister']) || ($_POST['usernameLogin'] != $_SESSION['usernameRegister']) && ($_POST['passwordLogin'] == $_SESSION['passwordRegister'])){
                $_SESSION['loginError'] = '<h2 align=center><font color=red>Username atau Password Anda Salah.</h2>';
                header("Location: login.php");
            }
            else if(($_POST['usernameLogin'] != $_SESSION['usernameRegister']) && ($_POST['passwordLogin'] != $_SESSION['passwordRegister'])){
                $_SESSION['loginError'] = '<h2 align=center><font color=red>Maaf, Akun Tidak Ditemukan.</h2>';
                header("Location: login.php");
            }
        }
        else{
            $_SESSION['loginError'] = '<h2 align=center><font color=red>Maaf, Akun Tidak Ditemukan.</h2>';
            header("Location: login.php");
        }
    }
?>