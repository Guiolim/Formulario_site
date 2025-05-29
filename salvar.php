<?php
require_once "conexao.php";

// Pega os dados do formulário
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$mensagem = $_POST['mensagem'] ?? '';

// Validação simples
if (empty($nome) || empty($email) || empty($mensagem)) {
    echo "Preencha todos os campos!";
    exit;
}

// Prepara a query
$sql = "INSERT INTO mensagens (nome, email, mensagem) VALUES (?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("sss", $nome, $email, $mensagem);

// Executa e dá feedback
if ($stmt->execute()) {
    echo "<p>Mensagem enviada com sucesso!</p>";
    echo "<p><a href='index.html'>Voltar</a></p>";
} else {
    echo "Erro ao salvar mensagem: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>
