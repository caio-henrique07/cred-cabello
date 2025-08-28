<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Exclusão</title>
    <link rel="stylesheet" href="/css/crud-action.css">
</head>
<body>
    <?php
        include "util.php";
        $conn = conecta();

        if (!isset($_GET['id']) || empty($_GET['id'])) {
            echo '<p class="mensagem-erro">ID do usuário não informado.</p>';
            echo '<a href="/php/usuarios.php" class="link-voltar">Voltar para a lista de usuários</a>';
            exit;
        }

        $id = (int) $_GET['id'];

        // Busca o usuário
        $sql = "SELECT nome FROM usuario WHERE id_usuario = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            echo '<p class="mensagem-erro">Usuário não encontrado.</p>';
            echo '<a href="/php/usuarios.php" class="link-voltar">Voltar para a lista de usuários</a>';
            exit;
        }
    ?>

<script>
    if (confirm("Deseja realmente excluir o usuário '<?php echo addslashes($usuario['nome']); ?>'?")) {
        window.location.href = "/php/excluirUsuario.php?id=<?php echo $id; ?>";
    } else {
        window.location.href = "/php/usuarios.php";
    }
</script>
</body>
</html>
