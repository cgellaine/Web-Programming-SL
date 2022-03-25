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
    :root{
        --bgWelcome: #E5EDEB;
        --logoColor: #51ACC5;
        --bgLogin: #99D6ED;
        --bgRegister: #C6ED99;
    }
    body{
        margin: 0px;
        font-family: Arial;
        background-color: var(--bgWelcome);
    }
    h2{
        color: var(--logoColor);
        letter-spacing: 1.5px;
        font-family: Cursive;
        font-size: 25px;
        padding-top: 20px;
    }
    h1{
        font-weight: lighter;
    }
    .buttons{
        margin-top: 55px;
        display: flex;
        justify-content: center;
        margin-bottom: 123.7px
    }
    #LoginBtn{
        cursor: pointer;
        background-color: var(--bgLogin);
        font-size: 20px;
        border: 0px;
        padding: 25px;
        margin-right: 50px;
        width: 150px;
    }
    #RegisterBtn{
        cursor: pointer;
        background-color: var(--bgRegister);
        font-size: 20px;
        border: 0px;
        padding: 25px;
        width: 150px;
    }
    footer{
        background-color: #CEDED8;
        height: 140px;
    }
    footer p{
        padding: 26px;
        font-size: 18px;
        font-family: monospace;
        text-align: center;
    }
</style>
<body>
    <?php
        echo "<h2 align=center> &#10019 Aplikasi Pengelolaan Keuangan &#10019 </h2>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<h1 align=center> Selamat Datang di Aplikasi Pengelolaan Keuangan </h1>";
    ?>
    <div class="buttons">
        <a href="
            <?php
                if(!isset($_SESSION['successfullyRegister'])){
                    echo "register.php";
                }
                if(isset($_SESSION['successfullyLogin'])){
                    echo "home.php";
                }
                if(isset($_SESSION['successfullyRegister']) && !isset($_SESSION['successfullyLogin'])){
                    echo "login.php";
                }
            ?>
        ">
        <button id="LoginBtn">Login</button></a>
        <a href="
            <?php
                if(isset($_SESSION['successfullyRegister'])){ 
                    if(isset($_SESSION['successfullyLogin'])){
                        echo "home.php";
                    }
                    else{
                        echo "login.php";
                    }
                }
                else{
                    echo "register.php";
                }
            ?>   
        ">
        <button id="RegisterBtn">Register</button></a>
    </div>
    <footer>
        <p>2440092271<br>CHRIST GRACELIA ELLAINE<br><br>Copyright &copy Web Programming - SL 1</p>
    </footer>
</body>
</html>