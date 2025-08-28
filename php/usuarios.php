<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="/css/crud-global.css">
    <link rel="stylesheet" href="/css/crud-list.css">
</head>
<body>

    <h2 class="titulo">Lista de Usuários</h2>

    <table class="tabela-usuarios">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Administrador</th>
            <th></th>
        </tr>

        <?php
            include 'util.php';
            $conn = conecta();
            $sql = "SELECT * FROM usuario";
            $resultado = $conn->query($sql);

            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['email']) . "</td>";
                echo "<td>" . (!empty($linha['telefone']) ? htmlspecialchars($linha['telefone']) : '-') . "</td>";

                echo "<td>" . ($linha['admin'] ? 'Sim' : 'Não') . "</td>";
                echo "<td>
                    <a href='/php/alterarUsuario.php?id={$linha['id_usuario']}' class='botao-alterar'>Alterar</a>
                    <a href='/php/confirmacaoUsuario.php?id={$linha['id_usuario']}' class='botao-excluir'>Excluir</a>
                </td>";
                echo "</tr>";
            }
        ?>
    </table>

    <div class="botao-container">
        <a href="/php/adicionarUsuario.php" class="botao-adicionar">Adicionar</a>
    </div>

</body>
</html>