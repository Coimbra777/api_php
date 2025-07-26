<?php

if ($acao == '' && $param == '') {
    echo json_encode(['ERRO' => 'Caminho inválido']);
}

if ($acao == 'update' && $param == '') {
    echo json_encode(['ERRO' => 'id do cliente não informado']);
}

if ($acao == 'update' && $param != '') {

    array_shift($_POST);

    $sql = "UPDATE clientes SET ";

    $contIndice = 1;
    foreach (array_keys($_POST) as $indice) {
        if (count($_POST) >  $contIndice) {
            $sql .= "{$indice} = '{$_POST[$indice]}',";
        } else {
            $sql .= "{$indice} = '{$_POST[$indice]}'";
        }

        $contIndice++;
    }

    $sql .= " WHERE id = {$param}";

    $db = DB::connect();
    $resultado = $db->prepare($sql);
    $exec = $resultado->execute();

    if ($exec) {
        echo json_encode(['status' => 'Dados atualizados com sucesso']);
    } else {
        echo json_encode(['status' => 'Erro ao atualizar dados']);
    }
}
