<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Alterar Usuário</title>
    <link rel="stylesheet" href="/css/crud-global.css">
    <link rel="stylesheet" href="/css/crud-form.css">
    <link rel="stylesheet" href="/css/crud-error.css">
</head>
<body>
    <?php
        include "util.php";
        $conn = conecta();

        if (!isset($_GET['id']) || empty($_GET['id'])) {
            echo '<div id="error-message">
                    ID do usuário não informado.
                    <br><br>
                    <a href="usuarios.php">Voltar para lista</a>
                </div>';
            exit;
        }

        $id = (int) $_GET['id'];

        // Busca o usuário
        $sql = "SELECT * FROM usuario WHERE id_usuario = :id";
        $select = $conn->prepare($sql);
        $select->bindParam(':id', $id);
        $select->execute();
        $linha = $select->fetch(PDO::FETCH_ASSOC);

        if (!$linha) {
            echo '<div id="error-message">
                    Usuário não encontrado.
                    <br><br>
                    <a href="usuarios.php">Voltar para lista</a>
                </div>';
            exit;
        }

        $nome = $linha['nome'];
        $email = $linha['email'];
        $telefone = $linha['telefone'];
        $admin = $linha['admin'];
    ?>

    <div class="container">
        <h1>Alterar Usuário</h1>
        <form action="updateUsuario.php" method="post">
            <input type="hidden" name="id_usuario" value="<?php echo $id; ?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

            <label for="senha">Senha (preencha apenas se desejar alterar):</label>
            <input type="password" id="senha" name="senha">

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>">

            <label for="admin">Administrador:</label>
            <select id="admin" name="admin">
                <option value="0" <?php if(!$admin) echo 'selected'; ?>>Não</option>
                <option value="1" <?php if($admin) echo 'selected'; ?>>Sim</option>
            </select>

            <input type="submit" value="Salvar Alterações" class="btn">
        </form>
        <a href="/php/usuarios.php" class="link-voltar">Voltar para lista</a>
    </div>
</body>
</html>