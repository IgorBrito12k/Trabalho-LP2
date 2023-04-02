<?php
    require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p>Você não tem permissão para
         executar esta página</p>";
    } else {
        if ($_SESSION['tipoUsuario'] == 1) {
            if(isset($_POST['nomeEsp'])){
                $var_nome = $_POST['nomeEsp']; 
                $var_id = $_GET['idEsp']; // Captura o valor do id da URL
                require_once "../conexao.php";
                try
                    {   
                        //vamos atualizar na tabela
                        $sql="UPDATE especialidades set nomeEsp='$var_nome'
                        WHERE idEsp='$var_id'";
                        $query=$conexao->prepare($sql);
                        $query->execute();
                        echo "<p>Atualizado com sucesso!</p>";
                        echo "<p>Ja com os dados atualizados você pode acessar a lista de especialidades!</p><br><br>";
                        echo "<a href='listarespecialidades.php'>Lista de especialidades</a>";
                    }
                catch (PDOException $i)
                {
                    //se houver exceção, exibe
                    die("Erro: <code>" . $i->getMessage() . "</code>");
                }
            }//fim do if
            else {
                echo "<p>Não foi possível realizar a atualização!<br> Por favor preencha o <a href='cadespecialidade.php'>
                formulário de cadastro</a> novamente.<br><br>Ou apenas retorne para 'Especialidades' na barra superior!</p>";
            }
        }else
        echo "<p>Você não tem permissão 
        para executar esta ação.</p>";
    }//fim do else da SESSION
    require_once "../rodape.php";
?>