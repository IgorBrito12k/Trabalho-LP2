<?php
    require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p class='texto2'>Você não tem permissão para
         executar esta página</p>";
    } else {
        if ($_SESSION['tipoUsuario'] == 1) {
            if(isset($_POST['nome']) &&
            isset($_POST['crm'])){
                $id = $_GET['id'];
                $nome = $_POST['nome']; 
                $crm = $_POST['crm']; 
                require_once "../conexao.php";
                try
                    {   
                        //vamos atualizar na tabela
                        $sql="update medicos set nome='$nome',
                        crm='$crm' 
                        where id=$id";
                        $query=$conexao->prepare($sql);
                        $query->execute();
                        echo "<p class='texto2'>Atualizado com sucesso!</p>";
                        echo "<p class='texto2'>Ja com os dados atualizados você pode acessar a lista de médico!</p><br><br>";
                        echo "<a class='link2' href='listarmedico.php'>Lista de médicos</a>";
                    }
                catch (PDOException $i)
                {
                    //se houver exceção, exibe
                    die("Erro: <code>" . $i->getMessage() . "</code>");
                }
            }//fim do if
            else {
                echo "<p class='texto2'>Preencha o <a href='cadmedico.php'>
                formulário</a></p>";
            }
        }else
        echo "<p class='texto2'>Você não tem permissão 
        para executar esta ação.</p>";
    }//fim do else da SESSION
    require_once "../rodape.php";
?>