<?php
require_once 'connect.php';

$errorMessage = 'Invalid data';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginEmail = addslashes($_POST['loginemail']);
    $loginPassword = addslashes($_POST['loginpassword']);

    $sql = "SELECT * FROM cld_table WHERE cld_email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $loginEmail);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($loginPassword, $user['cld_password'])) {
            session_start();
            $_SESSION["username"] = $user;
            header("Location: ../painel.php");
            exit();
        } else {
        }
    } else {
    }
}
?>

<link rel="stylesheet" href="../css/reset.css">
<link rel="stylesheet" href="../css/index.css">
<div style="display: flex; flex-direction: column; align-items: center; width: 30vw; margin: 0 auto;">
    <h1
        style="margin-top: 10vh; margin-bottom: 5vh; font-family: 'Montserrat', sans-serif; font-weight: bold; font-size: 2vw;">
        Login</h1>
    <form class="form-login" method="post" action=""
        style="display: flex; flex-direction: column; align-items: center;">
        <input name="loginemail" class="first-input" type="email" placeholder="E-mail" required>
        <br>
        <input name="loginpassword" class="input" type="password" placeholder="Password" required>
        <div style="display: flex; justify-content: space-between; width: 100%;">
            <p
                style="margin-top: 3vh; font-family: 'Montserrat', sans-serif; font-weight: 400; font-size: 1vw; color: red;">
                <?php echo $errorMessage; ?>
            </p>
            <a href="../index.php"
                style="margin-top: 3vh; font-family: 'Montserrat', sans-serif; font-weight: 400; font-size: 1vw; color: red;">Register</a>
        </div>
        <br>
        <button class="button">Login</button>
    </form>
</div>