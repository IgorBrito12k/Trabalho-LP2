<?php
require_once("../topo.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remédio</title>
    <style>
        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            echo "<br><h1>Bem vindo a área remédios, para onde vc gostaria de ir:</h1><br><br>";
            echo "<p>Cadastrar um remédio:</p>
            <a href='cadremedios.php'>Cadastrar</a><br><br>";
            echo "<p>Editar um remédio:</p>
            <a href='listarremedios.php'>Editar</a><br><br>";
            echo "<p>Excluir um remédio:</p>
            <a href='listarremedios.php'>Excluir</a><br><br>";
            echo "<p>Listar os remedios:</p>
            <a href='listarremedios.php'>Listar</a><br>";
        ?>
    </div>
</body>
</html>
<?php
require_once("../rodape.php");
?>

