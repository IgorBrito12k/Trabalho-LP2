<?php
require_once "../topo.php";
if ($_SESSION['tipoUsuario'] == 1) {
?>
<div class="container">
    <h2 id="titulo">Cadastro de Planos</h2>
        <form name="form1" action="inserirplano.php"
        method="post">
        <label for="idPessoa">ID Pessoa</label><br>
        <input class="input" type="text" name="idPessoa" required><br>
        <label for="nome">Nome</label>
        <input class="input" type="text" name="nome" required><br>
        <label for="cnpj">CNPJ</label>
        <input class="input" type="text" name="cnpj" required><br>
        <label for="operadora">Operadora</label>
        <input class="input" type="text" name="operadora" required><br>
        <input class="link2" type="submit" value="Cadastrar">
        </form>
</div>
<?php
} else 
    echo "<p class='texto2'>Você não tem permissão 
    para executar esta ação.</p>";
require_once "../rodape.php";
?>