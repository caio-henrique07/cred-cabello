<?php
include "util.php";
$conn = conecta();

// Pega o ID e os dados do formulário
$id = $_POST['id_usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$admin = $_POST['admin'];
$senha = $_POST['senha'];

// Monta SQL dinâmico
if (!empty($senha)) {
    // Senha foi preenchida -> atualizar com hash
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "UPDATE usuario SET 
                nome = :nome,
                email = :email,
                senha = :senha,
                telefone = :telefone,
                admin = :admin
            WHERE id_usuario = :id";
} else {
    // Senha em branco -> não atualizar senha
    $sql = "UPDATE usuario SET 
                nome = :nome,
                email = :email,
                telefone = :telefone,
                admin = :admin
            WHERE id_usuario = :id";
}

$update = $conn->prepare($sql);
$update->bindParam(':nome', $nome);
$update->bindParam(':email', $email);
$update->bindParam(':telefone', $telefone);
$update->bindParam(':admin', $admin, PDO::PARAM_BOOL);
$update->bindParam(':id', $id, PDO::PARAM_INT);

if (!empty($senha)) {
    $update->bindParam(':senha', $senhaHash);
}

try {
    $update->execute();
    header("Location: usuarios.php");
    exit;
} catch (PDOException $e) {
    echo "Erro ao atualizar usuário: " . $e->getMessage();
    exit;
}
?>
