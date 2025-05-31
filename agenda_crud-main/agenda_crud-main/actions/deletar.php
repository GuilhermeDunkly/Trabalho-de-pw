<?php
include_once("../config/database/database.php");

if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];

    // Preparando a consulta para excluir o candidato pelo ID
    $stmt = $con->prepare("DELETE FROM candidatos WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Exclusão bem-sucedida, redireciona para a página inicial
        header("Location: ../index.php");
        exit();
    } else {
        // Em caso de erro na execução
        echo "Erro ao excluir o candidato: " . $stmt->error;
    }

    $stmt->close();
} else {
    // ID inválido ou não fornecido
    echo "ID inválido ou não fornecido.";
}
?>
