<?php

if ($acao == '' && $param == '') {
    echo json_encode(['ERRO' => 'Caminho inválido']);
    exit;
}

if ($acao == 'listar' && $param !== '') {
    $db = DB::connect();
    $resultado = $db->prepare('SELECT * FROM clientes WHERE id = :id');
    $resultado->bindParam(':id', $param, PDO::PARAM_INT);
    $resultado->execute();

    $obj = $resultado->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['dados' => $obj ?: []]);
    return;
}

if ($acao == 'listar') {
    $db = DB::connect();
    $resultado = $db->prepare('SELECT * FROM clientes ORDER BY nome');
    $resultado->execute();

    $obj = $resultado->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['dados' => $obj ?: []]);
    return;
}
