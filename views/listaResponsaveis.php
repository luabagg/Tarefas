<table>
    <?php if(sizeof($responsaveis) > 0) { ?>
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php } else { ?>
        <p> Nenhum responsável cadastrado, cadastre um abaixo: </p>
    <?php } foreach ($responsaveis as $responsavel) { ?>
        <tr>
            <td><?php echo $responsavel->getNome() ?></td>
            <td class="content"><?php echo $responsavel->getEmail() ?></td>
            <td>
                <a href="services/responsavel.php?id=<?php echo $responsavel->getId() ?>">Editar</a>
            </td>
            <td>
                <a href="services/excluirResponsavel.php?id=<?php echo $responsavel->getId() ?>">Excluir</a>
            </td>
        </tr>
    <?php } ?>
</table>

<a href="services/responsavel.php" id='edit'>Inserir</a>