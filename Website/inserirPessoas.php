
<?php
require_once("topo.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processamento</title>
    <style>
        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include_once("conexao.php");

            $nome = filter_input(INPUT_POST, 'name');
            $nasc = filter_input(INPUT_POST, 'nasc');
            $cpf = filter_input(INPUT_POST, 'cpf');
            $celular = filter_input(INPUT_POST, 'fone');
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $tipo = filter_input(INPUT_POST, 'tipo');
            $senha = filter_input(INPUT_POST, 'senhaConfirmada');

            echo "<h2>Meus dados cadastrados:</h2>";
            echo "<p class='texto'>Nome: $nome </p>";
            echo "<p class='texto'>Data de nascimento: $nasc </p>";
            echo "<p class='texto'>Cpf: $cpf </p>";
            echo "<p class='texto'>Celular: $celular </p>";
            echo "<p class='texto'>Email: $email </p>";
            echo "<p class='texto'>Tipo: $tipo </p>";
            echo "<p class='texto'>Senha: $senha </p>";

            try {
                $sql = "insert into pessoas (nome, nasc, cpf, celular, email, tipo, senha) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $query = $conexao->prepare($sql);
                    $query->execute([$nome, $nasc, $cpf, $celular, $email, $tipo, $senha]);
                    $rs = $conexao->lastInsertId()
                        or die(print_r($query->errorInfo(), true));
                    echo "<p class='texto'>Salvo com sucesso!</p><br><br>";
                    echo "<p class='texto'>Ja com os dados cadastrado você pode clicar em login e acessar sua conta!</p><br><br>";
                    echo "<a class='link'href='login.php'>Login</a>";
                } catch (PDOException $i) {
                    //se houver exceção, exibe
                    die("Erro: <code>" . $i->getMessage() . "</code>");
                }
        ?>

    </div>

</body>
</html>
<?php
require_once("rodape.php");
?>
