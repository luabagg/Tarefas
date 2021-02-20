<?php

final class CategoriaModel implements Model
{

    public function selectAll()
    {
        try {
            $db = new Database();
            $query = "SELECT * FROM categoria";
            $data = $db->select($query);
            $arrCategorias = [];

            foreach ($data as $row) {
                array_push($arrCategorias, new CategoriaVO($row["id"], $row["nome"]));
            }

            return $arrCategorias;
        } catch (\Exception $e) {
            die($e);
        }
    }

    public function selectOne($id)
    {
        try {
            $db = new Database();
            $query = "SELECT * FROM categoria WHERE id = :id";
            $binds = [":id" => $id];
            $data = $db->select($query, $binds);

            if (empty($data)) {
                return null;
            }

            $categoria = new CategoriaVO($data[0]["id"], $data[0]["nome"]);

            return $categoria;
        } catch (\Exception $e) {
            die($e);
        }
    }

    public function insert($vo)
    {
        try {
            $db = new Database();
            $query = "INSERT INTO categoria (nome) VALUES (:nome)";
            $binds = [
                ":nome" => $vo->getNome()
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
            $query = "UPDATE categoria SET nome = :nome WHERE id = :id";
            $binds = [
                ":nome" => $vo->getNome(),
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
            $query = "DELETE FROM categoria WHERE id = :id";
            $binds = [":id" => $id];

            return $db->execute($query, $binds);
        } catch (\Exception $e) {
            die($e);
        }
    }
}
