<?php

final class ResponsavelController extends Controller
{

    public function selectAll()
    {
        $model = new ResponsavelModel();
        $data = $model->selectAll();

        $this->loadView("listaResponsaveis", [
            "responsaveis" => $data
        ]);
    }

    public function selectOne()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;

        if (!$id) {
            $vo = new ResponsavelVO();
        } else {
            $model = new ResponsavelModel();
            $vo = $model->selectOne($id);
        }

        if (!isset($vo)) {
            die("Registro não existe!");
        }

        $this->loadView("formResponsavel", [
            "responsavel" => $vo
        ]);
    }

    public function save()
    {
        $id = isset($_POST["id"]) ? $_POST["id"] : 0;
        $nome = $_POST["nome"];
        $email = $_POST["email"];

        if ($nome == "" || strlen($nome) < 5 || strlen($nome) > 50) {
            die("Erro ao validar o nome!");
        }
        if ($email == "" || strlen($email) < 5 || strlen($email) > 50) {
            die("Erro ao validar o email!");
        }
        $model = new ResponsavelModel();
        $vo = new ResponsavelVO($_POST["id"], $nome, $email);

        if (!$id) {
            $model->insert($vo);
        } else {
            $model->update($vo);
        }

        $this->redirect("index.php#Responsaveis");
    }

    public function delete()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        if (!$id) {
            die("Necessário passar o ID!");
        }

        $db = new Database();

        if($db->select("SELECT * FROM tarefa WHERE id_responsavel = $id")){
            die("Uma ou mais tarefas estão cadastradas com este responsável, exclua-as antes de realizar a operação!");
        }

        $model = new ResponsavelModel();
        $model->delete($id);

        $this->redirect("index.php#Responsaveis");
    }
}
