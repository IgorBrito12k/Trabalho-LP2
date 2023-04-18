<?php
    require_once "../topo.php";

?>

<?php
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p class='texto2'>Você não tem permissão para
         executar esta página</p>";
    } else {
        if ($_SESSION['tipoUsuario'] == 1) {
            echo "<h2>Planos cadastrados</h2>";
            echo "<a class='link2' href='cadplano.php'>Novo</a><br><br>";
            require_once "../conexao.php";
            $sql = "SELECT * from planos";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<hr><br>
                <p class='texto2'>id: $linha[idPlano] - idPessoa: $linha[idPessoa] -
                $linha[nome] ( $linha[cnpj] ) - $linha[operadora]
                <a class='link2' href='editarplano.php?idPlano=$linha[idPlano]'>Editar</a>
                <a class='link2' href='excluirplano.php?idPlano=$linha[idPlano]'>Excluir</a></p>";
            }
        }else if ($_SESSION['tipoUsuario'] == 3) {
            require_once "../conexao.php";
            $sql = "SELECT * from planos";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "id: $linha[idPlano] - idPessoa: $linha[idPessoa] -
                $linha[nome] ( $linha[cnpj] ) - $linha[operadora]";
            }
        } else if ($_SESSION['tipoUsuario'] == 2) {
            require_once "../conexao.php";
            $sql = "SELECT * from planos";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "id: $linha[idPlano] - idPessoa: $linha[idPessoa] -
                $linha[nome] ( $linha[cnpj] ) - $linha[operadora]";
            } 
        } else {
            echo "<p class='texto2'>Você não tem permissão 
            para executar esta ação.</p>";
        }
    }//fim do else
        require_once "../rodape.php";
?>
