<?php
// Etapa 6- Exclusão de Registros  realizado em 01/10 as 10:20 
include 'db.php';// Inclui o arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    $sql = "INSERT INTO alunos (nome, idade, email, curso) VALUES ('$nome', $idade, '$email', '$curso')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Aluno cadastrado!'); window.location.href='index.php';</script>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
