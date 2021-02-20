<table>
    <?php if(sizeof($tarefas) > 0) { ?>
        <tr>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Responsavel</th>
            <th>Descrição</th>
            <th>Data de Abertura</th>
            <th>Prazo de Entrega</th>
            <th>Status</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    <?php } else { ?>
        <p> Nenhuma tarefa criada, crie uma abaixo: </p>
    <?php } foreach ($tarefas as $tarefa) { ?>
        <tr>
            <td><?php echo $tarefa->getNome() ?></td>
            <td><?php echo $tarefa->getNomeCategoria() ?></td>
            <td><?php echo $tarefa->getNomeResponsavel() ?></td>
            <td class="content"><?php echo $tarefa->getDescricao() ?></td>
            <td><?php echo $tarefa->getAbertura() ?></td>
            <td><?php echo $tarefa->getPrazo() ?></td>
            <td><?php echo $tarefa->getStatus() ?></td>
            <td>
                <a href="services/tarefa.php?id=<?php echo $tarefa->getId() ?>">Editar</a>
            </td>
            <td>
                <a href="services/excluirTarefa.php?id=<?php echo $tarefa->getId() ?>">Excluir</a>
            </td>
        </tr>
    <?php } ?>
</table>

<a href="services/tarefa.php" id='edit'>Inserir</a>