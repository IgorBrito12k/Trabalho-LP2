<?php
    require_once "../topo.php";
    if (isset($_SESSION['idUsuario'])) {
        echo "<h2>Minha especialidade</h2><br><br>";
        require_once "../conexao.php";
        $sql = "SELECT * from especialidades where idPessoa=".$_SESSION['idUsuario'];
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $linha) {  //pega cada registro do array para mostrar na tela
            echo "<hr><br>
            <p class='texto2'>$linha[nomeEsp] - idPessoa: $linha[idPessoa] -
            <a class='link2' href='editarespecialidade.php?idEsp=$linha[idEsp]'>Editar</a>
            <a class='link2' href='excluirespecialidades.php?idEsp=$linha[idEsp]'>Excluir</a></p>";
        }
    }else
    echo "<p>Você não tem permissão 
    para executar esta ação.</p>";
    require_once "../rodape.php";
?>
