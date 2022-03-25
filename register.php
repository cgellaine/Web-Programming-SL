<?php
    session_start();   
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
        margin: 20px;
        font-family: Arial;
        background-color: #C8F8FF;
    }
    .columns{
        display: flex;
    }
    .column{
        flex: 1;        
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
        width: 125px;
    }
    #shortInput, #password1, #password2{
        height: 20px;
        width: 235px;
    }
    #longInput{
        height: 60px;
        width: 235px;
    }
    #specialSpace{
        margin-top: -24px;
    }
    #specialSpace2{
        margin-top: -14px;
    }
    #specialSpace3{
        padding-top: 24px;
    }
    label {
        height: 63px;
        width: 238px;
        padding-top: 1.5px;
    }
    #specialSpace4{
        margin-top: -26px;
    }
    #specialSpace5{
        margin-top: -26px;
    }
    .bottom{
        display: flex;
        margin-top: 20px;
        margin-bottom: 5px;
        justify-content: right;
        align-items: center;
    }
    #kembali{
        border: 1.4px solid black;
        border-radius: 5px;
        box-shadow: 0.5px 1.4px 2px grey;
        padding: 4px;
        margin-right: 25px;
        width: 120px;
        text-align: center;
        background-color: #FDD7AC;
    }
    #register{
        border: 1.4px solid black;
        border-radius: 5px;
        box-shadow: 0.5px 1.4px 2px grey;
        margin-right: 50px;
        width: 131px;
        height: 30px;
        text-align: center;
        background-color: #ADF59F;
        font-size: 16px;
        cursor: pointer;
    }
    input, textarea{
        background-color: #F3F3F3;
        border: 0px;
    }
    a{
        text-decoration: none;
        color: black;
    }
    #file{
        position: relative;
        bottom: 65px;
        left: 125px;
        width: 235px;
        color: #6A8487;
    }
    #registForm{
        margin-left: 35px;
    }
</style>
<body>
    <?php
        echo "<h1 align=center>Register</h1>";
        echo "<br>";
    ?>
    <form action = "registerProcess.php" method="post" id="registForm" enctype = "multipart/form-data">
        <div class="columns">
            <div class="column">
                <div>
                    <p>Nama Depan</p>
                    <input type="text" name="namaDepan" id="shortInput" value="<?= isset($_SESSION['namaDepanRegister']) ? $_SESSION['namaDepanRegister'] : ''; ?>" required>
                </div>
                <div>
                    <p>Tempat Lahir</p>
                    <input type="text" name="tempatLahir" id="shortInput" value="<?= isset($_SESSION['tempatLahirRegister']) ? $_SESSION['tempatLahirRegister'] : ''; ?>" required>
                </div>
                <div>
                    <p>Warga Negara</p>
                    <input type="text" name="wargaNegara" id="shortInput" value="<?= isset($_SESSION['wargaNegaraRegister']) ? $_SESSION['wargaNegaraRegister'] : ''; ?>" required>
                </div>
                <div>
                    <p id="specialSpace">Alamat</p>         
                    <textarea name="alamat" id="longInput" required><?php if(isset($_SESSION['alamatRegister'])){echo htmlentities($_SESSION['alamatRegister']);}?></textarea>  
                </div>
                <div>
                    <p>Username</p>
                    <input type="text" name="username" id="shortInput" value="<?= isset($_SESSION['usernameRegister']) ? $_SESSION['usernameRegister'] : ''; ?>" required>
                </div>
            </div>
            <div class="column">
                <div>
                    <p>Nama Tengah</p>
                    <input type="text" name="namaTengah" id="shortInput" value="<?= isset($_SESSION['namaTengahRegister']) ? $_SESSION['namaTengahRegister'] : ''; ?>" required>
                </div>
                <div>
                    <p>Tanggal Lahir</p>
                    <input type="date" name="tanggalLahir" id="shortInput" value="<?= isset($_SESSION['tanggalLahirRegister']) ? $_SESSION['tanggalLahirRegister'] : ''; ?>" required>
                </div>
                <div>
                    <p>Email</p>
                    <input type="email" name="email" id="shortInput" value="<?= isset($_SESSION['emailRegister']) ? $_SESSION['emailRegister'] : ''; ?>" required>
                </div>
                <div id="specialSpace2">
                    <p>Kode Pos</p>         
                    <input type="text" name="kodePos" id="shortInput" value="<?= isset($_SESSION['kodePosRegister']) ? $_SESSION['kodePosRegister'] : ''; ?>" required>       
                </div>
                <div id="specialSpace3">
                    <p>Password 1</p>
                    <input type="password" name="password1" id="password1" value="<?= isset($_SESSION['passwordRegister']) ? $_SESSION['passwordRegister'] : ''; ?>" required>
                </div>
            </div>
            <div class="column">
                <div>
                    <p>Nama Belakang</p>
                    <input type="text" name="namaBelakang" id="shortInput" value="<?= isset($_SESSION['namaBelakangRegister']) ? $_SESSION['namaBelakangRegister'] : ''; ?>" required>
                </div>
                <div>
                    <p>NIK</p>
                    <input type="text" name="NIK" id="shortInput" value="<?= isset($_SESSION['NIKRegister']) ? $_SESSION['NIKRegister'] : ''; ?>" required>
                </div>
                <div>
                    <p>No HP</p>
                    <input type="text" name="noHP" id="shortInput" value="<?= isset($_SESSION['noHPRegister']) ? $_SESSION['noHPRegister'] : ''; ?>" required>
                </div>
                <div>
                    <p id="specialSpace4">Foto Profil</p>   
                    <label for="file">Silahkan Pilih Foto</label>     
                </div>
                <input type="file" id="file" name="fotoProfil" accept="image/*" required style="background-color:transparent;"> 
                <div id="specialSpace5">
                    <p>Password 2</p>
                    <input type="password" name="password2" id="password2" value="<?= isset($_SESSION['passwordRegister']) ? $_SESSION['passwordRegister'] : ''; ?>" required>
                </div>
            </div>
        </div>
        <div class="bottom">
            <a href="welcome.php"><p id="kembali">Kembali</p></a>
            <button name="register" id="register" onclick="validate()">Register</button>
        </div>
    </form>
    <div class="errorMsg">
        <?= isset($_SESSION['registerError']) ? $_SESSION['registerError'] : '';?>
    </div>
</body>
</html>