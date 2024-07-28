<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']); // Decodifique o ID

    // Verifica se a moto existe
    $sql = "SELECT img FROM catalogomotorize WHERE id = $id";
    $query = mysqli_query($conexao, $sql);
    if ($query && mysqli_num_rows($query) > 0) {
        $dados = mysqli_fetch_array($query);

        // Deleta a moto do banco de dados
        $sql_delete = "DELETE FROM catalogomotorize WHERE id = $id";
        if (mysqli_query($conexao, $sql_delete)) {
            // Deleta a imagem se não for a padrão
            if ($dados['img'] && $dados['img'] != "SemImagem.png") {
                unlink("imgs/" . $dados['img']);
            }
            header("Location: consultar.php");
            exit();
        } else {
            echo "<h4>Erro ao excluir moto: " . mysqli_error($conexao) . "</h4>";
        }
    } else {
        echo "<h4>Moto não encontrada.</h4>";
    }
} else {
    echo "<h4>ID da moto não fornecido.</h4>";
}

mysqli_close($conexao);
?>
