<?php

include('assets/php/conexao.php');

function loginUsuario($email, $senha, $mysqli) {
    $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        return true;
    }
    return false;
}

function cadastrarUsuario($nome, $email, $senha, $mysqli) {
    if (empty($nome) || empty($email) || empty($senha)) {
        return false; 
    }

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