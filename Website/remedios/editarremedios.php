<?php
require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p class='texto2'>Você não tem permissão para
         executar esta página</p>";
    } else {
    if ($_SESSION['tipoUsuario'] == 1) {
        //pegar o id do registro a ser editado
        if (isset($_GET['idRemedio'])) {
            $id = $_GET['idRemedio'];
            try {
                //selecionar o registro a ser editado
                require_once "../conexao.php";
                $sql = "SELECT * from remedios where idRemedio=$id";
                $resultado = $conexao->query($sql);
                $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dados as $linha) {
                    //mostrar o formulário com os dados do registro
?>
                        <!-- html -->
                        <div class="content">
                        <h2 id="titulo">Cadastro de Planos</h2>
                        <form name="form1" action="atualizarremedios.php?idRemedio=<?php echo $linha['idRemedio']; ?>"
                        method="post">
                        <label for="idRemedio">id:<?php echo $linha['idRemedio']; ?></label>
                        <input class='input' type="hidden" name="idRemedio" 
                        value="<?php echo $linha['idRemedio']; ?>"><br>
                        <label for="idPessoa">ID Pessoa</label>
                        <input class='input' type="text" name="idPessoa" required
                        value="<?php echo $linha['nome']; ?>"><br>
                        <label for="nome">Nome</label>
                        <input class='input' type="text" name="nome" required
                        value="<?php echo $linha['nome']; ?>"><br>
                        <label for="marca">Marca</label>
                        <input class='input' type="marca" name="marca" required
                        value="<?php echo $linha['marca']; ?>"><br>
                        <label for="lugar">lugar</label>
                        <input class='input' type="lugar" name="lugar" required
                        value="<?php echo $linha['lugar']; ?>"><br>
                        
                        <input class='link2' type="submit" value="Cadastrar">
                        </form>
                        </div>
                        <?php
                }
            } catch (Exception $erro) {
                die("Erro: <code>" . $erro->getMessage() . "</code>");
            }
        } else {
            echo "<p class='texto2'>Selecione um registro,
                clique <a class='link2' href='listarremedios.php'>aqui</a></p>";
        }
    }else
        echo "<p class='texto2'>Você não tem permissão 
        para executar esta ação.</p>";
}//fim do else da SESSION
require_once "../rodape.php";
?>