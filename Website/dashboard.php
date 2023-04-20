<?php
    require_once("topo.php");
?>
<?php
    if(isset($_SESSION['nomeUsuario'])){ 
        //echo "<h1>Esta é a dashboard</h1>";
        echo "<h2>Sistema de Hospital</h2>"; 
            
        if (isset($_SESSION['nomeUsuario'])) {
            //tipo = 1 - administrador (pode acessar tudo)
            //tipo = 2 - Médico (acessa e altera o Plano e especialidades, mas não exclui)
            //tipo = 3 - Paciente (acessa Plano e médico, mas não exclui)
            echo "<p class='texto'>Você está logado como " .
                $_SESSION['nomeUsuario'] . "</p><br>";
            echo "<p class='texto'>Em qual setor você gostaria de ir?</p><br><br>";
            if ($_SESSION['tipoUsuario'] == 1) {
                echo " <a class='link' href='medico/listarmedico.php'>Medico</a>";
                echo " <a class='link' href='plano/listarplano.php'>Plano</a>";
                echo " <a class='link' href='./especialidade/listarespecialidades.php'>Especialidade</a>";
                echo " <a class='link' href='./remedios/listarremedios.php'>Remédios</a><br><br>";
                echo "<a class='link' href='../perfil/meuPerfil.php'>Meu Perfil</a>";
            }
            
            if ($_SESSION['tipoUsuario'] == 2) {
                echo " <a class='link' href='../plano/listarplano.php'>Planos </a>";
                echo "<a class='link' href='./especialidade/listarespecialidades.php'>Especialidade</a><br><br>";
                echo "<a class='link' href='../perfil/meuPerfil.php'>Especialidade</a>";
            }
            if ($_SESSION['tipoUsuario'] == 3) {
                echo " <a class='link' href='../plano/listarplano.php'>Planos</a>";
                echo " <a class='link' href='medico/listarmedico.php'>Medico</a>";
            }
        } 

    } else {
        echo "<p class='texto'>Você precisa estar logado para acessar esta função.</p><br><br>";
        echo " <a class='link' href='login.php'>Login</a>"; 
    }
?>

        

<?php
require_once("rodape.php");
?>