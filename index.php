<?php
include 'db.php'; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- realizada em 01/10 10:25-->
    <div class="container">
        <h1>Cadastro de Alunos</h1>
        
        <!-- cadastro de alunos -->
        <form action="cadastro.php" method="POST" class="form-cadastro">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="idade">Idade:</label>
            <input type="number" name="idade" id="idade" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="curso">Curso:</label>
            <input type="text" name="curso" id="curso" required>

            <button type="submit">Cadastrar</button>
        </form>

        
        <form method="GET" action="" class="form-pesquisa">
            <?php
            // Verifica se foi feita uma pesquisa e armazena o termo
            $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
            ?>
            <input type="text" name="pesquisa" placeholder="Pesquisar por nome ou curso" value="<?php echo htmlspecialchars($pesquisa); ?>">
            <button type="submit">Pesquisar</button>
        </form>

        
        <h2>Alunos</h2>
        <table class="table-alunos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Email</th>
                    <th>Curso</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta pesquisa
                if ($pesquisa) {
                    $sql = "SELECT * FROM alunos WHERE nome LIKE '%$pesquisa%' OR curso LIKE '%$pesquisa%'";
                } else {
                    $sql = "SELECT * FROM alunos";
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // exibir os alunos cadastrados
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nome']}</td>
                                <td>{$row['idade']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['curso']}</td>
                                <td><a href='deletar.php?id={$row['id']}' class='btn-delete'>Excluir</a>
                                <a href='editar.php?id={$row['id']}' class='btn-edit'>Editar</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aluno não encontrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
