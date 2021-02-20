<!DOCTYPE html>
<html>
<title>Cadastro de Responsável</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../views/form.css">

<body>
    <div class="container">
        <h1>Cadastro de Responsável</h1>
        <form action="salvarResponsavel.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $responsavel->getId(); ?>">

            <div class="field" tabindex="1">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" minlength="5" maxlength="50" placeholder="Nome" required value="<?php echo $responsavel->getNome(); ?>">
            </div>

            <div class="field" tabindex="2">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" minlength="5" maxlength="50" placeholder="Email" required value="<?php echo $responsavel->getEmail(); ?>">
            </div>

            <button type="submit">Salvar</button>
            <a href='../index.php#Responsaveis'>Cancelar</a>
        </form>
    </div>

    <footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large">
        <p>Desenvolvido por Luan Baggio</p>
    </footer>
</body>

</html>