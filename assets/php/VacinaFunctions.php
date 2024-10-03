<?php

include_once('assets/php/conexao.php');

class VacinaFunctions {
    public function verificarSessao($session) {
        return isset($session['email']) && isset($session['senha']);
    }
    
    public function buscarPetsDoUsuario($email, $mysqli) {
        $sql = "SELECT apelido FROM pet WHERE dono = '$email'";
        $result = $mysqli->query($sql);
        return $result;
    }
    
    public function registrarVacina($dados, $email, $mysqli) {
        if (empty($dados['nome']) || empty($dados['descricao']) || empty($dados['data']) || empty($dados['vencimento']) || empty($dados['pet'])) {
            return false;
        }
    
        $nome = $dados['nome'];
        $descricao = $dados['descricao'];
        $data = $dados['data'];
        $vencimento = $dados['vencimento'];
        $pet = $dados['pet'];
    
        $idsql = "SELECT id FROM pet WHERE apelido = '$pet' AND dono = '$email'";
        $ids = $mysqli->query($idsql);
        if ($ids->num_rows == 0) {
            return false;
        }
        $row = $ids->fetch_assoc();
        $id = $row['id'];
    
        $query = "INSERT INTO vacina(nomevacina, descricao, data, vencimento, id) VALUES ('$nome','$descricao','$data','$vencimento', '$id')";
        return $mysqli->query($query);
    }
    
    public function carregarVacinasDoUsuario($email, $mysqli) {
        $sql = "SELECT vacina.nomevacina, vacina.descricao, vacina.data, vacina.vencimento, pet.apelido 
                FROM vacina 
                JOIN pet ON vacina.id = pet.id 
                WHERE pet.dono = '$email' 
                ORDER BY pet.apelido";
        return $mysqli->query($sql);
    }
}



?>
