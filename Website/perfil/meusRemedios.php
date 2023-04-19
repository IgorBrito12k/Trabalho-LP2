<?php
    require_once "../topo.php";
    if (isset($_SESSION['idUsuario'])) {
        echo "<h2>Meus Remédios</h2><br><br>";
        require_once "../conexao.php";
        $sql = "SELECT * from remedios where idPessoa=".$_SESSION['idUsuario'];
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $linha) {  //pega cada registro do array para mostrar na tela
            echo "<hr><br>
            <p>id: $linha[idRemedio] - idPessoa: $linha[idPessoa] -
            $linha[nome] ( $linha[marca] ) - $linha[lugar]
            <a href='editarremedios.php?idRemedio=$linha[idRemedio]'>Editar</a>
            <a href='excluirremedios.php?idRemedio=$linha[idRemedio]'>Excluir</a></p>";
        }
    }else
    echo "<p>Você não tem permissão 
    para executar esta ação.</p>";
    require_once "../rodape.php";
?>
