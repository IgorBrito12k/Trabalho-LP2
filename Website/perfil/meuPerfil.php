<?php
require_once("../topo.php");
if(isset($_SESSION['nomeUsuario'])){
    ?>
        <h2>Gerenciamento de Perfil</h2><br>
        <a class="link2" href="mudarperfil.php">Meu perfil</a><br><br>
        <a class="link2" href="meuplano.php">Meus Plano</a><br><br>
        <a class="link2" href="meusremedios.php">Meus Remédios</a><br><br>
        <a class="link2" href="minhaespecialidade.php">Minhas especialidades</a><br><br>
        <a class="link2" href="logout.php">Sair</a>
    <?php
}else{
    echo "<p class='texto2'>Você precisa estar logado para acessar esta função.</p>";
}
require_once("../rodape.php");
?>