number = 1;
per_page = 10;
do_history(number, per_page);
pagination_history(number, per_page);

function preenchePaginacao(number, per_page) {
    // number_show = número de itens * total de páginas
    var number_show = number * per_page;
    for (var i = 0; i < per_page; i++) {
        number_show--;
        $(".history_content:eq(" + number_show + ")").show();
    }
}

// Recebe o número de itens e as páginas
function pagination_history(number, per_page) {
    // Esconde a página que contém todos os elementos
    $(".history_content").hide();
    // Remove a paginação
    $(".paginacao").remove();
    // Cria uma nova paginação
    do_history(number, per_page);
    // Preenche a paginação
    preenchePaginacao(number, per_page);
}

function do_history(num, per_page) {
    // Recebe o total de itens / total por página
    var numbers = jQuery(".history_content").length / per_page;

    if (numbers <= 1)
        return false;

    // Passa para inteiro o valor recebido
    numbers = parseInt(numbers.toFixed(0));
    // Limpa onde ficará os itens
    jQuery('#pagination_history').empty();
    // Cria variavel vazia
    var elements = "";
    // Verifica se o número selecionado é menor que 5
    if (num < 5) {
        var i = 1;
        var endLoop = 7;
    }
    // Caso seja maior que 5
    else if (!(num + 3 > numbers)) {
        var i = num - 3;
        var endLoop = num + 3;
    }
    // Caso esteja no fim das opções
    else {
        var i = numbers - 6;
        var endLoop = numbers;
    }
    // Verifica se o final do loop  é menor que o limite esperado
    if (numbers < 7) {
        i = 1;
        endLoop = numbers;
    }
    // Verifica se o final do loop é maior que o número permitido
    if (endLoop > numbers) {
        endLoop = numbers;
    }

    // Adicionando a setinha de volta
    if (num != 1) {
        // Adicionando setinha de inicio
        elements += "<li class='paginacao'><a onclick='pagination_history(1," + per_page + ");'><i class='material-icons'>first_page</i></a></li>";
        elements += "<li class='paginacao'><a onclick='pagination_history(" + (num - 1) + "," + per_page + ");'><i class='material-icons'>navigate_before</i></a></li>";
    } else {
        elements += "<li class='paginacao'><a><i class='material-icons'>first_page</i></a></li>";
        elements += "<li class='paginacao'><a><i class='material-icons'>navigate_before</i></a></li>";
    }
    // Laço com os botões de cada página
    for (i; i <= endLoop; i++) {
        if (num === i)
            elements += "<li class='paginacao active'><a onclick='pagination_history(" + i + "," + per_page + ");'>" + i + "</a></li>";
        else
            elements += "<li class='paginacao'><a onclick='pagination_history(" + i + "," + per_page + ");'>" + i + "</a></li>";
    }
    // Adicionando a setinha de próximo
    if (num != numbers) {
        elements += "<li class='paginacao'><a onclick='pagination_history(" + (num + 1) + "," + per_page + ");'><i class='material-icons'>navigate_next</i></a></li>";
        elements += "<li class='paginacao'><a onclick='pagination_history(" + numbers + "," + per_page + ");'><i class='material-icons'>last_page</i></a></li>";

    } else {
        elements += "<li class='paginacao'><a><i class='material-icons'>navigate_next</i></a></li>";
        elements += "<li class='paginacao'><a><i class='material-icons'>last_page</i></a></li>";

    }

    // Adiciona os elementos
    jQuery('#pagination_history').append(elements);
}


// ---------------------------------- Ordena paginação ------------------------------------

$('th').click(function () {
    var table = $(this).parents('table').eq(0)
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
    this.asc = !this.asc
    if (!this.asc) {
        rows = rows.reverse()
    }
    for (var i = 0; i < rows.length; i++) {
        table.append(rows[i])
    }
    $(".history_content").hide();
    // Bota o icone de ordenação
    $('.sortInfoPage').remove();
    $(this).append('<i class="sortInfoPage material-icons tiny">import_export</i>');

    // Preenche a paginação   
    preenchePaginacao(number, per_page);
})
function comparer(index) {
    return function (a, b) {
        var valA = getCellValue(a, index), valB = getCellValue(b, index)
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
    }
}
function getCellValue(row, index) {
    return $(row).children('td').eq(index).html()
}

$("#search").keyup(function () {
    $(".noRegisterFound").remove();
    var value = this.value;
    var total = 0;
    $("table").find("tr").each(function (index) {
        if (index === 0)
            return;
        var id = $(this).find("td").text();
        $(this).toggle(id.indexOf(value) !== -1);
        if (id.indexOf(value) !== -1)
            total++;
    });
    if (total == 0) {
        var totalCols = document.getElementById('tabela_paginacao').rows[0].cells.length;
        $("tbody").append('<tr class="noRegisterFound"><td colspan=' + totalCols + '> Nenhum registro foi encontrado! </td> </tr>');
    }
    // Remove a paginação
    $(".paginacao").remove();
    if (value == '') {
        do_history(number, per_page);
        pagination_history(number, per_page);
    }
});
