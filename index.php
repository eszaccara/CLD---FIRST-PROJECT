<?php

session_start();

if (isset($_SESSION["username"])) {
    header("Location: /cld/painel.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="Wed, 11 Jan 1984 05:00:00 GMT">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLD - Project</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="container">
        <div class="container-logo">
            <img class="logo" src="images/logo.png">
        </div>
        <div class="container-main">
            <div class="container-menu">
                <select class="menu" id="menu">
                    <option class="menu-item" value="register" selected>Register</option>
                    <option class="menu-item" value="login" id="login">Login</option>
                </select>
            </div>
            <div class="container-separator">
                <div class="container-register">
                    <form class="form-register" method="post" action="/cld/php/insertData.php">
                        <input name="name" id="name" class="first-input" type="text" placeholder="Name" required
                            oninvalid="this.setCustomValidity('Fill in your name')" oninput="setCustomValidity('')">
                        <p class="input-error" id="error-name"></p>
                        <br>
                        <input name="surname" id="surname" class="input" type="text" placeholder="Surname" required
                            oninvalid="this.setCustomValidity('Fill in your last name')"
                            oninput="setCustomValidity('')">
                        <p class="input-error" id="error-surname"></p>
                        <br>
                        <input name="email" id="email" class="input" type="email" placeholder="E-mail" required
                            oninvalid="this.setCustomValidity('Fill in your email')" oninput="setCustomValidity('')">
                        <p class="input-error" id="error-email"></p>
                        <br>
                        <input name="number" id="number" class="input" type="tel" placeholder="Number" data-js="phone" required
                            oninvalid="this.setCustomValidity('Fill in your phone number')"
                            oninput="setCustomValidity('')">
                        <p class="input-error" id="error-number"></p>
                        <br>
                        <input name="date" id="date" class="input" type="text" placeholder="Date of birth" data-js="date"
                            minlength="8" required oninvalid="this.setCustomValidity('Fill in your Date Of Birth')"
                            oninput="setCustomValidity('')">
                        <p class="input-error" id="error-date"></p>
                        <br>
                        <input name="password" id="password" class="input" type="password" placeholder="Password" data-js="password"
                            required oninvalid="this.setCustomValidity('Set your password')"
                            oninput="setCustomValidity('')">
                        <div class="container-error-password">
                            <p class="input-error-password" id="error-passnumber">number</p>
                            <p class="input-error-password" id="error-passlower">lower case</p>
                            <p class="input-error-password" id="error-passminlength">eight characters minimum</p>
                            <p class="input-error-password" id="error-passspecial">special character</p>
                            <p class="input-error-password" id="error-passcapital">capital letter</p>
                        </div>
                        <button class="button" type="submit">Register</button>
                    </form>
                </div>
                <div class="container-login">
                    <form class="form-login" method="post" action="/cld/php/login.php">
                        <input name="loginemail" class="first-input" type="email" placeholder="E-mail">
                        <br>
                        <input name="loginpassword" class="input" type="password" placeholder="Password">
                        <br>
                        <button class="button">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/Animations.js"></script>
<script src="js/validateName.js"></script>
<script src="js/validateEmail.js"></script>
<script src="js/formatNumber.js"></script>
<script src="js/formatDate.js"></script>
<script src="js/validatePassword.js"></script>
<script src="js/mainValidate.js"></script>

</html>