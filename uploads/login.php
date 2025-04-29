<?php
session_start();
require 'config.php';

$nome = $_POST['nome'];  // Recebe o nome de usuário
$senha = $_POST['senha'];

// Tenta buscar o usuário usando o nome ou email
$stmt = $pdo->prepare("SELECT * FROM lusuarios WHERE nome = ? OR email = ?");  // Alterado para lusuarios
$stmt->execute([$nome, $nome]);  // Busca no banco por nome ou email
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && $senha == $usuario['senha']) {
    $_SESSION['usuario'] = $usuario;
    header("Location: index.html"); // Redireciona para index.html após login
    exit();
} else {
    header("Location: index.php?msg=1"); // Retorna ao login com erro
    exit();
}
?>
