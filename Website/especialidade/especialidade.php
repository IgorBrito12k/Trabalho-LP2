<?php
require_once("../topo.php");
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
            echo "<br><h1>bem vindo a especialidades, para onde vc gostaria de ir:</h1><br><br>";
            echo "<p>Cadastrar uma especialidade:</p>
            <a href='cadespecialidade.php'>Cadastrar</a><br><br>";
            echo "<p>Editar uma especialidade:</p>
            <a href='editarespecialidade.php'>Editar</a><br><br>";
            echo "<p>Excluir uma especialidade:</p>
            <a href='excluirespecialidades.php'>Excluir</a><br><br>";
            echo "<p>Listar as especialidade:</p>
            <a href='listarespecialidades.php'>Listar</a><br>";
        ?>
    </div>
</body>
</html>
<?php
require_once("../rodape.php");
?>

