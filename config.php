<?php
require_once 'php/connect.php';
session_start();
if (isset($_SESSION["username"])) {
    $dadosUser = ($_SESSION["username"]);
}
if (!isset($_SESSION["username"])) {
    header("Location: /cld/index.php");
    exit();
}
if (isset($_GET["sair"])) {
    session_destroy();
    header("Location: /cld/index.php");
    exit();
}
?>




<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/painel.css">
    <link rel="stylesheet" href="css/config.css">
    <title>Config: <?php echo $dadosUser['cld_name'] . " " . $dadosUser['cld_surname'] ?> </title>
</head>

<body>
    <a href="painel.php"><i class="fa-solid fa-right-to-bracket"
            style="position: absolute; right: 1vw; top: 1vw; font-size: 1.5vw; color: black;"
            onmouseover="this.style.cursor='pointer'; this.style.fontSize='1.7vw'; this.style.transition='.5s'"
            onmouseout="this.style.transition='.5s'; this.style.fontSize='1.5vw';"></i></a>
    <div class="painel-config">
        <div>
            <div class="config-data">
                <span style="font-weight: bold;">Name: </span><span>
                    <?php echo $dadosUser['cld_name'] . ' ' . $dadosUser['cld_surname']; ?>
                </span><span><i class="icon-editx fa-sharp fa-solid fa-xmark"></i></span>
            </div>
            <div class="config-data">
                <span style="font-weight: bold;">Email: </span><span>
                    <?php echo $dadosUser['cld_email']; ?>
                </span><span><i id="editEmail" class="icon-edit fa-solid fa-pen-to-square"></i></span>
            </div>
            <div class="config-data">
                <span style="font-weight: bold;">Number: </span><span>
                    <?php echo $dadosUser['cld_number']; ?>
                </span><span><i id="editNumber" class="icon-edit fa-solid fa-pen-to-square"></i></span>
            </div>
            <div class="config-data">
                <span style="font-weight: bold;">Date Of Birth: </span><span>
                    <?php echo $dadosUser['cld_dateofbirth']; ?>
                </span><span><i class="icon-editx fa-sharp fa-solid fa-xmark"></i></span>
            </div>
            <div class="config-data">
                <span style="font-weight: bold;">Account Creation: </span><span>
                    <?php echo $dadosUser['cld_date']; ?>
                </span><span><i class="icon-editx fa-sharp fa-solid fa-xmark"></i></span>
            </div>
            <div class="config-data">
                <span style="font-weight: bold;">Password: </span><span>
                    Impossible visualization</span><span><i id="editPassword" class="icon-edit fa-solid fa-pen-to-square"></i></span>
            </div>
        </div>
    </div>
    <div class="form-email">
        <form method="post" action="/cld/php/changeData.php">
            <i class="config-close fa-sharp fa-solid fa-xmark"></i>
            <label>New email:</label>
            <input name="inputChangeEmail" class="input-email" type="email" placeholder="youremail@email.com" required>
            <br>
            <br>
            <input name="sendChangeEmail" class="input-submit" type="submit" value="Send">
        </form>
    </div>
    <div class="form-number">
        <form method="post" action="/cld/php/changeData.php">
            <i class="config-close2 fa-sharp fa-solid fa-xmark"></i>
            <label>New number:</label>
            <input name="inputChangeNumber" class="input-email input-number" type="text" required>
            <br>
            <br>
            <input name="sendChangeNumber" class="input-submit" type="submit" value="Send">
        </form>
    </div>
    <div class="form-password">
        <form method="post" action="/cld/php/changeData.php" enctype="multipart/form-data" name="imagem">
            <i class="config-close3 fa-sharp fa-solid fa-xmark"></i>
            <label>Old Password:</label>
            <input name="inputOldPassword" class="input-email input-password" type="password" required>
            <br>
            <br>
            <label>New Password:</label>
            <input name="inputChangePassword" class="input-email input-password" type="password" required>
            <br>
            <br>
            <input name="sendChangePassword" class="input-submit" type="submit" value="Send">
        </form>
    </div>
    <div class="logout">
        <p><a href="?sair=1">Logout</a></p>
    </div>
    <script src="https:kit.fontawesome.com/8aaf02057a.js" crossorigin="anonymous"></script>
    <script src="js/painel.js"></script>
    <script src="js/config.js"></script>
</body>

</html>