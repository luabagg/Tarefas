<?php

final class CategoriaController extends Controller
{

    public function selectAll()
    {
        $model = new CategoriaModel();
        $data = $model->selectAll();

        $this->loadView("listaCategorias", [
            "categorias" => $data
        ]);
    }

    public function selectOne()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;

        if (!$id) {
            $vo = new CategoriaVO();
        } else {
            $model = new CategoriaModel();
            $vo = $model->selectOne($id);
        }

        if (!isset($vo)) {
            die("Registro não existe!");
        }

        $this->loadView("formCategoria", [
            "categoria" => $vo
        ]);
    }

    public function save()
    {
        $id = isset($_POST["id"]) ? $_POST["id"] : 0;
        $nome = $_POST["nome"];

        if ($nome == "" || strlen($nome) < 5 || strlen($nome) > 50) {
            die("Erro ao validar o nome!");
        }

        $model = new CategoriaModel();
        $vo = new CategoriaVO($_POST["id"], $nome);

        if (!$id) {
            $model->insert($vo);
        } else {
            $model->update($vo);
        }

        $this->redirect("index.php#Categorias");
    }

    public function delete()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        if (!$id) {
            die("Necessário passar o ID!");
        }

        $db = new Database();
        if($db->select("SELECT * FROM tarefa WHERE id_categoria = $id")){
            die("Uma ou mais tarefas estão cadastradas com esta categoria, exclua-as antes de realizar a operação!");
        }

        $model = new CategoriaModel();

        $model->delete($id);

        $this->redirect("index.php#Categorias");
    }
}
