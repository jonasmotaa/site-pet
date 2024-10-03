<?php

include_once('assets/php/conexao.php');

function loginUsuario($email, $senha, $mysqli) {
    $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";
    $result = $mysqli->query($sql);

    if (mysqli_num_rows($result) < 1) {
        return false;
    } else {
        return true;
    }
}

function cadastrarUsuario($nome, $email, $senha, $mysqli) {
    try {

        $sql = "INSERT INTO usuario(email, nome, senha) VALUES ('$email','$nome','$senha')";
        $mysqli->query($sql);

        return true; 
    } catch (Exception $e) {

        if ($mysqli->errno == 1062) {
            return 'duplicado'; 
        } else {
            return false; 
        }
    }
}


?>