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

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate inputs
    $topic_id = isset($_POST['topico']) ? $_POST['topico'] : null; 
    $titulo = $conn->real_escape_string(trim($_POST['titulo']));
    $conteudo = $conn->real_escape_string(trim($_POST['conteudo']));

    // Verificar se todos os campos estão preenchidos
    if ($topic_id > 0 && !empty($titulo) && !empty($conteudo)) {
        // Inserir a mensagem no banco de dados
        $stmt = $conn->prepare("INSERT INTO messages (topico, titulo, conteudo) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $topic_id, $titulo, $conteudo);

        if ($stmt->execute()) {
            echo "Mensagem adicionada com sucesso!";
        } else {
            echo "Erro ao adicionar mensagem: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}


$conn->close();
sleep(2);
header('Location: admin-messages.php');

?>
