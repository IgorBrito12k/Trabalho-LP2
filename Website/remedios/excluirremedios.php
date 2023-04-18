<?php
    require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p class='texto2'>Você não tem permissão para
         executar esta página</p>";
    } else {
        if ($_SESSION['tipoUsuario'] == 1) {
        if(isset($_GET['idRemedio'])){
        $id = $_GET['idRemedio'];
        require_once "../conexao.php";
        try
            {   
                //vamos excluir da tabela
                $sql="delete from remedios 
                where idRemedio=$id";
                $query=$conexao->prepare($sql);
                $query->execute();
                echo "<p class='texto2'>Excluído com sucesso!</p>";
                echo "<p class='texto2'>Volte para a <a class='link2' href='listarremedios.php'>
                    lista de remédios</a></p>";
            }
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }
    //fim do if
    else {
        echo "<h2>Preencha o <a class='link2' href='cadremedios.php'>
        formulário</a></p>";
    }
    }else
    echo "<p class='texto2'>Você não tem permissão 
    para executar esta ação.</p>";    
}//fim do else da SESSION
    require_once "../rodape.php";
    ?>