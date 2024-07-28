<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = base64_decode($_POST['id']);
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $valor = $_POST['valor'];
    $kmrodado = $_POST['kmrodado'];
    $img_atual = $_POST['img_atual'];
    $img_nova = $_FILES['img']['name'];

    // Processar o upload da imagem
    if (!empty($img_nova)) {
        $target_dir = "imgs/";
        $target_file = $target_dir . basename($img_nova);
        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
        $img = $img_nova;
    } else {
        $img = $img_atual; // Caso a imagem não seja atualizada
    }

    $sql = "UPDATE catalogomotorize SET marca='$marca', modelo='$modelo', ano='$ano', valor='$valor', kmrodado='$kmrodado', img='$img' WHERE id='$id'";

    if (mysqli_query($conexao, $sql)) {
        header("Location: consultar.php");
        exit(); // Certifique-se de que nenhum conteúdo adicional seja enviado
    } else {
        echo "<h4>Erro ao atualizar registro: " . mysqli_error($conexao) . "</h4>";
    }
}

mysqli_close($conexao);
?>
