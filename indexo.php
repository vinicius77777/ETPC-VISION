<?php 
 require "./template/header.php";
?>
    
    <div class="content">
        <h1>Welcome to the Inspired Site</h1>
        <p>An artistic approach to modern web design.</p>
    </div>

    <div class="button-container">
    <a href="pagina_destino.php" class="custom-button" onclick="startVenomTransition(event)">
    <span class="button-text">Avançar</span>
    <span class="custom-arrow"></span>
</a>
    </a>
    </div>


    <div class="profile-container">
        <!-- Ícone de bonequinho -->
        <div class="profile-icon" id="profileIcon">
            <img src="./img/avatar.png" alt="Perfil" id="profileImage">
        </div>

        <!-- Menu de opções -->
        <div class="profile-options" id="profileOptions">
            <a href="change_profile.php">Mudar Foto de Perfil</a>
            <a href="logout.php">Sair</a>
        </div>
    </div>


 <script src="./js/index/script.js"></script>
    
</body>
</html>
