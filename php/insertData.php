<?php

require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = addslashes($_POST['name']);
    $surname = addslashes($_POST['surname']);
    $email = addslashes($_POST['email']);
    $number = addslashes($_POST['number']);
    $dateofbirth = addslashes($_POST['date']);
    $password = addslashes($_POST['password']);

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO cld_table (cld_name, cld_surname, cld_email, cld_number, cld_dateofbirth, cld_password) VALUES (:name, :surname, :email, :number, :dateofbirth, :password)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':dateofbirth', $dateofbirth);
    $stmt->bindParam(':password', $hashedPassword);

    if ($stmt->execute()) {
        $cldID = $pdo->lastInsertId();
        $createFilesTableSql = "CREATE TABLE bd_$cldID (
            fileid INT AUTO_INCREMENT PRIMARY KEY,
            filepath VARCHAR(255) NOT NULL,
            fileupdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $pdo->exec($createFilesTableSql);


        ?>

        <link rel="stylesheet" href="../css/animation.css">
        <link rel="stylesheet" href="../css/index.css">
        <div class="container-registered">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
            <div class="container-animation">
                <h1 class="">registered!</h1>
                <form method="post" action="login.php">
                    <input name="loginemail" class="first-input" type="email" placeholder="E-mail">
                    <br>
                    <input name="loginpassword" class="input" type="password" placeholder="Password">
                    <br>
                    <button class="button">Login</button>
                </form>
            </div>
        </div>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                setTimeout(() => {
                    const spinner = document.querySelector('.spinner').classList.add('spinner-desable');
                }, 2500);
                setTimeout(() => {
                    const containerRegister = document.querySelector('.container-animation').classList.add('container-animation-active');
                }, 2510);
            })
        </script>



        <?php
    } else {
        echo "Erro ao inserir os dados: " . $stmt->errorInfo()[2];
    }

}