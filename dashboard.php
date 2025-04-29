<?php 
  session_start();

  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
  }

  $usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

  <h1>Meus dados de acesso</h1>
  <ul>
    <li>Nome de Usuário: <?= $usuario['nome']; ?></li> <!-- Exibe o nome de usuário -->
    <li>Email: <?= $usuario['email']; ?></li>
    <li><a href="logout.php">Sair</a></li>
  </ul>

</body>
</html>
