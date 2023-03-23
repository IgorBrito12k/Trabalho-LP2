<?php
    require_once "../topo.php";
?>
    <a href="cadespecialidade.php">Novo</a><br>
    <h2>Especialidades cadastrados</h2>
    <?php
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p>Você não tem permissão para
         executar esta página</p>";
    } else {
        if ($_SESSION['tipoUsuario'] == 1) {
            require_once "../conexao.php";
            $sql = "SELECT * from especialidades";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<p>$linha[nomeEsp] -
                <a href='editarespecialidade.php?idEsp=$linha[idEsp]'>Editar</a>
                <a href='excluirespecialidades.php?idEsp=$linha[idEsp]'>Excluir</a></p>";
            }
        }else
        echo "<p>Você não tem permissão 
        para executar esta ação.</p>";
    }//fim do else
        require_once "../rodape.php";
    ?>