<?php
// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "", "site-pet");

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Iniciar a sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['email'])) {
    header('Location: login.php'); // redirecionar se não estiver logado
    exit();
}

// Pegar o ID do usuário
$email = $conn->real_escape_string($_SESSION['email']);
$user_result = $conn->query("SELECT id FROM usuario WHERE email = '$email'");

if ($user_result && $user_result->num_rows > 0) {
    $user_row = $user_result->fetch_assoc();
    $user_id = $user_row['id']; // Armazena o ID do usuário

    // Verificar se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['topics'])) {
        // Sanitizar e processar os tópicos selecionados
        foreach ($_POST['topics'] as $topic_id) {
            $topic_id = (int)$topic_id; // Convertendo para inteiro para segurança

            // Verificar se a inscrição já existe
            $check_stmt = $conn->prepare("SELECT * FROM subscriptions WHERE user_id = ? AND topic_id = ?");
            $check_stmt->bind_param("ii", $user_id, $topic_id);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            // Se não existir, inscreve-se no tópico
            if ($check_result->num_rows == 0) {
                // Inserir a inscrição no banco de dados
                $stmt = $conn->prepare("INSERT INTO subscriptions (user_id, topic_id) VALUES (?, ?)");
                $stmt->bind_param("ii", $user_id, $topic_id);

                if (!$stmt->execute()) {
                    echo "Erro ao se inscrever no tópico ID $topic_id: " . $stmt->error;
                }
            } else {
                echo "Você já está inscrito no tópico ID $topic_id.<br>";
            }

            // Fechar a declaração de verificação
            $check_stmt->close();
        }

        echo "Processo de inscrição concluído!";
    } else {
        echo "Nenhum tópico selecionado.";
    }
} else {
    echo "Usuário não encontrado.";
}

$conn->close();
sleep(5);
header('Location: admin-messages.php');
?>
