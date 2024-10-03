<?php

function calcularIdade($dataNascimento) {
    $dataNasc = new DateTime($dataNascimento);
    $dataAtual = new DateTime();
    $idade = $dataAtual->diff($dataNasc);
    return $idade->y;
}

function obterPets($email, $mysqli) {
    $sql = "SELECT * FROM pet WHERE dono = '$email'";
    $result = $mysqli->query($sql);
    
    $pets = [];
    if ($result) {
        while ($userdata = mysqli_fetch_assoc($result)) {
            $pets[] = $userdata;
        }
    }
    return $pets;
}

function adicionarPet($nome, $idade, $especie, $peso, $altura, $email, $mysqli) {
    $sql = "INSERT INTO pet(apelido, idade, especie, peso, altura, dono) 
            VALUES ('$nome','$idade','$especie', '$peso', '$altura', '$email')";
    
    return $mysqli->query($sql);
}
