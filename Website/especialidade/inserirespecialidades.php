<?php
    require_once "../topo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            if(!isset($_SESSION['usuarioLogado']) ||
                $_SESSION['usuarioLogado']==false){
                echo "<p class='texto2'>Você não tem permissão para
                executar esta página</p>";
        } else {
            if ($_SESSION['tipoUsuario'] == 1) {
                if (isset($_POST['nome'])) {
                    $nome = $_POST['nome'];
                    require_once "../conexao.php";
                    try {
                        //vamos inserir na tabela
                        $sql = "insert into especialidades (nomeEsp)
                        VALUES (?)";
                        $query = $conexao->prepare($sql);
                        $query->execute([$nome]);
                        $rs = $conexao->lastInsertId()
                            or die(print_r($query->errorInfo(), true));
                        echo "<p class='texto2'>Salvo com sucesso!</p>";
                        echo "<p class='texto2'>Ja com os dados cadastrado você pode acessar a lista de especialidades!</p><br><br>";
                        echo "<a class='link2' href='listarespecialidades.php'>Lista de especialidades</a>";
                    } catch (PDOException $i) {
                        //se houver exceção, exibe
                        die("Erro: <code>" . $i->getMessage() . "</code>");
                    }
                } //fim do if
                else {
                    echo "<h2>Preencha o <a href='cadespecialidade.php'>
                formulário</a></p>";
                }
            }else
                echo "<p class='texto2'>Você não tem permissão 
                para executar esta ação.</p>";
        }//fim do else da SESSION
        ?>
    </div>
</body>
</html>

<?php
    require_once "../rodape.php";
    ?>