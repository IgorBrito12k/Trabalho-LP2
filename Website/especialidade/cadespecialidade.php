<?php
require_once "../topo.php";
if ($_SESSION['tipoUsuario'] == 1) {
?>
<div class="content">
<h2 id="titulo">Cadastro de Especialidade</h2>
    <form name="form1" action="inserirespecialidades.php"
    method="post">
    <label for="idPessoa">ID Pessoa</label><br>
    <input class="input" type="text" name="idPessoa" required><br>
    <label for="nome">Nome</label>
    <input class='input' type="text" name="nome" required><br>
    <input class="link2" type="submit" value="Cadastrar">
    </form>
</div>
<?php
} else 
    echo "<p class='texto2'>Você não tem permissão 
    para executar esta ação.</p>";
require_once "../rodape.php";
?>