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
            echo "<br><h1>bem vindo ala médicos, para onde vc gostaria de ir:</h1><br><br>";
            echo "<p>Cadastrar um médicos:</p>
            <a href='cadmedicos.php'>Cadastrar</a><br><br>";
            echo "<p>Editar um registro de um médico:</p>
            <a href='listarmedicos.php'>Editar</a><br><br>";
            echo "<p>Excluir um registro de um médico:</p>
            <a href='listarmedicos.php'>Excluir</a><br><br>";
            echo "<p>Listar os médicos:</p>
            <a href='listarmedicos.php'>Listar</a><br>";
        ?>
    </div>
</body>
</html>
<?php
require_once("../rodape.php");
?>
