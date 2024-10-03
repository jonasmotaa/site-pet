<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PetCare</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Vendor CSS (Icon Font) -->


    <link rel="stylesheet" href="assets/css/vendor/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/themify-icons-min.css" />



    <!-- Plugins CSS (All Plugins Files) -->



    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/aos.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css" />



    <!-- Main Style CSS -->


    <link rel="stylesheet" href="assets/css/style.css" />



    <!-- Use the minified version files listed below for better performance and remove the files listed above -->


    <!-- 
<link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
<link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">  
-->

</head>

<body>

<?php
// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "", "site-pet");

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php'); // se nao existir sessao, retorna para login.php

}

?>

<form method="POST" action="add_message.php">
    <label for="topic">Select Topic:</label>
    <select name="topico">
        <?php
        // Buscar todos os tópicos do banco de dados
        $result = $conn->query("SELECT * FROM topics");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option type='checkbox' name='topics[]' value='" . $row['id'] . "'> " . $row['nome'] . "";
            }
        } else {
            echo "Nenhum tópico encontrado.";
        }
        ?>
    </select>
    <br>
    <label for="titulo">Titulo:</label>
    <input type="text" name="titulo" required>
    <br>
    <label for="conteudo">Conteudo:</label>
    <textarea name="conteudo" required></textarea>
    <br>
    <button type="submit">Adicionar Mensagem</button>
</form>

<form method="POST" action="subscribe.php">
    <label>Selecione os tópicos que você quer seguir:</label><br>
    <?php
    $result = $conn->query("SELECT * FROM topics");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<input type='checkbox' name='topics[]' value='" . $row['id'] . "'> " . $row['nome'] . "<br>";
        }
    } else {
        echo "Nenhum tópico encontrado.";
    }
    ?>
    <button type="submit">Inscrever-se</button>
</form>

<?php
// Pegar os tópicos que o usuário está inscrito
$email = $conn->real_escape_string($_SESSION['email']);
$user_result = $conn->query("SELECT id FROM usuario WHERE email = '$email'");
if ($user_result && $user_result->num_rows > 0) {
    $user_row = $user_result->fetch_assoc();
        $user_id = $user_row['id']; // Armazena o ID do usuário
        
        // Passo 2: Usar o ID do usuário para buscar os topic_id na tabela subscriptions
        $user_topics = $conn->query("SELECT topic_id FROM subscriptions WHERE user_id = $user_id");
        $topic_ids = array();

        if ($user_topics && $user_topics->num_rows > 0) {
            
            while ($row = $user_topics->fetch_assoc()) {
                $topic_ids[] = $row['topic_id'];
            }
        } else {
            echo "Nenhum tópico encontrado para este usuário.";
        }
        
       
} else {
    echo "Usuário não encontrado.";
}
if (!empty($topic_ids)) {
    // Buscar mensagens com base nos tópicos
    $topic_ids_str = implode(",", $topic_ids);
    $topics_result = $conn->query("SELECT nome FROM topics WHERE id IN ($topic_ids_str)");

    $topic_names = array();
    if ($topics_result && $topics_result->num_rows > 0) {
        while ($row = $topics_result->fetch_assoc()) {
            $topic_names[] = $row['nome'];
        }
    }

    if (!empty($topic_names)) {
        // Agora usar os nomes dos tópicos para pegar as mensagens
        $topic_names_str = "'" . implode("','", $topic_names) . "'"; // Formatar para a consulta SQL
        $messages = $conn->query("SELECT * FROM messages WHERE topico IN ($topic_names_str)");

        if ($messages && $messages->num_rows > 0) {
            while ($message = $messages->fetch_assoc()) {
                echo "<a href='message.php?id=" . $message['id'] . "'>" . htmlspecialchars($message['titulo']) . "</a><br>";
            }
        } else {
            echo "Nenhuma mensagem encontrada para os tópicos selecionados.";
        }
    } else {
        echo "Nenhum tópico encontrado.";
    }
} else {
    echo "<br>Você não está inscrito em nenhum tópico.";
}

?>

<script src="assets/js/main.js"></script>
</body>

</html>