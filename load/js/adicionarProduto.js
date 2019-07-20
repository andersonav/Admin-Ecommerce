$(function () {
    $("#valor").maskMoney({
        precision: 2,
        decimal: '.'
    });

    getCategoria(function (data) {
        var jsonData = JSON.parse(data);
        for (var i = 0; i < jsonData.length; i++) {
            var categoria = jsonData[i];

            $("select").append('<option value=' + categoria.categoria_id + '>' + categoria.nome + '</option>');
        }
    });
});

