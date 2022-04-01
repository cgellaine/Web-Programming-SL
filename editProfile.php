<?php
    session_start();
    if(!isset($_SESSION['loginedUsername'])) header("Location: login.php");
    include("config.php");
    $str_query = "select * from sl2_registration_data where username ='".$_SESSION['loginedUsername']."'"; 
    $query = mysqli_query($connection, $str_query);
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengelolaan Keuangan</title>
</head>
<style>
    body{
        margin: 0px;
        font-family: Arial;
        background-color: #DDDDFF;
    }
    .navbar{
        background-color: #FBFDEA;
        display: flex;
        align-items: center;
        margin-bottom: 36.5px;
    }
    h2{
        margin: 0px;
        margin-left: 48px;
        color: #51ACC5;
        letter-spacing: 1.5px;
        font-family: Cursive;
        font-size: 23px;
        padding-top: 20px;
        margin-right: 250px;
    }
    .menus{
        display: flex;
    }
    a{
        text-decoration: none;
        color: #0D1769;
        font-size: 16px;
    }
    #menu{
        margin-left: 30px;
        margin-right: 45px;
        text-decoration: none;
        color: black;
        font-size: 20px;
    }
    #logout{
        margin-left: 170px;
        text-decoration: none;
        color: black;
        font-size: 20px;
    }
    .columns{
        margin-top: 5px;
        display: flex;
        margin-left: 50px;
        margin-right: 50px;
        margin-bottom: 0px;
    }
    .column{
        flex: 1;      
        border: 1px solid #C0C0DE;  
        padding-left: 5px;
    }
    .column div{
        display: flex;
        align-items: center;
    }
    .column div:nth-child(1),.column div:nth-child(2),
    .column:nth-child(1) div:nth-child(3), .column:nth-child(1) div:nth-child(4),
    .column:nth-child(2) div:nth-child(3), .column:nth-child(2) div:nth-child(4),
    .column:nth-child(3) div:nth-child(3){
        margin-bottom: 10px;
    }    
    .column p{
        width: 150px;
    }
    #shortInput, #password1, #password2{
        height: 18px;
        width: 215px;
        background-color:#EFEEFF;
        border: 1px solid black;
        padding-left: 5px;
    }
    #longInput{
        height: 58px;
        width: 215px;
        background-color:#EFEEFF;
        border: 1px solid black;
        padding-left: 5px;
    }
    #shortInputFoto{
        height: 18px;
        width: 215px;
    }
    label {
        height: 63px;
        width: 238px;
        padding-top: 1.5px;
    }
    h3{
        font-size: 24px;
        margin: 0px;
    }
    .photo{
        display: flex;
        flex: column;
    }
    #fotoProfil{
        margin-left: 150px;
        height: 100px;
        margin-bottom: 10px;
    }
    .title{
        display: flex;
        margin: 0px 50px;
        margin-top: -10px;
        padding: 8.6px 0px;
    }
    #inputFile{
        margin-left: 33.4px;
        width: 226px;
    }
    .buttons{
        display: flex;
        justify-content: space-between;
        margin: 0px 50px;
        align-items: center;
    }
    .buttons a{
        font-size: 30px;
        cursor: pointer;
    }
    #submitBtn{
        border: none;
        background-color: #DDDDFF;
        cursor: pointer;
        font-size: 30px;
    }
    #registForm{
        margin-top: -17px;
    }
    .gantiFoto{
        margin: 0px;
        margin-bottom: 10px;
    }
    .errorMsg{
        margin: 0px;
        text-align: center;
        color: red;
    }
    .alamat{
        margin-top: 24.5px;
    }
    .alamat p{
        margin-top: -27px;
    }
    #delete{
        padding-top: 12px;
        font-size: 12px;
        color: #E61A65;
    }
</style>
<body>
    <div class="navbar">
        <div class="logo">
            <?php
                echo "<h2> &#10019 Aplikasi Pengelolaan Keuangan &#10019 </h2>";
                echo "<br>";
            ?>
        </div>
        <div class="menus">
            <div class="home">
                <a href="
                    <?php
                        echo "home.php?username=".$_SESSION['loginedUsername']."";
                    ?>
                " id="menu">Home</a>
            </div>
            <div class="profile">
                <a href="
                    <?php
                        echo "profile.php?username=".$_SESSION['loginedUsername']."";
                    ?>
                " id="menu"><u>Profile</u></a>
            </div>
        </div>
        <div class="logout">
            <a href="logout.php" id="logout">Logout</a>
        </div>
    </div>
    <div class="title">
        <?php
            echo "<h3 align=center>Edit Profile</h3>";
        ?>
    </div>
    <form action = "editProfileProcess.php" method="post" id="registForm" enctype = "multipart/form-data">
        <div class="buttons">
            <a href="delete.php" id="delete" onclick = "return confirm('Yakin Ingin Menghapus Akun dengan Username = <?php echo $_SESSION['loginedUsername']?>?')">Hapus Akun</a>
            <div>
                <a href="
                    <?php
                        echo "profile.php?username=".$_SESSION['loginedUsername']."";
                    ?>
                ">&#x1f519</a>
                <input type="submit" name="submit" id="submitBtn" value="<?php echo "&#128190";?>">
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div>
                    <p>Nama Depan</p>
                    <input type="text" name="namaDepan" id="shortInput" value="<?= isset($_SESSION['namaDepanUpdate']) ? $_SESSION['namaDepanUpdate'] : $row['nama_depan']; ?>" required>
                </div>
                <div>
                    <p>Tempat Lahir</p>
                    <input type="text" name="tempatLahir" id="shortInput" value="<?= isset($_SESSION['tempatLahirUpdate']) ? $_SESSION['tempatLahirUpdate'] : $row['tempat_lahir'];?>" required>
                </div>
                <div>
                    <p>Warga Negara</p>
                    <input type="text" name="wargaNegara" id="shortInput" value="<?= isset($_SESSION['wargaNegaraUpdate']) ? $_SESSION['wargaNegaraUpdate'] : $row['warga_negara'];?>" required>
                </div>
                <div class="alamat">
                    <p>Alamat</p>        
                    <textarea name="alamat" id="longInput" required><?= isset($_SESSION['alamatUpdate']) ? $_SESSION['alamatUpdate'] : $row['alamat'];?></textarea>  
                </div>
            </div>
            <div class="column">
                <div>
                    <p>Nama Tengah</p>       
                    <input type="text" name="namaTengah" id="shortInput" value="<?= isset($_SESSION['namaTengahUpdate']) ? $_SESSION['namaTengahUpdate'] : $row['nama_tengah'];?>" required>
                </div>
                <div>
                    <p>Tanggal Lahir</p>   
                    <input type="date" name="tanggalLahir" id="shortInput" value="<?= isset($_SESSION['tanggalLahirUpdate']) ? $_SESSION['tanggalLahirUpdate'] : $row['tanggal_lahir'];?>" required>
                </div>
                <div>
                    <p>Email</p>
                    <input type="email" name="email" id="shortInput" value="<?= isset($_SESSION['emailUpdate']) ? $_SESSION['emailUpdate'] : $row['email'];?>" required>
                </div>
                <div>
                    <p>Kode Pos</p>     
                    <input type="text" name="kodePos" id="shortInput" value="<?= isset($_SESSION['kodePosUpdate']) ? $_SESSION['kodePosUpdate'] : $row['kode_pos'];?>" required>    
                </div>
            </div>
            <div class="column">
                <div>
                    <p>Nama Belakang</p>     
                    <input type="text" name="namaBelakang" id="shortInput" value="<?= isset($_SESSION['namaBelakangUpdate']) ? $_SESSION['namaBelakangUpdate'] : $row['nama_belakang'];?>" required>
                </div>
                <div>
                    <p>NIK</p>    
                    <input type="text" name="nik" id="shortInput" value="<?= isset($_SESSION['nikUpdate']) ? $_SESSION['nikUpdate'] : $row['nik'];?>" required>
                </div>
                <div>
                    <p>No HP</p>
                    <input type="text" name="noHP" id="shortInput" value="<?= isset($_SESSION['noHPUpdate']) ? $_SESSION['noHPUpdate'] : $row['no_hp'];?>" required>
                </div>
                <div>
                    <p>Foto Profil</p>  
                    <p id="shortInputFoto"><?php echo "<a href='fotoProfil/".$row['nama_foto_profil']."' target='blank'>".$row['nama_foto_profil']."</a>";?></p>
                 </div>
                <img src="fotoProfil/<?php echo $row['nama_foto_profil']; ?>" id="fotoProfil">
                <div class="gantiFoto">
                    Ganti Foto Profil 
                    <input type="file" id="inputFile" name="updateFotoProfil" accept="image/*"> 
                </div>     
            </div>
        </div> 
    </form>
    <div class="errorMsg">
        <?= isset($_SESSION['UpdateError']) ? $_SESSION['UpdateError'] : '';?>
        <?= isset($_SESSION['savingError']) ? $_SESSION['savingError'] : '';?>
    </div>
</body>
</html>