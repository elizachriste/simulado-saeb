<?php
// Etapa 1 - realizada em 01/10 as 09:17
include 'db.php'; // Inclui o arquivo de conexão com o banco de dados

// Testa a conexão 
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error); // Mensagem de erro
}
?>
