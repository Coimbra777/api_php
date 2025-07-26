<?php

require_once 'db.class.php';

$pdo = DB::connect();

$sql = "INSERT INTO usuarios (nome, email, cidade, estado) VALUES
        ('Gabriel', 'gabriel@email.com', 'Campinas', 'SP'),
        ('João', 'joao@email.com', 'Campinas', 'SP')";

$pdo->exec($sql);

echo json_encode(["status" => "dados inseridos"]);
