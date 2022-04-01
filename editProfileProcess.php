<?php 
    include("config.php");  
    session_start();  
    if($_POST['submit'] != NULL){ 
        $_SESSION['namaDepanUpdate'] = $_POST['namaDepan']; 
        $_SESSION['tempatLahirUpdate'] = $_POST['tempatLahir']; 
        $_SESSION['wargaNegaraUpdate'] = $_POST['wargaNegara']; 
        $_SESSION['alamatUpdate'] = $_POST['alamat']; 
        $_SESSION['namaTengahUpdate'] = $_POST['namaTengah']; 
        $_SESSION['tanggalLahirUpdate'] = $_POST['tanggalLahir']; 
        $_SESSION['emailUpdate'] = $_POST['email']; 
        $_SESSION['namaBelakangUpdate'] = $_POST['namaBelakang'];
        
        $_SESSION['UpdateError'] = ''; 
        $_SESSION['savingError'] = '';
        
        if((strlen($_POST['kodePos']) != 5) || (is_numeric($_POST['kodePos']) == false)){
            $_SESSION['UpdateError'] .= '"Kode Pos" harus terdiri dari 5 digit.';    
            if(isset($_SESSION['kodePosUpdate'])) unset($_SESSION['kodePosUpdate']);    
        }
        else{
            $_SESSION['kodePosUpdate'] = $_POST['kodePos'];   
        }

        if((strlen($_POST['nik']) != 16) || (is_numeric($_POST['nik']) == false)){
            $_SESSION['UpdateError'] .= '"NIK" harus terdiri dari 16 digit.';      
            if(isset($_SESSION['NIKUpdate'])) unset($_SESSION['NIKUpdate']);      
        }
        else{
            $_SESSION['NIKUpdate'] = $_POST['nik'];     
        }

        if((strlen($_POST['noHP']) > 12) || (strlen($_POST['noHP']) < 10) || (is_numeric($_POST['noHP']) == false)){
            $_SESSION['UpdateError'] .= '"No HP" harus terdiri dari 10-12 digit.';     
            if(isset($_SESSION['noHPUpdate'])) unset($_SESSION['noHPUpdate']);    
        }
        else{
            $_SESSION['noHPUpdate'] = $_POST['noHP']; 
        }

        if(strlen($_SESSION['UpdateError']) == 0){            
            if (file_exists($_FILES['updateFotoProfil']['tmp_name'])){
                $_SESSION['namaFileFoto'] = $_FILES['updateFotoProfil']['name'];
                $tmp_name = $_FILES['updateFotoProfil']['tmp_name'];
                $_SESSION['folderUpload'] = "fotoProfil/";
                $_SESSION['terupload'] = move_uploaded_file($tmp_name, $_SESSION['folderUpload'].$_SESSION['namaFileFoto']);
                $str_query = 
                "   
                    update sl2_registration_data set
                        nama_depan = '".$_SESSION['namaDepanUpdate']."',
                        nama_tengah = '".$_SESSION['namaTengahUpdate']."',
                        nama_belakang = '".$_SESSION['namaBelakangUpdate']."',
                        tempat_lahir = '".$_SESSION['tempatLahirUpdate']."',
                        tanggal_lahir = '".$_SESSION['tanggalLahirUpdate']."',
                        nik = '".$_SESSION['NIKUpdate']."',
                        warga_negara = '".$_SESSION['wargaNegaraUpdate']."',
                        email = '".$_SESSION['emailUpdate']."',
                        no_hp = '".$_SESSION['noHPUpdate']."',
                        alamat = '".$_SESSION['alamatUpdate']."',
                        kode_pos = '".$_SESSION['kodePosUpdate'] ."',
                        nama_foto_profil = '".$_SESSION['namaFileFoto'] ."'
                        where username = '".$_SESSION['loginedUsername']."'
                ";
            }
            else{
                $str_query = 
                "   
                    update sl2_registration_data set
                        nama_depan = '".$_SESSION['namaDepanUpdate']."',
                        nama_tengah = '".$_SESSION['namaTengahUpdate']."',
                        nama_belakang = '".$_SESSION['namaBelakangUpdate']."',
                        tempat_lahir = '".$_SESSION['tempatLahirUpdate']."',
                        tanggal_lahir = '".$_SESSION['tanggalLahirUpdate']."',
                        nik = '".$_SESSION['NIKUpdate']."',
                        warga_negara = '".$_SESSION['wargaNegaraUpdate']."',
                        email = '".$_SESSION['emailUpdate']."',
                        no_hp = '".$_SESSION['noHPUpdate']."',
                        alamat = '".$_SESSION['alamatUpdate']."',
                        kode_pos = '".$_SESSION['kodePosUpdate'] ."'
                        where username = '".$_SESSION['loginedUsername']."'
                ";
            }
            $query = mysqli_query($connection, $str_query);
            if($query){
                unset($_SESSION['namaDepanUpdate']);
                unset($_SESSION['namaTengahUpdate']);
                unset($_SESSION['namaBelakangUpdate']);
                unset($_SESSION['tempatLahirUpdate']);
                unset($_SESSION['tanggalLahirUpdate']);
                unset($_SESSION['NIKUpdate']);
                unset($_SESSION['wargaNegaraUpdate']);
                unset($_SESSION['emailUpdate']);
                unset($_SESSION['noHPUpdate']);
                unset($_SESSION['alamatUpdate']);
                unset($_SESSION['kodePosUpdate']);
                if(isset($updateFoto)) unset($_SESSION['namaFileFoto']);
                header("Location: profile.php");
            } else{
                $_SESSION['UpdateError'] = "Update gagal: ".mysqli_error($connection); 
                header("Location: editProfile.php");
            }
        }
        else{
            header("Location: editProfile.php");
        }
    } 
?>
