<?php
require_once 'connect.php';
function changeEmail($newEmail)
{
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: /cld/index.php");
        exit();
    }

    $dadosUser = $_SESSION["username"];
    $cld_id = $dadosUser['cld_id'];

    $newEmail = addslashes($newEmail);

    global $pdo; // Variável de conexão PDO

    $sql = "UPDATE cld_table SET cld_email = :newEmail WHERE cld_id = :cld_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':newEmail', $newEmail);
    $stmt->bindParam(':cld_id', $cld_id);

    if ($stmt->execute()) {
        echo "Email atualizado com sucesso!";
        $_SESSION["username"]["cld_email"] = $newEmail;
        header("Location: ../config.php");
    } else {
        echo "Erro ao atualizar o email: " . $stmt->errorInfo()[2];
    }
}
function changeNumber($newNumber)
{
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: /cld/index.php");
        exit();
    }

    $dadosUser = $_SESSION["username"];
    $cld_id = $dadosUser['cld_id'];

    $newNumber = addslashes($newNumber);

    global $pdo; // Variável de conexão PDO

    $sql = "UPDATE cld_table SET cld_number = :newNumber WHERE cld_id = :cld_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':newNumber', $newNumber);
    $stmt->bindParam(':cld_id', $cld_id);

    if ($stmt->execute()) {
        echo "Número atualizado com sucesso!";
        $_SESSION["username"]["cld_number"] = $newNumber;
        header("Location: ../config.php");
    } else {
        echo "Erro ao atualizar o número: " . $stmt->errorInfo()[2];
    }
}

function changePassword($oldPassword, $newPassword)
{
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: /cld/index.php");
        exit();
    }
    $dadosUser = $_SESSION["username"];
    $cld_id = $dadosUser['cld_id'];

    $newPassword = addslashes($newPassword);
    $oldPassword = addslashes($oldPassword);

    global $pdo;

    $sql = "UPDATE cld_table SET cld_password = :newPassword WHERE cld_id = :cld_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':newPassword', $newPassword);
    $stmt->bindParam(':cld_id', $cld_id);

    $verifySql = "SELECT cld_password FROM cld_table WHERE cld_id = :cld_id";
    $verifyStmt = $pdo->prepare($verifySql);
    $verifyStmt->bindParam(':cld_id', $cld_id);
    $verifyStmt->execute();
    $result = $verifyStmt->fetch(PDO::FETCH_ASSOC);

    if (!$result || !password_verify($oldPassword, $result['cld_password'])) {
        echo "<script>alert('" . "Senha antiga incorreta." . "');</script>";
        return;
    }

    $updateSql = "UPDATE cld_table SET cld_password = :newPassword WHERE cld_id = :cld_id";
    $updateStmt = $pdo->prepare($updateSql);
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $updateStmt->bindParam(':newPassword', $hashedPassword);
    $updateStmt->bindParam(':cld_id', $cld_id);

    if ($updateStmt->execute()) {
        session_destroy()
        ?>
        <html>

        <head>
            <title>Centralizar Conteúdo</title>
            <style>
                /* CSS interno para centralizar o conteúdo */
                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap');

                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    font-family: 'Montserrat', sans-serif;
                }

                .content {
                    text-align: center;
                }
            </style>
        </head>

        <body>
            <div class="content">
                <h1>Senha alterada com sucesso.</h1>
                <p>Sua sessão foi finalizada, você precisa fazer login novamente.</p>
                <a href="../painel.php"><i class="fa-solid fa-right-to-bracket" style="font-size: 1.5vw; color: black;"></i></a>
            </div>
        </body>
        <script src="https:kit.fontawesome.com/8aaf02057a.js" crossorigin="anonymous"></script>

        </html>
        <?php
    } else {
        echo "Erro ao atualizar a senha: " . $updateStmt->errorInfo()[2];
    }
}

if (isset($_POST['sendChangeEmail'])) {
    $newEmail = $_POST['inputChangeEmail'];
    changeEmail($newEmail);
}
if (isset($_POST['sendChangeNumber'])) {
    $newNumber = $_POST['inputChangeNumber'];
    changeNumber($newNumber);
}
if (isset($_POST['sendChangePassword'])) {
    $newPassword = $_POST['inputChangePassword'];
    $oldPassword = $_POST['inputOldPassword'];
    changePassword($oldPassword, $newPassword);
}
?>