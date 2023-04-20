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
        if(isset($_SESSION['nomeUsuario'])){
            echo "<br><h2>Bem vindo ala médicos, para onde vc gostaria de ir:</h2><br><br>";
            echo "<p class='texto2'>Cadastrar um médicos:</p><br>
            <a class='link2' href='cadmedico.php'>Cadastrar</a><br><br>";
            echo "<p class='texto2'>Editar um registro de um médico:</p><br>
            <a class='link2' href='listarmedico.php'>Editar</a><br><br>";
            echo "<p class='texto2'>Excluir um registro de um médico:</p><br>
            <a class='link2' href='listarmedico.php'>Excluir</a><br><br>";
            echo "<p class='texto2'>Listar os médicos:</p><br>
            <a class='link2' href='listarmedico.php'>Listar</a><br>";
        } else {
            echo "<h2>Você precisa estar logado para acessar esta função.</h2><br><br>";
            echo " <a class='link' href='login.php'>Login</a>"; 
        }
        ?>
    </div>
</body>
</html>
<?php
require_once("../rodape.php");
?>
