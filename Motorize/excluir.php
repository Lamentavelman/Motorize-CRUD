<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']); // Descodifique o ID

    // Certifique-se de que o ID é um número inteiro para evitar injeção de SQL
    $id = intval($id);

    $sql = "DELETE FROM catalogomotorize WHERE id = $id";
    $query = mysqli_query($conexao, $sql);

    if ($query) {
        header("Location: consultar.php");
        exit;
    } else {
        echo "Erro ao excluir a moto: " . mysqli_error($conexao);
    }
} else {
    echo "ID da moto não fornecido.";
}

mysqli_close($conexao);
?>
