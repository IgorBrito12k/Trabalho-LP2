<?php
    require_once "../topo.php";
    if (isset($_SESSION['idUsuario'])) {
        echo "<h2>Meus planos</h2><br><br>";
        require_once "../conexao.php";
        $sql = "SELECT * from planos where idPessoa=".$_SESSION['idUsuario'];
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $linha) {  //pega cada registro do array para mostrar na tela
            echo "<hr><br>
            <p class='texto2'>id: $linha[idPlano] - 
            $linha[nome] ( $linha[cnpj] ) - $linha[operadora]
            <a class='link2' href='editarplano.php?idPlano=$linha[idPlano]'>Editar</a>
            <a class='link2' href='excluirplano.php?idPlano=$linha[idPlano]'>Excluir</a></p>";
        }
    }else
    echo "<p class='texto2'>Você não tem permissão 
    para executar esta ação.</p>";
    require_once "../rodape.php";
?>
