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
            
            echo "<h2>Especialidades cadastradas</h2>";
            echo "<a class='link2' href='cadespecialidade.php'>Novo</a><br><br>";
            require_once "../conexao.php";
            $sql = "SELECT * from especialidades";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<hr><br>
                <p class='texto2'>$linha[nomeEsp] - idPessoa: $linha[idPessoa] -
                <a class='link2' href='editarespecialidade.php?idEsp=$linha[idEsp]'>Editar</a>
                <a class='link2' href='excluirespecialidades.php?idEsp=$linha[idEsp]'>Excluir</a></p>";
            }
        }else if ($_SESSION['tipoUsuario'] == 2) {
            require_once "../conexao.php";
            $sql = "SELECT * from planos";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<p class='texto2'>id: $linha[idPlano] - idPessoa: $linha[idPessoa] -
                $linha[nome] ( $linha[cnpj] ) - $linha[operadora]
                <a class='link2' href='editarplano.php?idPlano=$linha[idPlano]'>Editar</a>";
            } 
        } else {
            echo "<p class='texto2'>Você não tem permissão 
            para executar esta ação.</p>";
        }

    }//fim do else
        require_once "../rodape.php";
    ?>