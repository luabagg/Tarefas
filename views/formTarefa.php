<!DOCTYPE html>
<html>
<title>Cadastro de Tarefa</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../views/form.css">

<body>
    <div class="container">
        <h1>Cadastro de Tarefa</h1>
        <form action="salvarTarefa.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $tarefa->getId(); ?>">

            <div class="field" tabindex="1">
                <label for="nome">Nome :</label>
                <input type="text" id="nome" name="nome" minlength="5" maxlength="50" placeholder="Nome da tarefa" value="<?php echo $tarefa->getNome(); ?>">
            </div>

            <div class="field" tabindex="2">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="1" maxlength="500" placeholder="Descrição da tarefa"><?php echo $tarefa->getDescricao(); ?></textarea>
            </div>

            <div class="field" tabindex="3">
                <label for="abertura">Data de abertura:</label>
                <input type="date" id="abertura" name="abertura" placeholder="Data de abertura da tarefa" value="<?php echo $tarefa->getAbertura(); ?>">
            </div>

            <div class="field" tabindex="4">
                <label for="prazo">Prazo de Entrega :</label>
                <input type="number" id="prazo" name="prazo" min="0" maxlength="100000" placeholder="Prazo de entrega da tarefa" value="<?php echo $tarefa->getPrazo(); ?>">
            </div>

            <div class="field" tabindex="5">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="">Selecione</option>
                    <option value="0" <?php echo (0 == $tarefa->getStatus()) ? "selected" : "" ?>>Pendente</option>
                    <option value="1" <?php echo (1 == $tarefa->getStatus()) ? "selected" : "" ?>>Em andamento</option>
                    <option value="2" <?php echo (2 == $tarefa->getStatus()) ? "selected" : "" ?>>Finalizado</option>
                </select>
            </div>

            <div class="field" tabindex="6">
                <label for="id_categoria">Categoria</label>
                <select id="id_categoria" name="id_categoria">
                    <option value=""><?php echo (sizeof($categorias) > 0 ? "Selecione" : "Cadastre uma categoria primeiro!"); ?></option>
                    <?php foreach ($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria->getId() ?>" <?php echo ($categoria->getId() == $tarefa->getIdCategoria()) ? "selected" : "" ?>>
                            <?php echo $categoria->getNome() ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="field" tabindex="7">
                <label for="id_responsavel">Responsável</label>
                <select id="id_responsavel" name="id_responsavel">
                    <option value=""><?php echo (sizeof($responsaveis) > 0 ? "Selecione" : "Cadastre um responsável primeiro!"); ?></option>
                    <?php foreach ($responsaveis as $responsavel) { ?>
                        <option value="<?php echo $responsavel->getId() ?>" <?php echo ($responsavel->getId() == $tarefa->getIdResponsavel()) ? "selected" : "" ?>>
                            <?php echo $responsavel->getNome() ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit">Salvar</button>
            <a href='../'>Cancelar</a>
        </form>
        <footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large">
            <p>Desenvolvido por Luan Baggio</p>
        </footer>
</body>

</html>