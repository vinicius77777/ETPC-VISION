<?php
session_start();
require 'config.php';  // Inclui o arquivo de configuração para conectar ao banco de dados

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");  // Se não estiver logado, redireciona para a página de login
    exit();
}

// Se o formulário de envio de imagem foi submetido
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $nomeArquivo = $_FILES['foto']['name'];  // Nome do arquivo carregado
    $caminhoTemporario = $_FILES['foto']['tmp_name'];  // Caminho temporário do arquivo
    $destino = 'uploads/' . $nomeArquivo;  // Caminho para salvar o arquivo na pasta 'uploads'

    // Tenta mover o arquivo para a pasta de uploads
    if (move_uploaded_file($caminhoTemporario, $destino)) {
        try {
            // Atualiza o caminho da foto no banco de dados
            $stmt = $pdo->prepare("UPDATE lusuarios SET foto = ? WHERE id = ?");
            $stmt->execute([$nomeArquivo, $_SESSION['usuario']['id']]);

            // Atualiza a foto no array de sessão
            $_SESSION['usuario']['foto'] = $nomeArquivo;

            // Redireciona para a página de perfil após a alteração
            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            echo "Erro ao atualizar a foto: " . $e->getMessage();
        }
    } else {
        echo "Erro ao mover o arquivo!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Foto de Perfil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Alterar Foto de Perfil</h2>

    <!-- Formulário para carregar a nova foto -->
    <form action="change_profile.php" method="POST" enctype="multipart/form-data">
        <label for="foto">Escolha uma foto:</label>
        <input type="file" name="foto" id="foto" required>
        <button type="submit">Alterar Foto</button>
    </form>

    <a href="index.php">Voltar para o Perfil</a>

</body>
</html>
