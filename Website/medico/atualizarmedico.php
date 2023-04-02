<?php
    require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p>Você não tem permissão para
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
                        echo "<p>Atualizado com sucesso!</p>";
                        echo "<p>Ja com os dados atualizados você pode acessar a lista de plano!</p><br><br>";
                        echo "<a href='listarmedico.php'>Lista de medicos</a>";
                    }
                catch (PDOException $i)
                {
                    //se houver exceção, exibe
                    die("Erro: <code>" . $i->getMessage() . "</code>");
                }
            }//fim do if
            else {
                echo "<p>Preencha o <a href='cadmedico.php'>
                formulário</a></p>";
            }
        }else
        echo "<p>Você não tem permissão 
        para executar esta ação.</p>";
    }//fim do else da SESSION
    require_once "../rodape.php";
?>