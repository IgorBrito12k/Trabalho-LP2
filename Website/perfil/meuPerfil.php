<?php
require_once("../topo.php");
if(isset($_SESSION['nomeUsuario'])){
    ?>
        <h2>Gerenciamento de Perfil</h2><br>
        <a href="mudarperfil.php">Meu perfil</a><br><br>
        <a href="meuplano.php">Meus Plano</a><br>
        <a href="meusremedios.php">Meus Remédios</a><br>
        <a href="minhaespecialidade.php">Minhas especialidades</a><br><br>
        <a href="logout.php">Sair</a><br>
    <?php
}else{
    echo "<p>Você precisa estar logado para acessar esta função.</p>";
}
require_once("../rodape.php");
?>