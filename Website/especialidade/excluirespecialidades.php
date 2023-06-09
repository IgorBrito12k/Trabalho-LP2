<?php
    require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p class='texto2'>Você não tem permissão para
         executar esta página</p>";
    } else {
        if ($_SESSION['tipoUsuario'] == 1) {
            if(isset($_GET['idEsp'])){
            $var_id = $_GET['idEsp'];
            require_once "../conexao.php";
            try
                {   
                    //vamos excluir da tabela
                    $sql="delete from especialidades 
                    where idEsp=$var_id";
                    $query=$conexao->prepare($sql);
                    $query->execute();
                    echo "<p class='texto2'>Excluído com sucesso!</p><br>";
                    echo "<p class='texto2'>Volte para a<a class='link2' href='listarespecialidades.php'>
                        lista de especialidades</a></p>";
                }
            catch (PDOException $i)
            {
                //se houver exceção, exibe
                die("Erro: <code>" . $i->getMessage() . "</code>");
            }
        }
        //fim do if
        else {
            echo "<p class='texto2'>Não foi possível realizar a exclusão!<br> Por favor preencha o <a href='cadespecialidade.php'>
            formulário de cadastro</a> novamente.<br><br>Ou apenas retorne para 'Especialidades' na barra superior!</p>";
        }
    }else
        echo "<p class='texto2'>Você não tem permissão 
        para executar esta ação.</p>";    
}//fim do else da SESSION
    require_once "../rodape.php";
    ?>