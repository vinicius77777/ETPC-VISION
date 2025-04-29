<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="uploads/style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="text" name="nome" placeholder="Nome de Usuário" required> <!-- Campo para nome de usuário -->
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>

        <p>Não tem uma conta? <a href="register.php">Cadastre-se aqui</a></p>

        <?php 
           if(isset($_GET['msg']) && $_GET['msg'] == 1) {
                echo "<p class='error'>Login ou senha incorreto!</p>";
           }
           if(isset($_GET['msg']) && $_GET['msg'] == 2) {
                echo "<p class='error'>Este e-mail já está cadastrado!</p>";
           }
           if(isset($_GET['msg']) && $_GET['msg'] == 3) {
                echo "<p class='success'>Cadastro realizado com sucesso! Faça login.</p>";
           }
        ?>
    </div>
</body>
</html>
