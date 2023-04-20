<?php
require_once("topo.php");
?>
<!DOCTYPE html>
<html lang="pt-pb">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar login</title>
    <style>
    .container {
        text-align: center;
    }
    </style>
</head>
<body>
    <div class="container">
    <?
        //verificar se digitou e-mail e senha
        if (isset($_POST['email']) && isset($_POST['senha'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            //verificar se existe no banco de dados
            $sql = "SELECT * FROM pessoas
            where email='$email' and senha='$senha'";
            require_once("conexao.php");
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

            // se encontrou o registro, não exibe mensagem de erro
            $encontrouRegistro = true;

            foreach ($dados as $linha) {
                //se existir, define as variáveis de sessão e redireciona para a dashboard
                $_SESSION['usuarioLogado'] = true;
                $_SESSION['idUsuario'] = $linha['id'];
                $_SESSION['nomeUsuario'] = $linha['nome'];
                $_SESSION['tipoUsuario'] = $linha['tipo'];

                echo "<h2>Login validado</h2><br>";
                echo "<p class='texto'>Siga para a sua dashboard clicando em no
                'Inicio' na barra superior ou abaixo:</p><br>";
                echo "<a class='link' href='dashboard.php'>Dashboard</a>";
            }

            if (!$encontrouRegistro) {
                // se não existir, exibe mensagem de erro
                echo "<p class='texto'>E-mail ou senha inválidos.</p>";
            }
        }
    ?>
</div>

</body>
</html>
<?php
require_once("rodape.php");
?>