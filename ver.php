<?php
require_once "conexao.php";

$resultado = $conexao->query("SELECT * FROM mensagens ORDER BY data_envio DESC");

echo "<h2>Mensagens Recebidas</h2>";

while ($linha = $resultado->fetch_assoc()) {
    echo "<div style='margin-bottom:20px; padding:15px; border:1px solid #ccc; border-radius:10px;'>";
    echo "<strong>Nome:</strong> " . htmlspecialchars($linha['nome']) . "<br>";
    echo "<strong>Email:</strong> " . htmlspecialchars($linha['email']) . "<br>";
    echo "<strong>Mensagem:</strong><br>" . nl2br(htmlspecialchars($linha['mensagem'])) . "<br>";
    echo "<small>Data: " . $linha['data_envio'] . "</small>";
    echo "</div>";
}

$conexao->close();
?>
