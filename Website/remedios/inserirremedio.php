<?php
    require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p class='texto2'>Você não tem permissão para
         executar esta página</p>";
} else {
    if ($_SESSION['tipoUsuario'] == 1) {
        if (
            isset($_POST['idPessoa']) && isset($_POST['nome']) &&
            isset($_POST['marca']) && isset($_POST['lugar'])
        ) {
            $idPessoa = $_POST['idPessoa'];
            $nome = $_POST['nome'];
            $marca = $_POST['marca'];
            $lugar = $_POST['lugar'];
            require_once "../conexao.php";
            try {
                //vamos inserir na tabela
                $sql = "insert into remedios (idPessoa,nome,marca,lugar)
                values ('$idPessoa','$nome','$marca',
                    '$lugar')";
                $query = $conexao->prepare($sql);
                $query->execute();
                $rs = $conexao->lastInsertId()
                    or die(print_r($query->errorInfo(), true));
                echo "<p class='texto2'>Salvo com sucesso!</p>";
                echo "<p class='texto2'>Ja com os dados cadastrado você pode acessar a lista de planos!</p><br><br>";
                echo "<a class='link2'  href='listarremedios.php'>Lista de remédios</a>";
            } catch (PDOException $i) {
                //se houver exceção, exibe
                echo "<h2> Ocorreu um erro ao tentar acessar o banco de dados</h2>";
                echo "<p class='texto'>Verifique os dados e tente novamente!</p>";
            }
        } //fim do if
        else {
            echo "<h2>Preencha o <a class='link22' href='cadremedios.php'>
        formulário</a></p>";
        }
    }else
        echo "<p class='texto2'>Você não tem permissão 
        para executar esta ação.</p>";
}//fim do else da SESSION
    require_once "../rodape.php";
    ?>