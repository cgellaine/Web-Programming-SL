<?php
    include("config.php");  
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
        $_SESSION['savingError'] = '';
        
        if((strlen($_POST['kodePos']) != 5) || (is_numeric($_POST['kodePos']) == false)){
            $_SESSION['registerError'] .= '"Kode Pos" harus terdiri dari 5 digit.<br>';    
            if(isset($_SESSION['kodePosRegister'])) unset($_SESSION['kodePosRegister']);    
        }
        else{
            $_SESSION['kodePosRegister'] = $_POST['kodePos'];   
        }

        if((strlen($_POST['NIK']) != 16) || (is_numeric($_POST['NIK']) == false)){
            $_SESSION['registerError'] .= '"NIK" harus terdiri dari 16 digit.<br>';      
            if(isset($_SESSION['NIKRegister'])) unset($_SESSION['NIKRegister']);      
        }
        else{
            $_SESSION['NIKRegister'] = $_POST['NIK'];     
        }

        if((strlen($_POST['noHP']) > 12) || (strlen($_POST['noHP']) < 10) || (is_numeric($_POST['noHP']) == false)){
            $_SESSION['registerError'] .= '"No HP" harus terdiri dari 10-12 digit.<br>';     
            if(isset($_SESSION['passwordRegister'])) unset($_SESSION['noHPRegister']);    
        }
        else{
            $_SESSION['noHPRegister'] = $_POST['noHP']; 
        }

        if($_POST['password1'] != $_POST['password2']){
            $_SESSION['registerError'] .= '"Password 1" dan "Password 2" harus sama.<br>';     
            if(isset($_SESSION['passwordRegister'])) unset($_SESSION['passwordRegister']);    
        }
        else{
            $_SESSION['passwordRegister'] = $_POST['password1'];
        }
        
        if(strlen($_SESSION['registerError']) == 0){
            $_SESSION['namaFileFoto'] = $_FILES['fotoProfil']['name'];
            $tmp_name = $_FILES['fotoProfil']['tmp_name'];
            $_SESSION['folderUpload'] = "fotoProfil/";
            $_SESSION['terupload'] = move_uploaded_file($tmp_name, $_SESSION['folderUpload'].$_SESSION['namaFileFoto']);
            $str_query = 
            "
                insert into sl2_registration_data values(
                    '".$_SESSION['namaDepanRegister']."',
                    '".$_SESSION['namaTengahRegister']."',
                    '".$_SESSION['namaBelakangRegister']."',
                    '".$_SESSION['tempatLahirRegister']."',
                    '".$_SESSION['tanggalLahirRegister']."',
                    '".$_SESSION['NIKRegister']."',
                    '".$_SESSION['wargaNegaraRegister']."',
                    '".$_SESSION['emailRegister']."',
                    '".$_SESSION['noHPRegister']."',
                    '".$_SESSION['alamatRegister']."',
                    '".$_SESSION['kodePosRegister'] ."',
                    '".$_SESSION['namaFileFoto'] ."',
                    '".$_SESSION['usernameRegister']."',
                    '".$_SESSION['passwordRegister']."'
                )
            ";
            
            $query = mysqli_query($connection, $str_query);
            if($query){
                unset($_SESSION['namaDepanRegister']);
                unset($_SESSION['namaTengahRegister']);
                unset($_SESSION['namaBelakangRegister']);
                unset($_SESSION['tempatLahirRegister']);
                unset($_SESSION['tanggalLahirRegister']);
                unset($_SESSION['NIKRegister']);
                unset($_SESSION['wargaNegaraRegister']);
                unset($_SESSION['emailRegister']);
                unset($_SESSION['noHPRegister']);
                unset($_SESSION['alamatRegister']);
                unset($_SESSION['kodePosRegister']);
                unset($_SESSION['namaFileFoto']);
                unset($_SESSION['usernameRegister']);
                unset($_SESSION['passwordRegister']);
                header("Location: welcome.php");
            }else{
                $_SESSION['savingError'] = "Proses gagal: ".mysqli_error($connection); 
                header("Location: register.php");
            }
        }
        else{
            header("Location: register.php");
        }
    } 
?>