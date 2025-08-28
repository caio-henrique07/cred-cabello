<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Excluir Usuário</title>
    <link rel="stylesheet" href="/css/crud-action.css">
</head>
<body>
    <div class="container">
        <?php
            include "util.php";
            $conn = conecta();

            if (!isset($_GET['id']) || empty($_GET['id'])) {
                echo '<p class="mensagem-erro">ID do usuário não informado.</p>';
                echo '<a href="/php/usuarios.php" class="link-voltar">Voltar para a lista de usuários</a>';
                exit;
            }

            $id = (int)$_GET['id'];
            $varSQL = "DELETE FROM usuario WHERE id_usuario = :id";
            $delete = $conn->prepare($varSQL);
            $delete->bindParam(':id', $id);
            $delete->execute();
        ?>
        <p class="mensagem-sucesso">Usuário excluído com sucesso.</p>
        <a href="/php/usuarios.php" class="link-voltar">Voltar para a lista de usuários</a>
    </div>
</body>
</html>