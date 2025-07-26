<?php

if ($acao == '' && $param == '') {
    echo json_encode(['ERRO' => 'Caminho inválido']);
    exit;
}

if ($acao == 'delete' && $param == '') {
    echo json_encode(['ERRO' => 'id do cliente não informado']);
    exit;
}

if ($acao == 'delete' && $param != '') {

    array_shift($_POST);

    $sql = "DELETE FROM clientes WHERE id = {$param}";

    $db = DB::connect();
    $resultado = $db->prepare($sql);
    $exec = $resultado->execute();

    if ($exec) {
        echo json_encode(['status' => 'Cliente excluido com sucesso']);
    } else {
        echo json_encode(['status' => 'Erro ao excluir o cliente']);
    }
}
