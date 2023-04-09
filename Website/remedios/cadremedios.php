<?php
require_once "../topo.php";
if ($_SESSION['tipoUsuario'] == 1) {
?>
<div class="content">
<h3 id="titulo">Cadastro de Remédios</h3>
<fieldset class="form">
    <form name="form1" action="inserirremedio.php"
    method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" required><br>
    <label for="marca">Marca</label>
    <input type="marca" name="marca" required><br>
    <label for="lugar">Onde o remédio age</label>
    <input type="lugar" name="lugar" required><br>
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