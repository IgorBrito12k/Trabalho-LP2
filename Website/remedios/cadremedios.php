<?php
require_once "../topo.php";
if (isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == 1) {
?>
<div class="content">
<h2 id="titulo">Cadastro de Remédios</h2>
    <form name="form1" action="inserirremedio.php"
    method="post">
    <label for="idPessoa">ID Pessoa</label><br>
    <input class='input' type="text" name="idPessoa" required><br>
    <label for="nome">Nome</label>
    <input class='input' type="text" name="nome" required><br>
    <label for="marca">Marca</label>
    <input class='input' type="marca" name="marca" required><br>
    <label for="lugar">Onde o remédio age</label>
    <input class='input' type="lugar" name="lugar" required><br>
    <input class="link2" type="submit" value="Cadastrar">
    </form>
</div>
<?php
} else 
    echo "<p class='texto2'>Você não tem permissão 
    para executar esta ação.</p>";
require_once "../rodape.php";
?>