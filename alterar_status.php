<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $_id = $_GET['id'];

    // Procura o status atual do usuário
    $_query_status = "SELECT status FROM tb_login WHERE id = $_id";
    $_resultado_status = mysqli_query($_conexao, $_query_status);
    $_row_status = mysqli_fetch_assoc($_resultado_status);
    $_status_atual = $_row_status['status'];

    // Atualiza o status do usuário
    if ($_status_atual == "ativo") {
        $_novo_status = "inativo";
    } elseif ($_status_atual == "inativo") {
        $_novo_status = "ativo";
    }

    // Atualiza o status no banco de dados
    $_query_update = "UPDATE tb_login SET status='$_novo_status' WHERE id = $_id";
    $_resultado = mysqli_query($_conexao, $_query_update) or die("Erro ao atualizar o status");

    if ($_resultado) {
        header("refresh:0.1; url=listar_cadastro.php");
        exit();
    } else {
        echo "Atualização mal sucedida";
        header("refresh: 3; url=listar_cadastro.php");
    }
} else {
    echo "ID não foi fornecido.";
}
?>