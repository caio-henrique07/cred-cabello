<?php
include "util.php";
$conn = conecta();

// Prepara SQL para inserir no banco
$sql = "INSERT INTO usuario (nome, email, senha, telefone, admin)
        VALUES (:nome, :email, :senha, :telefone, :admin)";

$insert = $conn->prepare($sql);

// Hash seguro da senha
$senhaHash = password_hash($_POST['senha'], PASSWORD_DEFAULT); //a senha n pode ser armazenada em texto plano

$insert->bindParam(':nome', $_POST['nome']);
$insert->bindParam(':email', $_POST['email']);
$insert->bindParam(':senha', $senhaHash);
$insert->bindParam(':telefone', $_POST['telefone']);
$insert->bindParam(':admin', $_POST['admin']);

try {
    $insert->execute();
    header("Location: usuarios.php");
    exit;
} catch (PDOException $e) {
    echo "Erro ao inserir usuário: " . $e->getMessage();
    exit;
}
?>
