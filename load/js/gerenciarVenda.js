getVendas(function (data) {
    var jsonData = JSON.parse(data);
    if (jsonData.length != 0) {
        for (var i = 0; i < jsonData.length; i++) {
            var venda = jsonData[i];
            //        if (is_img("assets/img/" + cliente.imagem) == false) {
            //            cliente.imagem = "no-image.jpg";
            //        }
            $('tbody#pedidos').append('<tr class="history_content"><td class="text-center">' + venda.nome + '</td><td class="text-center">' + venda.email + '</td><td class="text-center">' + venda.status + '</td><td class="td-actions text-center">R$ ' + venda.valor_total + '</td><td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="" onClick="ver(' + venda.pedido_id + ')"><i class="material-icons">edit</i></button>&nbsp;&nbsp;</tr>');
        }
        number = 1;
        per_page = 10;
        do_history(number, per_page);
        pagination_history(number, per_page);
    } else {
        $('tbody#pedidos').append('<tr class="history_content"><td class="text-center" colspan="5">Não há registros</td></tr>');
    }

});

function ver(id) {
    $('tbody#produtos').empty();
    $.ajax({
        type: 'POST',
        url: "class/request.php",
        data: {
            action: 'get-produto-by-pedido',
            id: id
        }, success: function (data, textStatus, jqXHR) {
            var jsonData = JSON.parse(data);
            if (jsonData.length != 0) {
                for (var i = 0; i < jsonData.length; i++) {
                    var venda = jsonData[i];
                    console.log(venda);
                    //        if (is_img("assets/img/" + cliente.imagem) == false) {
                    //            cliente.imagem = "no-image.jpg";
                    //        }
                    $('tbody#produtos').append('<tr class="history_content"><td class="text-center">' + venda.nome + '</td><td class="text-center">' + venda.quantidade_produto_carrinho + '</td><td class="text-center">R$ ' + venda.valorMult + '</td></tr>');
                }
                number = 1;
                per_page = 10;
                do_history(number, per_page);
                pagination_history(number, per_page);
            } else {
                $('tbody#produtos').append('<tr class="history_content"><td class="text-center" colspan="3">Não há registros</td></tr>');
            }

            $('#editar').modal();
        }
    });

}


function deletar(id) {
    swal({
        title: 'Você tem certeza que deseja excluir esse cliente?',
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
                    action: 'deletar-cliente',
                    id: id
                }, success: function (data, textStatus, jqXHR) {
                    swal(
                        'Deletado!',
                        'O cliente foi deletado!.',
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