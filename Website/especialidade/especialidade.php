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
            echo "<br><h2>Bem vindo a especialidades, para onde vc gostaria de ir:</h2><br>";
            echo "<p class='texto2'>Cadastrar uma especialidade:</p><br>
            <a class='link2' href='cadespecialidade.php'>Cadastrar</a><br><br>";
            echo "<p class='texto2'>Editar uma especialidade:</p><br>
            <a class='link2' href='listarespecialidades.php'>Editar</a><br><br>";
            echo "<p class='texto2'>Excluir uma especialidade:</p><br>
            <a class='link2' href='listarespecialidades.php'>Excluir</a><br><br>";
            echo "<p class='texto2'>Listar as especialidade:</p><br>
            <a class='link2' href='listarespecialidades.php'>Listar</a><br>";
        ?>
    </div>
</body>
</html>
<?php
require_once("../rodape.php");
?>

