<!DOCTYPE html>
<html>
<title>Tarefas</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="index.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src='index.js'></script>

<body>
    <div class="w3-content" style="max-width:1500px">
        <header class="w3-panel w3-center w3-opacity" style="padding:128px 16px">
            <h1> <span class="w3-xlarge">cadastro de </h1>
            <h1>TAREFAS</h1>
            <div class="w3-padding-32">
                <div class="w3-bar w3-border">
                    <a href="#Tarefas" id='tarefas-link' class="w3-bar-item w3-button">Tarefas</a>
                    <a href="#Responsaveis" id='responsaveis-link' class="w3-bar-item w3-button">Responsáveis</a>
                    <a href="#Categorias" id='categorias-link' class="w3-bar-item w3-button">Categorias</a>
                </div>
            </div>
        </header>

        <div id='tarefas'>
            <?php
            require_once 'config.php';
            $controller = new TarefaController();
            $controller->selectAll();
            ?>
        </div>

        <div id='responsaveis'>
            <?php
            $controller = new ResponsavelController();
            $controller->selectAll();
            ?>
        </div>

        <div id='categorias'>
            <?php
            $controller = new CategoriaController();
            $controller->selectAll();
            ?>
        </div>

        <footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large">
            <p>Desenvolvido por Luan Baggio</p>
        </footer>
    </div>
</body>

</html>