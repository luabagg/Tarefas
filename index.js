$(document).ready(function () {
    changeDisplay();
});

$(window).on('hashchange', function (e) {
    changeDisplay();
});

function changeDisplay() {
    var hash = window.location.hash.substring(1)
    if (hash == 'Categorias') {
        showCategorias();
    } else if (hash == 'Responsaveis') {
        showResponsaveis();
    } else {
        showTarefas();
    }
}

function showTarefas() {
    $('#tarefas-link').addClass('w3-light-grey');
    $('#responsaveis-link').removeClass('w3-light-grey');
    $('#categorias-link').removeClass('w3-light-grey');
    $('#tarefas').show();
    $('#responsaveis').hide();
    $('#categorias').hide();
}

function showResponsaveis() {
    $('#responsaveis-link').addClass('w3-light-grey');
    $('#tarefas-link').removeClass('w3-light-grey');
    $('#categorias-link').removeClass('w3-light-grey');
    $('#responsaveis').show();
    $('#tarefas').hide();
    $('#categorias').hide();
}

function showCategorias() {
    $('#categorias-link').addClass('w3-light-grey');
    $('#tarefas-link').removeClass('w3-light-grey');
    $('#responsaveis-link').removeClass('w3-light-grey');
    $('#categorias').show();
    $('#tarefas').hide();
    $('#responsaveis').hide();
}