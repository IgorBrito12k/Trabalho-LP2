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
            if(isset($_SESSION['nomeUsuario'])){ 
                echo "<br><h2>Bem vindo a planos, para onde vc gostaria de ir:</h2><br><br>";
                echo "<p class='texto2'>Cadastrar uma plano:</p><br>
                <a class='link2' href='cadplano.php'>Cadastrar</a><br><br>";
                echo "<p class='texto2'>Editar um plano:</p><br>
                <a class='link2' href='listarplano.php'>Editar</a><br><br>";
                echo "<p class='texto2'>Excluir um plano:</p><br>
                <a class='link2' href='listarplano.php'>Excluir</a><br><br>";
                echo "<p class='texto2'>Listar os planos:</p><br>
                <a class='link2' href='listarplano.php'>Listar</a><br>";
            } else {
                echo "<h2>Você precisa estar logado para acessar esta função.</h2><br><br>";
                echo " <a class='link' href='../login.php'>Login</a>"; 
            }
        ?>
    </div>
</body>
</html>
<?php
require_once("../rodape.php");
?>

