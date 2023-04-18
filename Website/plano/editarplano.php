<?php
require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p class='texto2'>Você não tem permissão para
         executar esta página</p>";
    } else {
    if ($_SESSION['tipoUsuario'] == 1) {
        //pegar o id do registro a ser editado
        if (isset($_GET['idPlano'])) {
            $id = $_GET['idPlano'];
            try {
                //selecionar o registro a ser editado
                require_once "../conexao.php";
                $sql = "SELECT * from planos where idPlano=$id";
                $resultado = $conexao->query($sql);
                $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dados as $linha) {
                    //mostrar o formulário com os dados do registro
?>
                        <!-- html -->
                        <div class="content">
                            <h2 id="titulo">Cadastro de Planos</h2>
                                <form name="form1" action="atualizarplano.php?idPlano=<?php echo $linha['idPlano']; ?>"
                                method="post">
                                    <label for="idPlano">id:<?php echo $linha['idPlano']; ?></label>
                                    <input class="input" type="hidden" name="idPlano" 
                                    value="<?php echo $linha['idPlano']; ?>"><br>
                                    <label for="idPessoa">ID Pessoa</label>
                                    <input class="input" type="text" name="idPessoa" required
                                    value="<?php echo $linha['nome']; ?>"><br>
                                    <label for="nome">Nome</label>
                                    <input class="input" type="text" name="nome" required
                                    value="<?php echo $linha['nome']; ?>"><br>
                                    <label for="cnpj">CNPJ</label>
                                    <input class="input" type="cnpj" name="cnpj" required
                                    value="<?php echo $linha['cnpj']; ?>"><br>
                                    <label for="operadora">Operadora</label>
                                    <input class="input" type="operadora" name="operadora" required
                                    value="<?php echo $linha['operadora']; ?>"><br>
                                    
                                    <input class="link2" type="submit" value="Cadastrar">
                                </form>
                        </div>
                        <?php
                }
            } catch (Exception $erro) {
                die("Erro: <code>" . $erro->getMessage() . "</code>");
            }
        } else {
            echo "<p class='texto2'>Selecione um registro,
                clique <a href='listarplano.php'>aqui</a></p>";
        }
    }else
        echo "<p class='texto2'>Você não tem permissão 
        para executar esta ação.</p>";
}//fim do else da SESSION
require_once "../rodape.php";
?>