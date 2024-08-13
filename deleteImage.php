<?php
error_reporting(E_ERROR | E_PARSE); // Mostrar apenas erros fatais
ini_set('display_errors', 0); // Desabilitar a exibição de erros no navegador

require_once 'php/connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dadosNome = $_SESSION["username"];

    // ID do arquivo a ser excluído
    $imgSrc = $_POST["imgSrc"];
    $imgId = $_POST["imgId"];

    // Lógica para excluir a imagem do banco de dados
    $sql = "DELETE FROM bd_" . $dadosNome['cld_id'] . " WHERE fileid = :fileId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fileId', $imgId);
    $stmt->execute();
    
    // Lógica para excluir a imagem do servidor
    if (file_exists($imgSrc)) {
        unlink($imgSrc);
    }
}
?>