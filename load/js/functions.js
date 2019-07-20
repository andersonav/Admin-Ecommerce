/* Página Inicial */
var getQtdCliente = function (fn) {
    $.post('class/request.php', {
        action: 'qtd-clientes'
    }, function (response) {
        if (typeof fn === "function") {
            fn(response);
        }
    });
};

var getQtdVendasAprovadas = function (fn) {
    $.post('class/request.php', {
        action: 'qtd-vendas-aprovadas'
    }, function (response) {
        if (typeof fn === "function") {
            fn(response);
        }
    });
};


var getQtdVendasPendentes = function (fn) {
    $.post('class/request.php', {
        action: 'qtd-vendas-pendentes'
    }, function (response) {
        if (typeof fn === "function") {
            fn(response);
        }
    });
};

var getQtdProdutos = function (fn) {
    $.post('class/request.php', {
        action: 'qtd-produtos'
    }, function (response) {
        if (typeof fn === "function") {
            fn(response);
        }
    });
};

/* Clientes */

var getCliente = function (fn) {
    $.post('class/request.php', {
        action: 'get-clientes'
    }, function (response) {
        if (typeof fn === "function") {
            fn(response);
        }
    });
};

/* Produtos */
var getCategoria = function (fn) {
    $.post('class/request.php', {
        action: 'get-categorias'
    }, function (response) {
        if (typeof fn === "function") {
            fn(response);
        }
    });
};