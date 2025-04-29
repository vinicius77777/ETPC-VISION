<?php
require 'config.php';

$nome = $_POST['nome'];  // Recebe o nome de usuário
$email = $_POST['email'];
$senha = $_POST['senha'];

try {
    // Verificar se o e-mail já existe
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM lusuarios WHERE email = ?");  // Alterado para lusuarios
    $stmt->execute([$email]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        // Redireciona de volta para a página de cadastro com mensagem de erro
        header("Location: register.php?msg=2");
        exit();
    }

    // Se não existir, insere o novo usuário
    $stmt = $pdo->prepare("INSERT INTO lusuarios (nome, email, senha) VALUES (?, ?, ?)");  // Alterado para lusuarios
    $stmt->execute([$nome, $email, $senha]);

    // Redireciona para o login após o cadastro
    header("Location: index.php?msg=3");
    exit();
} catch (PDOException $e) {
    echo "Erro ao cadastrar: " . $e->getMessage();
}
?>
