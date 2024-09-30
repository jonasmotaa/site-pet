<?php
    $hostname = "localhost";
    $bancodedados = "site-pet";
    $usuario = "root";
    $senha = "";

    $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if($mysqli->connect_errno){
        echo "Falha ao conectar ao banco de dados:(". $mysqli->connect_errno . ")" . $mysqli->connect_errno;
    }

?>