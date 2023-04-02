<?php
require_once("../topo.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plano</title>
    <style>
        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            echo "<br><h1>Bem vindo a planos, para onde vc gostaria de ir:</h1><br><br>";
            echo "<p>Cadastrar uma plano:</p>
            <a href='cadplano.php'>Cadastrar</a><br><br>";
            echo "<p>Editar um plano:</p>
            <a href='listarplano.php'>Editar</a><br><br>";
            echo "<p>Excluir um plano:</p>
            <a href='listarplano.php'>Excluir</a><br><br>";
            echo "<p>Listar os planos:</p>
            <a href='listarplano.php'>Listar</a><br>";
        ?>
    </div>
</body>
</html>
<?php
require_once("../rodape.php");
?>

