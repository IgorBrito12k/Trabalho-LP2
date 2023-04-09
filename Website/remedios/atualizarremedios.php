<?php
    require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p>Você não tem permissão para
         executar esta página</p>";
    } else {
        if ($_SESSION['tipoUsuario'] == 1) {
            if(isset($_POST['nome']) &&
            isset($_POST['marca']) && isset($_POST['lugar'])){
                $nome = $_POST['nome']; 
                $marca = $_POST['marca']; 
                $id = $_GET['idRemedio'];
                $lugar = $_POST['lugar']; 
                require_once "../conexao.php";
                try
                    {   
                        //vamos atualizar na tabela
                        $sql="update remedios set nome='$nome',
                        marca='$marca',lugar='$lugar' 
                        where idRemedio=$id";
                        $query=$conexao->prepare($sql);
                        $query->execute();
                        echo "<p>Atualizado com sucesso!</p>";
                        echo "<p>Ja com os dados cadastrado você pode acessar a lista de remédios!</p><br><br>";
                        echo "<a href='listarremedios.php'>Lista de remédios</a>";
                    }
                catch (PDOException $i)
                {
                    //se houver exceção, exibe
                    die("Erro: <code>" . $i->getMessage() . "</code>");
                }
            }//fim do if
            else {
                echo "<p>Preencha o <a href='cadremedios.php'>
                formulário</a></p>";
            }
        }else
        echo "<p>Você não tem permissão 
        para executar esta ação.</p>";
    }//fim do else da SESSION
    require_once "../rodape.php";
?>