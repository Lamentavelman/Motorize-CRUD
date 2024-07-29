<?php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = base64_decode($_POST['id']); // Descodifique o ID
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $valor = $_POST['valor'];
    $kmrodado = $_POST['kmrodado'];
    $img_atual = $_POST['img_atual'];
    
    // Verifique se uma nova imagem foi enviada
    if ($_FILES['img']['error'] == 0) {
        $img = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];
        $img_dir = 'imgs/' . $img;

        // Mova o arquivo para o diretório
        move_uploaded_file($img_tmp, $img_dir);
    } else {
        $img = $img_atual;
    }

    // Atualize as informações no banco de dados
    $sql = "UPDATE catalogomotorize SET marca='$marca', modelo='$modelo', ano='$ano', valor='$valor', kmrodado='$kmrodado', img='$img' WHERE id=$id";
    $query = mysqli_query($conexao, $sql);

    if ($query) {
        // Redirecione para a página de consulta após a atualização
        header("Location: consultar.php");
        exit;
    } else {
        echo "Erro ao atualizar a moto: " . mysqli_error($conexao);
    }
}

mysqli_close($conexao);
?>
