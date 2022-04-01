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
        width: 235px;
    }
    label {
        height: 63px;
        width: 238px;
        padding-top: 1.5px;
    }
    h3{
        font-size: 24px;
        padding-top: 10px;
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
        margin-top: -10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }
    .title a{
        font-size: 34px;
        cursor: pointer;
        color: green;
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
            echo "<h3 align=center>Profil Pribadi</h3>";
        ?>
        <div>
            <a href="
                <?php
                    echo "editProfile.php?username=".$_SESSION['loginedUsername']."";
                ?>
            ">&nbsp&#9998;</a>
        </div>
    </div>
    <div class="profiles">
        <div class="columns">
            <div class="column">
                <div>
                    <p>Nama Depan</p>
                    <p id="shortInput"><?php echo "<b>".$row['nama_depan']."</b>";?></p>
                </div>
                <div>
                    <p>Tempat Lahir</p>
                    <p id="shortInput"><?php echo "<b>".$row['tempat_lahir']."</b>";?></p>
                </div>
                <div>
                    <p>Warga Negara</p>
                    <p id="shortInput"><?php echo "<b>".$row['warga_negara']."</b>";?></p>
                </div>
                <div>
                    <p>Alamat</p>         
                    <p><?php echo "<b>".$row['alamat']."</b>";?></p>
                </div>
            </div>
            <div class="column">
                <div>
                    <p>Nama Tengah</p>
                    <p id="shortInput"><?php echo "<b>".$row['nama_tengah']."</b>";?></p>
                </div>
                <div>
                    <p>Tanggal Lahir</p>
                    <p id="shortInput"><?php echo "<b>".date('d-m-Y',strtotime($row['tanggal_lahir']))."</b>";?></p>
                </div>
                <div>
                    <p>Email</p>
                    <p id="shortInput"><?php echo "<b>".$row['email']."</b>";?></p>
                </div>
                <div>
                    <p>Kode Pos</p>         
                    <p id="shortInput"><?php echo "<b>".$row['kode_pos']."</b>";?></p>
                </div>
            </div>
            <div class="column">
                <div>
                    <p>Nama Belakang</p>
                    <p id="shortInput"><?php echo "<b>".$row['nama_belakang']."</b>";?></p>
                </div>
                <div>
                    <p>NIK</p>
                    <p id="shortInput"><?php echo "<b>".$row['nik']."</b>";?></p>
                </div>
                <div>
                    <p>No HP</p>
                    <p id="shortInput"><?php echo "<b>".$row['no_hp']."</b>";?></p>
                </div>
                <div>
                    <p>Foto Profil</p>       
                    <p id="shortInput"><?php echo "<a href='fotoProfil/".$row['nama_foto_profil']."' target='blank'>".$row['nama_foto_profil']."</a>";?></p>
                </div>
                <img src="fotoProfil/<?php echo $row['nama_foto_profil']; ?>" id="fotoProfil">
            </div>
        </div>
    </div>
</body>
</html>