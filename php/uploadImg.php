<?php
require_once('connect.php');
session_start();

if (isset($_SESSION["username"])) {
    $dadosNome = $_SESSION["username"];
}

$directory = dirname(__DIR__) . '/' . 'uploadImgs/' . $dadosNome['cld_id'];

if (!file_exists($directory)) {
    mkdir($directory, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $imagem = $_FILES['imagem'];
    $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
    $nomeImagem = uniqid() . '.' . $extensao;
    $caminhoImagem = $directory . '/' . $nomeImagem;

    $filepath = $caminhoImagem;

    $sql = "INSERT INTO bd_" . $dadosNome['cld_id'] . " (filepath) VALUES (:filepath)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':filepath', $filepath);
    $stmt->execute(); // Corrigido para chamar o método execute() no objeto $stmt

    if (move_uploaded_file($imagem['tmp_name'], $caminhoImagem)) {
        header("Location: ../painel.php");
        exit();
    } else {
        header("Location: ../error.php");
        exit();
    }    
}

?>