<?php
require_once("../topo.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>médico</title>
    <style>
        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            echo "<br><h2>Bem vindo ala médicos, para onde vc gostaria de ir:</h2><br><br>";
            echo "<p class='texto2'>Cadastrar um médicos:</p><br>
            <a class='link2' href='cadmedicos.php'>Cadastrar</a><br><br>";
            echo "<p class='texto2'>Editar um registro de um médico:</p><br>
            <a class='link2' href='listarmedicos.php'>Editar</a><br><br>";
            echo "<p class='texto2'>Excluir um registro de um médico:</p><br>
            <a class='link2' href='listarmedicos.php'>Excluir</a><br><br>";
            echo "<p class='texto2'>Listar os médicos:</p><br>
            <a class='link2' href='listarmedicos.php'>Listar</a><br>";
        ?>
    </div>
</body>
</html>
<?php
require_once("../rodape.php");
?>
