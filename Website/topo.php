<?php
// Inicia a sessão, se ainda não tiver sido iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style-topo.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- barra de navegação -->
        <ul>
            <li><a href="../dashboard.php">Início</a></li>
            <li><a href="../especialidade.php">Especialidades</a></li>
            <?php
            if (isset($_SESSION['Plano'])) {
                echo "<li><a href='plano.php'>Plano (".
                    $_SESSION['qtde'].")</a></li>";
            } else {
                echo "<li><a href='plano.php'>Plano</a></li>";        
            }
            echo "<li style='float:right'>";
            if(isset($_SESSION['nomeUsuario'])) {
                echo "<a class='active' href='meuPerfi.php'>".
                    $_SESSION['nomeUsuario']."</a></li>";
            } else {
                echo "<a class='active' href='login.php'>Login</a></li>";
            }
            ?>
        </ul>
    </body>
</html>