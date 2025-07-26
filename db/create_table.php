<?php

require_once 'db.class.php';

$pdo = DB::connect();

$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    cidade VARCHAR(100),
    estado VARCHAR(100)
)";

$pdo->exec($sql);

echo json_encode(["status" => "tabela criada com sucesso"]);
