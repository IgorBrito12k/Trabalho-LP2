<?php
    require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p>Você não tem permissão para
         executar esta página</p>";
    } else {
        if ($_SESSION['tipoUsuario'] == 1) {
        if(isset($_GET['idPlano'])){
        $id = $_GET['idPlano'];
        require_once "../conexao.php";
        try
            {   
                //vamos excluir da tabela
                $sql="delete from planos 
                where idPlano=$id";
                $query=$conexao->prepare($sql);
                $query->execute();
                echo "<p>Excluído com sucesso!</p>";
                echo "<p>Volte para a <a href='listarplano.php'>
                    lista de planos</a></p>";
            }
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }
    //fim do if
    else {
        echo "<h2>Preencha o <a href='cadplanos.php'>
        formulário</a></p>";
    }
    }else
    echo "<p>Você não tem permissão 
    para executar esta ação.</p>";    
}//fim do else da SESSION
    require_once "../rodape.php";
    ?>