<?php
require_once "../topo.php";
if ($_SESSION['tipoUsuario'] == 1) {
?>
<div class="container">
    <h3 id="titulo">Cadastro de Planos</h3>
    <fieldset class="form">
        <form name="form1" action="inserirplano.php"
        method="post">
        <label for="idPessoa">ID Pessoa</label><br>
        <input type="text" name="idPessoa" required><br>
        <label for="nome">Nome</label>
        <input type="text" name="nome" required><br>
        <label for="cnpj">CNPJ</label>
        <input type="text" name="cnpj" required><br>
        <label for="operadora">Operadora</label>
        <input type="text" name="operadora" required><br>
        </fieldset>
        <input class="botao" type="submit" value="Cadastrar">
        </form>
</div>
<?php
} else 
    echo "<p>Você não tem permissão 
    para executar esta ação.</p>";
require_once "../rodape.php";
?>