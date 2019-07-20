getQtdCliente(function (data) {
    var jsonData = JSON.parse(data);
    $("#qtdCliente").html(jsonData[0].qtdCliente);
});

getQtdVendasAprovadas(function (data) {
    var jsonData = JSON.parse(data);
    $("#qtdVendasAprovadas").html(jsonData[0].qtdVendasAprovadas);
});

getQtdVendasPendentes(function (data) {
    var jsonData = JSON.parse(data);
    $("#qtdVendasPendentes").html(jsonData[0].qtdVendasPendentes);
});

getQtdProdutos(function (data) {
    var jsonData = JSON.parse(data);
    $("#qtdProdutos").html(jsonData[0].qtdProdutos);
});