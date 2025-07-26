<?php

if ($acao == '' && $param == '') {
    echo json_encode(['ERRO' => 'Caminho inválido']);
}

if ($acao == 'adiciona' && $param == '') {

    $sql = "INSERT INTO clientes (";

    $contIndice = 1;
    foreach (array_keys($_POST) as $indice) {
        if (count($_POST) >  $contIndice) {
            $sql .= "{$indice},";
        } else {
            $sql .= "{$indice}";
        }

        $contIndice++;
    }

    $sql .= ") VALUES (";

    $contValor = 1;
    foreach (array_values($_POST) as $valor) {
        if (count($_POST) > $contValor) {
            $sql .= "'{$valor}',";
        } else {
            $sql .= "'{$valor}'";
        }
        $contValor++;
    }

    $sql .= ")";

    $db = DB::connect();
    $resultado = $db->prepare($sql);
    $exec = $resultado->execute();

    if ($exec) {
        echo json_encode(['status' => 'Dados inseridos com sucesso']);
    } else {
        echo json_encode(['status' => 'Erro ao inserir dados']);
    }
}
