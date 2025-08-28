<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Adicionar Usuário</title>
    <link rel="stylesheet" href="/css/crud-global.css">
    <link rel="stylesheet" href="/css/crud-form.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Usuário</h1>
        <form action="insertUsuario.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone">

            <label for="admin">Administrador:</label>
            <select id="admin" name="admin">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>

            <input type="submit" value="Cadastrar" class="btn btn-cadastrar">
        </form>
        <a href="/php/usuarios.php" class="link-voltar">Voltar para lista</a>
    </div>
</body>
</html>
