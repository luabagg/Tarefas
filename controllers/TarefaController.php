<?php

final class TarefaController extends Controller
{

    public function selectAll()
    {
        $model = new TarefaModel();
        $data = $model->selectAll();

        $this->loadView("listaTarefas", [
            "tarefas" => $data
        ]);
    }

    public function selectOne()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;

        if (!$id) {
            $vo = new TarefaVO();
        } else {
            $model = new TarefaModel();
            $vo = $model->selectOne($id);
        }

        if (!isset($vo)) {
            die("Registro não existe!");
        }

        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->selectAll();

        $responsavelModel = new CategoriaModel();
        $responsaveis = $responsavelModel->selectAll();

        $this->loadView("formTarefa", [
            "tarefa" => $vo,
            "categorias" => $categorias,
            "responsaveis" => $responsaveis
        ]);
    }

    public function save()
    {
        $id = isset($_POST["id"]) ? $_POST["id"] : 0;
        $nome = $_POST['nome'];
        $abertura = $_POST['abertura'];
        $prazo = $_POST['prazo'];
        $status = $_POST['status'];
        $categoria = $_POST["id_categoria"];
        $responsavel = $_POST["id_responsavel"];

        if ($nome == "" || strlen($nome) < 5 || strlen($nome) > 50) {
            die("Erro ao validar o nome!");
        }
        if (!$abertura) {
            die("A data de abertura é necessária!");
        }
        if (!$prazo) {
            die("O prazo é necessário!");
        }
        if ($status == null) {
            die("O status é necessário!");
        }
        if (!$categoria) {
            die("Necessário passar a categoria!");
        }
        if (!$responsavel) {
            die("Necessário passar o responsável!");
        }

        $model = new TarefaModel();
        $vo = new TarefaVO($id, $nome, $_POST['descricao'], $abertura, $prazo, $status, $categoria, null, $responsavel, null, null);

        if (!$id) {
            $model->insert($vo);
        } else {
            $model->update($vo);
        }

        $this->redirect("index.php#tarefas");
    }

    public function delete()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        if (!$id) {
            die("Necessário passar o ID!");
        }

        $model = new TarefaModel();
        $model->delete($id);

        $this->redirect("index.php#tarefa");
    }
}
