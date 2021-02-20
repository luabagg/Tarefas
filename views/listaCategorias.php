<table>
    <?php if(sizeof($categorias) > 0) { ?>
    <tr>
        <th>Nome</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php } else { ?>
        <p> Nenhuma categoria criada, crie uma abaixo: </p>
    <?php } foreach ($categorias as $categoria) { ?>
        <tr>
            <td class="content"><?php echo $categoria->getNome() ?></td>
            <td>
                <a href="services/categoria.php?id=<?php echo $categoria->getId() ?>">Editar</a>
            </td>
            <td>
                <a href="services/excluirCategoria.php?id=<?php echo $categoria->getId() ?>">Excluir</a>
            </td>
        </tr>
    <?php } ?>
</table>

<a href="services/categoria.php" id='edit'>Inserir</a>