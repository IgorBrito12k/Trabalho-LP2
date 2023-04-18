<?php
    require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p class='texto2'>Você não tem permissão para
         executar esta página</p>";
    } else {
    if ($_SESSION['tipoUsuario'] == 1) {
        //pegar o id do registro a ser editado
        if (isset($_GET['idEsp'])) {
            $var_id = $_GET['idEsp'];
            try {
                //selecionar o registro a ser editado
                require_once "../conexao.php";
                $sql = "SELECT * from especialidades where idEsp=$var_id";
                $resultado = $conexao->query($sql);
                $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dados as $linha) {
                    //mostrar o formulário com os dados do registro
?>
                        <!-- html -->
                        <div class="content">
                            <h2 id="titulo">Cadastro de especialidades</h2>
                            <form name="form1" action="atualizarespecialidade.php?idEsp=<?php echo $linha['idEsp']; ?>"
                            method="post">
                                <label for="nome">Nome</label>
                                <input type="text" name="nomeEsp" required
                                value="<?php echo $linha['nomeEsp']; ?>"><br>

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
                clique <a href='listarespecialidades.php'>aqui</a></p>";
        }
    }else
        echo "<p class='texto2'>Você não tem permissão 
        para executar esta ação.</p>";
}//fim do else da SESSION
require_once "../rodape.php";
?>