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
        margin-top: 30px;
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
    .column div:nth-child(1),.column div:nth-child(2){
        margin-bottom: 10px;
    }
    .column div:nth-child(3), .column div:nth-child(4){
        margin-bottom: 25px;
    }
    .column p{
        width: 150px;
    }
    #shortInput, #password1, #password2{
        height: 18px;
        width: 235px;
    }
    label {
        height: 63px;
        width: 238px;
        padding-top: 1.5px;
    }
    h3{
        font-size: 24px;
    }
    .photo{
        display: flex;
        flex: column;
    }
    #fotoProfil{
        margin-top: -33px;
        margin-left: 150px;
        height: 130px;
        margin-bottom: 16px;
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
                <a href="home.php" id="menu">Home</a>
            </div>
            <div class="profile">
                <a href="profile.php" id="menu"><u>Profile</u></a>
            </div>
        </div>
        <div class="logout">
            <a href="logout.php" id="logout">Logout</a>
        </div>
    </div>
    <?php
        echo "<h3 align=center>Profil Pribadi</h3>";
        session_start();
    ?>
    <div class="profile">
        <div class="columns">
            <div class="column">
                <div>
                    <p>Nama Depan</p>
                    <p id="shortInput"><?php echo "<b>".$_SESSION['namaDepanRegister']."</b>";?></p>
                </div>
                <div>
                    <p>Tempat Lahir</p>
                    <p id="shortInput"><?php echo "<b>".$_SESSION['tempatLahirRegister']."</b>";?></p>
                </div>
                <div>
                    <p>Warga Negara</p>
                    <p id="shortInput"><?php echo "<b>".$_SESSION['wargaNegaraRegister']."</b>";?></p>
                </div>
                <div>
                    <p>Alamat</p>         
                    <p><?php echo "<b>".$_SESSION['alamatRegister']."</b>";?></p>
                </div>
            </div>
            <div class="column">
                <div>
                    <p>Nama Tengah</p>
                    <p id="shortInput"><?php echo "<b>".$_SESSION['namaTengahRegister']."</b>";?></p>
                </div>
                <div>
                    <p>Tanggal Lahir</p>
                    <p id="shortInput"><?php echo "<b>".date('d-m-Y',strtotime($_SESSION['tanggalLahirRegister']))."</b>";?></p>
                </div>
                <div>
                    <p>Email</p>
                    <p id="shortInput"><?php echo "<b>".$_SESSION['emailRegister']."</b>";?></p>
                </div>
                <div>
                    <p>Kode Pos</p>         
                    <p id="shortInput"><?php echo "<b>".$_SESSION['kodePosRegister']."</b>";?></p>
                </div>
            </div>
            <div class="column">
                <div>
                    <p>Nama Belakang</p>
                    <p id="shortInput"><?php echo "<b>".$_SESSION['namaBelakangRegister']."</b>";?></p>
                </div>
                <div>
                    <p>NIK</p>
                    <p id="shortInput"><?php echo "<b>".$_SESSION['NIKRegister']."</b>";?></p>
                </div>
                <div>
                    <p>No HP</p>
                    <p id="shortInput"><?php echo "<b>".$_SESSION['noHPRegister']."</b>";?></p>
                </div>
                <div>
                    <p>Foto Profil</p>       
                    <p id="shortInput"><?php echo "<a href='".$_SESSION['folderUpload'].$_SESSION['namaFileFoto']."' target='blank'>".$_SESSION['namaFileFoto']."</a>";?></p>
                </div>
                <img src="<?php echo $_SESSION['folderUpload'].$_SESSION['namaFileFoto']; ?>" id="fotoProfil">
            </div>
        </div>
    </div>
</body>
</html>