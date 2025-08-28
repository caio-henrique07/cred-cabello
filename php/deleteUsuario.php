<?php
    include "util.php";
    $conn = conecta();

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "<p>ID do usuário não informado.</p>";
        echo '<p><a href="usuarios.php">Voltar</a></p>';
        exit;
    }

    $id = (int) $_GET['id'];

    // Verifica se usuário existe
    $sql = "SELECT nome FROM usuario WHERE id_usuario = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        echo "<p>Usuário não encontrado.</p>";
        echo '<p><a href="usuarios.php">Voltar</a></p>';
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
