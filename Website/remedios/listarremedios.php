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

            echo "<h2>Remedios cadastrados</h2>";
            echo "<a class='link2' href='cadremedios.php'>Novo</a><br><br>";
            require_once "../conexao.php";
            $sql = "SELECT * from remedios";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<hr><br>
                <p class='texto2'>id: $linha[idRemedio] - idPessoa: $linha[idPessoa] -
                $linha[nome] ( $linha[marca] ) - $linha[lugar]
                <a class='link2' href='editarremedios.php?idRemedio=$linha[idRemedio]'>Editar</a>
                <a class='link2' href='excluirremedios.php?idRemedio=$linha[idRemedio]'>Excluir</a></p>";
            }
        }else if ($_SESSION['tipoUsuario'] == 3) {
            require_once "../conexao.php";
            $sql = "SELECT * from remedios";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<hr><br>
                <p class='texto2'>id: $linha[idRemedio] - idPessoa: $linha[idPessoa] -
                $linha[nome] ( $linha[marca] ) - $linha[lugar]";
            }
        } else if ($_SESSION['tipoUsuario'] == 2) {
            require_once "../conexao.php";
            $sql = "SELECT * from remedios";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<hr><br>
                <p class='texto2'>id: $linha[idRemedio] - idPessoa: $linha[idPessoa] - 
                $linha[nome] ( $linha[marca] ) - $linha[lugar]";
            } 
        } else {
            echo "<p class='texto2'>Você não tem permissão 
            para executar esta ação.</p>";
        }
    }//fim do else
        require_once "../rodape.php";
    ?>
