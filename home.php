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
    p{
        font-size: 20px;
        margin-bottom: 0px;
    }
    footer{
        background-color: #CEDED8;
        height: 140px;
        margin-top: 150.3px;
    }
    footer p{
        padding: 26px;
        font-size: 18px;
        font-family: monospace;
        text-align: center;
    }
    h5{
        margin: 0px;
        margin-top: 10px;
        font-size: 50px;
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
                <a href="home.php" id="menu"><u>Home</u></a>
            </div>
            <div class="profile">
                <a href="profile.php" id="menu">Profile</a>
            </div>
        </div>
        <div class="logout">
            <a href="logout.php" id="logout">Logout</a>
        </div>
    </div>
    <?php
        session_start();
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<P align=center>"."Halo "."<b>".$_SESSION['namaDepanRegister']." ".$_SESSION['namaTengahRegister']." ".$_SESSION['namaBelakangRegister']."</b>".", Selamat Datang di Aplikasi Pengelolaan Keuangan"."</p>";
        echo "<h5 align=center>&#9786 &#9786 &#9786</h5>";
    ?>
    <footer>
        <p>2440092271<br>CHRIST GRACELIA ELLAINE<br><br>Copyright &copy Web Programming - SL 1</p>
    </footer>
</body>
</html>