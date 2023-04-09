<?php
    require_once "../topo.php";

?>
    <a href="cadremedios.php">Novo</a><br>
    <h2>Remedios cadastrados</h2>
    <?php
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p>Você não tem permissão para
         executar esta página</p>";
    } else {
        if ($_SESSION['tipoUsuario'] == 1) {
            require_once "../conexao.php";
            $sql = "SELECT * from remedios";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<p>id: $linha[idRemedio] - 
                $linha[nome] ( $linha[marca] ) - $linha[lugar]
                <a href='editarremedios.php?idRemedio=$linha[idRemedio]'>Editar</a>
                <a href='excluirremedios.php?idRemedio=$linha[idRemedio]'>Excluir</a></p>";
            }
        }else if ($_SESSION['tipoUsuario'] == 3) {
            require_once "../conexao.php";
            $sql = "SELECT * from remedios";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<p>id: $linha[idRemedio] - 
                $linha[nome] ( $linha[marca] ) - $linha[lugar]";
            }
        } else if ($_SESSION['tipoUsuario'] == 2) {
            require_once "../conexao.php";
            $sql = "SELECT * from remedios";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<p>id: $linha[idRemedio] - 
                $linha[nome] ( $linha[marca] ) - $linha[lugar]";
            } 
        } else {
            echo "<p>Você não tem permissão 
            para executar esta ação.</p>";
        }
    }//fim do else
        require_once "../rodape.php";
    ?>
