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
            
            echo "<h2>Medicos cadastrados</h2>";
            echo "<a class='link2' href='cadmedico.php'>Novo</a><br><br>";
            require_once "../conexao.php";
            $sql = "SELECT * from medicos";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<hr><br>
                <p class='texto2'>id: $linha[id] - 
                $linha[nome], ( $linha[crm] )
                <a class='link2' href='editarmedico.php?id=$linha[id]'>Editar</a>
                <a class='link2' href='excluirmedico.php?id=$linha[id]'>Excluir</a></p>";
            }
        }else if ($_SESSION['tipoUsuario'] == 3) {
            require_once "../conexao.php";
            $sql = "SELECT * from medicos";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<p class='texto2'>id: $linha[id] - 
                $linha[nome], ( $linha[crm] )";
            }
        } else {
            echo "<p class='texto2'>Você não tem permissão 
            para executar esta ação.</p>";
        }
    }//fim do else
        require_once "../rodape.php";
    ?>