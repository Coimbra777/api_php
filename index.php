<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

date_default_timezone_set('America/Sao_Paulo');

include_once 'classes/autoload.class.php';

### Autoload
new Autoload();


### Rotas
$rota = new Rotas();
$rota->add('POST', '/usuarios/login', 'Usuarios::login', false);
$rota->add('GET', '/clientes/listar', 'Clientes::listarTodos', true);
$rota->add('GET', '/clientes/listar/[ID]', 'Clientes::listarUnico', true);

$rota->ir($_GET['path']);
