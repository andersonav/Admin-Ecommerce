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

    getProdutos(function (data) {
        var jsonData = JSON.parse(data);
        if (jsonData.length != 0) {
            for (var i = 0; i < jsonData.length; i++) {
                var produto = jsonData[i];
                $('tbody').append('<tr class="history_content"><td class="text-center">' + produto.nome + '</td><td class="text-center">' + produto.quantidade + '</td><td class="text-center">R$ ' + produto.valor + '</td><td class="td-actions text-center">' + produto.categoriaNome + '</td><td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="" onClick="editar(' + produto.produto_id + ',\'' + produto.nome + '\',\'' + produto.descricao + '\',\'' + produto.valor + '\',\'' + produto.imagem + '\',\'' + produto.quantidade + '\',\'' + produto.categoria_id_fk + '\')"><i class="material-icons">edit</i></button>&nbsp;&nbsp;<button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="" onClick="deletar(' + produto.produto_id + ')"><i class="material-icons">delete</i></button></td></tr>');
            }
        } else {
            $('tbody').append('<tr class="history_content"><td class="text-center" colspan="5">Não há registros</td></tr>');
        }

    });


});


function editar(id, nome, descricao, valor, imagem, quantidade, categoria) {
    $("#valor").maskMoney({
        precision: 2,
        decimal: '.'
    });
    $("#imagemProduto").attr("src", 'assets/img/' + imagem);
    $("input#id").val(id);
    $("input#nome").val(nome);
    $("textarea#descricao").val(descricao);
    $("input#valor").val(valor);
    $("input#quantidade").val(quantidade);
    $("select#categoria").val(categoria);
    $('#editar').modal();
}

function deletar(id) {
    swal({
        title: 'Você tem certeza que deseja excluir esse produto?',
        text: "Essa ação não poderá ser desfeita!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, eu desejo!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'POST',
                url: "class/request.php",
                data: {
                    action: 'deletar-produto',
                    id: id
                }, success: function (data, textStatus, jqXHR) {
                    swal(
                        'Deletado!',
                        'O produto foi deletado!.',
                        'success'
                    )
                    var refreshIntervalId = setInterval(function () {
                        var pagina_atual = $("input#pagina_atual").val();
                        $("#sidenav-overlay").trigger("click");
                        $(".modal-backdrop").remove();
                        $("#containerLoadInformations").empty();
                        $("#containerLoadInformations").load("load/" + pagina_atual + ".php");
                        //                    $("input[type=text]").each(function () {
                        //                        $(this).val("");
                        //                    });
                        clearInterval(refreshIntervalId);
                    }, 1500);
                }
            });

        }
    })

}

function is_img(file) {
    var boolean;
    $.ajax({
        url: file,
        async: false,
        success: function () {
            boolean = true;
        },
        error: function () {
            boolean = false;
        },
    });
    return boolean;
}