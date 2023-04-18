<?php
require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p class='texto2'>Você não tem permissão para
         executar esta página</p>";
    } else {
    if ($_SESSION['tipoUsuario'] == 1) {
        //pegar o id do registro a ser editado
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            try {
                //selecionar o registro a ser editado
                require_once "../conexao.php";
                $sql = "SELECT * from medicos where id=$id";
                $resultado = $conexao->query($sql);
                $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dados as $linha) {
                    //mostrar o formulário com os dados do registro
?>
                        <!-- html -->
                        <div class="content">
                        <h2 id="titulo">Cadastro de Medicos</h2>
                            <form name="form1" action="atualizarmedico.php?id=<?php echo $linha['id']; ?>"
                            method="post">
                                <label for="id">id:<?php echo $linha['id']; ?></label>
                                <input class='input' type="hidden" name="id" 
                                value="<?php echo $linha['id']; ?>"><br>
                                <label for="nome">Nome</label>
                                <input class='input' type="text" name="nome" required
                                value="<?php echo $linha['nome']; ?>"><br>
                                <label for="E-mail">CRM</label>
                                <input class='input' type="crm" name="crm" required
                                value="<?php echo $linha['crm']; ?>"><br>
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
                clique <a class='link2' href='listarmedicos.php'>aqui</a></p>";
        }
    }else
        echo "<p class='texto2'>Você não tem permissão 
        para executar esta ação.</p>";
}//fim do else da SESSION
require_once "../rodape.php";
?>