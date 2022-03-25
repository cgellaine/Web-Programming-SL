<?php
    session_start();     
    if(isset($_POST['register'])){
        $_SESSION['namaDepanRegister'] = $_POST['namaDepan']; 
        $_SESSION['tempatLahirRegister'] = $_POST['tempatLahir']; 
        $_SESSION['wargaNegaraRegister'] = $_POST['wargaNegara']; 
        $_SESSION['alamatRegister'] = $_POST['alamat']; 
        $_SESSION['usernameRegister'] = $_POST['username']; 
        $_SESSION['namaTengahRegister'] = $_POST['namaTengah']; 
        $_SESSION['tanggalLahirRegister'] = $_POST['tanggalLahir']; 
        $_SESSION['emailRegister'] = $_POST['email']; 
        $_SESSION['namaBelakangRegister'] = $_POST['namaBelakang'];
        
        $_SESSION['registerError'] = ''; 

        if((strlen($_POST['kodePos']) != 5) || (is_numeric($_POST['kodePos']) == false)){
            $_SESSION['registerError'] .= '<p align=center><font color=red>"Kode Pos" harus terdiri dari 5 digit.</p>';        
        }
        else{
            $_SESSION['kodePosRegister'] = $_POST['kodePos'];   
        }

        if((strlen($_POST['NIK']) != 16) || (is_numeric($_POST['NIK']) == false)){
            $_SESSION['registerError'] .= '<p align=center><font color=red>"NIK" harus terdiri dari 16 digit.</p>';        
        }
        else{
            $_SESSION['NIKRegister'] = $_POST['NIK'];     
        }

        if((strlen($_POST['noHP']) > 12) || (strlen($_POST['noHP']) < 10) || (is_numeric($_POST['noHP']) == false)){
            $_SESSION['registerError'] .= '<p align=center><font color=red>"No HP" harus terdiri dari 10-12 digit.</p>';
        }
        else{
            $_SESSION['noHPRegister'] = $_POST['noHP']; 
        }

        if($_POST['password1'] != $_POST['password2']){
            $_SESSION['registerError'] .= '<p align=center><font color=red>"Password 1" dan "Password 2" harus sama.</p>';
        }
        else{
            $_SESSION['passwordRegister'] = $_POST['password1'];
        }
        
        if(strlen($_SESSION['registerError']) == 0){
            $_SESSION['namaFileFoto'] = $_FILES['fotoProfil']['name'];
            $tmp_name = $_FILES['fotoProfil']['tmp_name'];
            $_SESSION['folderUpload'] = "fotoProfil/";
            $_SESSION['terupload'] = move_uploaded_file($tmp_name, $_SESSION['folderUpload'].$_SESSION['namaFileFoto']);
            $_SESSION['successfullyRegister'] = 'Register Successfully';
            header("Location: welcome.php");
        }
        else{
            header("Location: register.php");
        }
    } 
?>