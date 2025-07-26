<?php

class Clientes
{
    public function listarTodos()
    {
        $db = DB::connect();
        $resultado = $db->prepare('SELECT * FROM clientes ORDER BY nome');
        $resultado->execute();

        $obj = $resultado->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(['dados' => $obj ?: []]);
        return;
    }

    public function listarunico($id)
    {
        $db = DB::connect();
        $resultado = $db->prepare('SELECT * FROM clientes WHERE id = :id');
        $resultado->bindParam(':id', $param, PDO::PARAM_INT);
        $resultado->execute();

        $obj = $resultado->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(['dados' => $obj ?: []]);
        return;
    }

    public function adicionar($dados)
    {

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

    public function atualizar($id, $dados)
    {
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

        $sql .= " WHERE id = {$id}";

        $db = DB::connect();
        $resultado = $db->prepare($sql);
        $exec = $resultado->execute();

        if ($exec) {
            echo json_encode(['status' => 'Dados atualizados com sucesso']);
        } else {
            echo json_encode(['status' => 'Erro ao atualizar dados']);
        }
    }

    public function deletar($id)
    {
        array_shift($_POST);

        $sql = "DELETE FROM clientes WHERE id = {$id}";

        $db = DB::connect();
        $resultado = $db->prepare($sql);
        $exec = $resultado->execute();

        if ($exec) {
            echo json_encode(['status' => 'Cliente excluido com sucesso']);
        } else {
            echo json_encode(['status' => 'Erro ao excluir o cliente']);
        }
    }
}
