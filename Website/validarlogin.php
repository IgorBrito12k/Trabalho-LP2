<?php
require_once("topo.php");

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

     foreach ($dados as $linha) {
         //se existir, define as variáveis de sessão e redireciona para a dashboard
         $_SESSION['usuarioLogado'] = true;
         $_SESSION['idUsuario'] = $linha['id'];
         $_SESSION['nomeUsuario'] = $linha['nome'];
         $_SESSION['tipoUsuario'] = $linha['tipo'];

         // se encontrou o registro, não exibe mensagem de erro
         $encontrouRegistro = true;

        echo "<h1>Login validado</h1><br>";
        echo "<p>Siga para a sua dashboard clicando em no
        'Inicio' na barra superior ou abaixo:</p><br>";
        echo "<a href='dashboard.php'>Dashboard</a>";
    }

     if (!$encontrouRegistro) {
        // se não existir, exibe mensagem de erro
        echo "E-mail ou senha inválidos.";
    }
}
require_once("rodape.php");
?>