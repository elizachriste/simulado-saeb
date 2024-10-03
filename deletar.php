<?php
// Etapa 6- Exclusão de Registros - realizada em 01/10 as 10:32
include 'db.php'; // Inclui o arquivo de conexão

if (isset($_GET['id'])) { // Verifica se o ID do aluno a ser excluído foi passado
    $id = $_GET['id']; // Obtém o ID do aluno

    // Prepara a consulta para excluir o aluno
    $sql = "DELETE FROM alunos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Dado retirado!'); window.location.href='index.php';</script>"; // Mensagem de sucesso
    } else {
        echo "Erro ao deletar o dado: " . $conn->error; // Mensagem de erro
    }

    $conn->close(); // Fecha a conexão
}
?>
