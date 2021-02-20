<?php

final class TarefaModel implements Model
{

    public function selectAll()
    {
        try {
            $db = new Database();
            $query = "SELECT t.*, c.nome AS categoria, r.nome AS responsavel, r.email AS email FROM tarefa t LEFT JOIN categoria c ON c.id = t.id_categoria LEFT JOIN responsavel r ON r.id = t.id_responsavel";
            $data = $db->select($query);

            $arrTarefas = [];

            foreach ($data as $row) {
                array_push(
                    $arrTarefas,
                    new TarefaVO($row["id"], $row["nome"], $row["descricao"], $row["abertura"], $row["prazo"], $row["status"], $row["id_categoria"], $row["categoria"], $row["id_responsavel"], $row["responsavel"], $row["email"])
                );
            }

            return $arrTarefas;
        } catch (\Exception $e) {
            die($e);
        }
    }

    public function selectOne($id)
    {
        try {
            $db = new Database();
            $query = "SELECT * FROM tarefa WHERE id = :id";
            $binds = [":id" => $id];
            $data = $db->select($query, $binds);

            if (empty($data)) {
                return null;
            }

            $tarefa = new TarefaVO($data[0]["id"], $data[0]["nome"], $data[0]["descricao"], $data[0]["abertura"], $data[0]["prazo"], $data[0]["status"], $data[0]["id_categoria"], null, $data[0]["id_responsavel"], null, null);

            return $tarefa;
        } catch (\Exception $e) {
            die($e);
        }
    }

    public function insert($vo)
    {
        try {
            $db = new Database();
            $query = "INSERT INTO tarefa (nome, descricao, abertura, prazo, status, id_categoria, id_responsavel) VALUES (:nome, :descricao, :abertura, :prazo, :status, :idCategoria, :idResponsavel)";
            $binds = [
                ":nome" => $vo->getNome(),
                ":descricao" => $vo->getDescricao(),
                ":abertura" => $vo->getAbertura(),
                ":prazo" => $vo->getPrazo(),
                ":status" => $vo->getStatus(),
                ":idCategoria" => $vo->getIdCategoria(),
                ":idResponsavel" => $vo->getIdResponsavel()
            ];

            $success = $db->execute($query, $binds);

            if ($success) {
                return $db->getLastInsertedId();
            }

            return null;
        } catch (\Exception $e) {
            die($e);
        }
    }

    public function update($vo)
    {
        try {
            $db = new Database();
            $query = "UPDATE tarefa SET nome = :nome, descricao = :descricao, abertura = :abertura, prazo = :prazo, status = :status, id_categoria = :idCategoria, id_responsavel = :idResponsavel WHERE id = :id";
            $binds = [
                ":nome" => $vo->getNome(),
                ":descricao" => $vo->getDescricao(),
                ":abertura" => $vo->getAbertura(),
                ":prazo" => $vo->getPrazo(),
                ":status" => $vo->getStatus(),
                ":idCategoria" => $vo->getIdCategoria(),
                ":idResponsavel" => $vo->getIdResponsavel(),
                ":id" => $vo->getId()
            ];

            return $db->execute($query, $binds);
        } catch (\Exception $e) {
            die($e);
        }
    }

    public function delete($id)
    {
        try {
            $db = new Database();
            $query = "DELETE FROM tarefa WHERE id = :id";
            $binds = [":id" => $id];

            return $db->execute($query, $binds);
        } catch (\Exception $e) {
            die($e);
        }
    }
}
