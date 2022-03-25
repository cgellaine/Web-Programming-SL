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
        margin: 0px;        
        font-family: Arial;
        background-color: #FCFDD1;
    }
    .loginArea{
        background-color: #ACE6FD;
        text-align: center;
        width: 620px;
        margin: auto;
        padding: 30px 0px;
        font-size: 20px;
    }
    .inputArea div{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
    }
    .inputArea div p{
        text-align: left;
        width: 135px;
    }
    #userInput{
        height: 28px;
        width: 300px;
        border: none;
    }
    .buttonArea{
        display: flex;
        margin-top: 25px;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
    }
    #login{
        border: none;
        border-radius: 5px;
        margin-left: 83px;
        margin-right: 25px;
        width: 115px;
        height: 32px;
        text-align: center;
        background-color: #ADF59F;
        font-size: 20px;
        cursor: pointer;
    }
    #kembali{
        text-decoration: none;
        color: black;
        paddding-top: 2px;
        border: none;
        border-radius: 5px;
        padding: 4px;
        width: 104px;
        height: 24px;
        text-align: center;
        background-color: #FDD7AC;
    }
</style>
<body>
    <?php
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<h1 align=center>Login</h1>";
        echo "<br>";
        echo "<br>";
    ?>
    <div class="loginArea">
        <form action="loginProcess.php" method="post">
            <div class="inputArea">
                <div>
                    <p>Username</p>
                    <input type="text" name="usernameLogin" id="userInput" value="<?= isset($_SESSION['usernameLogin']) ? $_SESSION['usernameLogin'] : ''; ?>" required>
                </div>
                <div>
                    <p>Password</p>
                    <input type="password" name="passwordLogin" id="userInput" value="<?= isset($_SESSION['passwordLogin']) ? $_SESSION['passwordLogin'] : ''; ?>" required>
                </div>
            </div>
            <div class="buttonArea">
                <input type="submit" name="login" id="login" value="Login">
                <a href="welcome.php" id="kembali">Kembali</p></a>
            </div>
       </form>
    </div>
    <div class="errorMsg">
        <?= isset($_SESSION['loginError']) ? $_SESSION['loginError'] : '';?>
    </div>
</body>
</html>