<?php
    require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p>Você não tem permissão para
         executar esta página</p>";
} else {
    if ($_SESSION['tipoUsuario'] == 1) {
        if (
            isset($_POST['nome']) &&
            isset($_POST['cnpj']) && isset($_POST['operadora'])
        ) {
            $nome = $_POST['nome'];
            $cnpj = $_POST['cnpj'];
            $operadora = $_POST['operadora'];
            require_once "../conexao.php";
            try {
                //vamos inserir na tabela
                $sql = "insert into planos (nome,cnpj,operadora)
                values ('$nome','$cnpj',
                    '$operadora')";
                $query = $conexao->prepare($sql);
                $query->execute();
                $rs = $conexao->lastInsertId()
                    or die(print_r($query->errorInfo(), true));
                echo "<p>Salvo com sucesso!</p>";
                echo "<p>Ja com os dados cadastrado você pode acessar a lista de especialidades!</p><br><br>";
                echo "<a href='listarplano.php'>Lista de planos</a>";
            } catch (PDOException $i) {
                //se houver exceção, exibe
                die("Erro: <code>" . $i->getMessage() . "</code>");
            }
        } //fim do if
        else {
            echo "<h2>Preencha o <a href='cadplano.php'>
        formulário</a></p>";
        }
    }else
        echo "<p>Você não tem permissão 
        para executar esta ação.</p>";
}//fim do else da SESSION
    require_once "../rodape.php";
    ?>