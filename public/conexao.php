<?php
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "usuarios");


    $conexao = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if(!$conexao){
        die("A conexão falhou");
    }

?>