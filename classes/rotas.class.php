<?php

class Rotas
{
    private $listaRotas = [''];
    private $listaCallback = [''];
    private $listaProtecao = [''];

    public function add($metodo, $rota, $callback, $protecao)
    {
        $this->listaRotas[] = strtoupper($metodo) . ":" . $rota;
        $this->listaCallback[] =  $metodo . "/" .  $callback;
        $this->listaProtecao[] = $protecao;

        return $this;
    }

    public function ir($rota)
    {
        $methodServer = $_SERVER['REQUEST_METHOD'];

        $methodServer = isset($_POST['_method']) ? $_POST['_method'] : $methodServer;
        $rota = $methodServer . ":/" . $rota;

        var_dump($methodServer, $rota);
    }
}
