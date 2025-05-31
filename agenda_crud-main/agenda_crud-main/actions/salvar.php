<?php
include_once("../config/database/database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Coletando dados do formulário
    $nome = $_POST['nome'];
    $numero_titulo = $_POST['numero_titulo'];
    $zona_eleitoral = $_POST['zona_eleitoral'];
    $secao_eleitoral = $_POST['secao_eleitoral'];
    $data_nascimento = $_POST['data_nascimento'];

    // Preparando a consulta SQL com parâmetros
    $sql = "INSERT INTO eleitores (nome, numero_titulo, zona_eleitoral, secao_eleitoral, data_nascimento) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Preparando a declaração
    if ($stmt = $con->prepare($sql)) {
        // Ligando os parâmetros
        $stmt->bind_param("sssssss", $nome, $numero_titulo, $zona_eleitoral, $secao_eleitoral, $data_nascimento);

        // Executando a declaração
        if ($stmt->execute()) {
            // Redirecionando para a página inicial após o sucesso
            header("Location: ../index.php");
            exit();
        } else {
            // Exibindo erro caso a execução falhe
            echo "Erro ao registrar o eleitor: " . $stmt->error;
        }

        // Fechando a declaração
        $stmt->close();
    } else {
        // Exibindo erro caso a preparação falhe
        echo "Erro na preparação da consulta: " . $con->error;
    }
}
?>
