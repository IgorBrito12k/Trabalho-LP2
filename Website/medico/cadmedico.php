<?php
require_once "../topo.php";
    if (isset($_SESSION['tipoUsuario']) &&$_SESSION['tipoUsuario'] == 1) {
    ?>
        <h2 id="titulo">Cadastro de Medico</h2>
            <form name="form1" action="inserirmedico.php"
            method="post">
            <label for="nome">Nome</label>
            <input class='input' type="text" name="nome" required><br>
            <label for="crm">CRM</label>
            <input class='input' type="crm" name="crm" required><br>
            <input class="link2" type="submit" value="Cadastrar">
            </form>
    <?php
    } else 
        echo "<p class='texto2'>Você não tem permissão 
        para executar esta ação.</p>";
require_once "../rodape.php";
?>