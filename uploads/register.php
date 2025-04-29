<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>
        <form action="register_save.php" method="POST">
            <input type="text" name="nome" placeholder="Nome de Usuário" required> <!-- Campo para o nome de usuário -->
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit" class="registerbutton">Cadastrar</button>
        </form>

        <p>Já tem uma conta? <a href="index.php">Faça login</a></p>

        <?php
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
