<?php

final class ResponsavelModel implements Model
{

    public function selectAll()
    {
        try {
            $db = new Database();
            $query = "SELECT * FROM responsavel";
            $data = $db->select($query);
            $arrResponsaveis = [];

            foreach ($data as $row) {
                array_push($arrResponsaveis, new ResponsavelVO($row["id"], $row["nome"], $row["email"]));
            }

            return $arrResponsaveis;
        } catch (\Exception $e) {
            die($e);
        }
    }

    public function selectOne($id)
    {
        try {
            $db = new Database();
            $query = "SELECT * FROM responsavel WHERE id = :id";
            $binds = [":id" => $id];
            $data = $db->select($query, $binds);

            if (empty($data)) {
                return null;
            }

            $responsavel = new ResponsavelVO($data[0]["id"], $data[0]["nome"], $data[0]["email"]);

            return $responsavel;
        } catch (\Exception $e) {
            die($e);
        }
    }

    public function insert($vo)
    {
        try {
            $db = new Database();
            $query = "INSERT INTO responsavel (nome, email) VALUES (:nome, :email)";
            $binds = [
                ":nome" => $vo->getNome(),
                ":email" => $vo->getEmail()
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
            $query = "UPDATE responsavel SET nome = :nome, email = :email WHERE id = :id";
            $binds = [
                ":nome" => $vo->getNome(),
                ":email" => $vo->getEmail(),
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
            $query = "DELETE FROM responsavel WHERE id = :id";
            $binds = [":id" => $id];

            return $db->execute($query, $binds);
        } catch (\Exception $e) {
            die($e);
        }
    }
}
