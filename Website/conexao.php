<?php

    //dados do banco
    $dbtype   = "mysql";
    $host     = "mariadb";
    $port     = "3306";
    $user     = "user";
    $password = "senha";
    $db       = "hospital";
    try
        {   //vamos conectar
            $conexao = new PDO($dbtype.":host=".$host.
            ";port=".$port.";dbname=".$db, $user, $password);
            //echo "<p>Banco de dados conectado.</p>";
        }
    catch (PDOException $i)
    {
        //se houver exceção, exibe
        echo "<h2>A casa caiu irmão!! Chama o DBA URGÊNTE!!!</h2>";
    }
?>


