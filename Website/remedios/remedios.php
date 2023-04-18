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
            echo "<br><h2>Bem vindo a área remédios, para onde vc gostaria de ir:</h2><br><br>";
            echo "<p class='texto2'>Cadastrar um remédio:</p><br>
            <a class='link2' href='cadremedios.php'>Cadastrar</a><br><br>";
            echo "<p class='texto2'>Editar um remédio:</p><br>
            <a class='link2' href='listarremedios.php'>Editar</a><br><br>";
            echo "<p class='texto2'>Excluir um remédio:</p><br>
            <a class='link2' href='listarremedios.php'>Excluir</a><br><br>";
            echo "<p class='texto2'>Listar os remedios:</p><br>
            <a class='link2' href='listarremedios.php'>Listar</a><br>";
        ?>
    </div>
</body>
</html>
<?php
require_once("../rodape.php");
?>

