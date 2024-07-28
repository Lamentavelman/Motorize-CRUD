<?php
    mysqli_report(MYSQLI_REPORT_ERROR);
    $host = "localhost";
    $user = "root";
    $pass = "";
    $banco = "bdmotorize";

    $conexao = @mysqli_connect($host, $user, $pass, $banco)
    or die ("<h3>Parece que estamos tendo problemas com a conexão ao Banco de Dados</h3>\n");
    mysqli_set_charset($conexao, "utf8");

    
    $busca = $_GET['busca'] ?? '';

    if ($busca) {
        $busca = mysqli_real_escape_string($conexao, $busca);
        $query = "SELECT * FROM catalogomotorize WHERE marca LIKE '%$busca%' OR modelo LIKE '%$busca%'";
        $result = mysqli_query($conexao, $query);

        $resultados = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $resultados[] = $row;
        }

        echo json_encode($resultados);
    }