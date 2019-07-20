getCliente(function (data) {
    var jsonData = JSON.parse(data);
    if (jsonData.length != 0) {
        for (var i = 0; i < jsonData.length; i++) {
            var cliente = jsonData[i];
            //        if (is_img("assets/img/" + cliente.imagem) == false) {
            //            cliente.imagem = "no-image.jpg";
            //        }
            $('tbody').append('<tr class="history_content"><td class="text-center">' + cliente.nome + '</td><td class="text-center">' + cliente.telefone + '</td><td class="text-center">' + cliente.email + '</td><td class="td-actions text-center">' + cliente.cpf + '</td><td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="" onClick="editar(' + cliente.usuario_id + ',\'' + cliente.nome + '\',\'' + cliente.telefone + '\',\'' + cliente.email + '\',\'' + cliente.cpf + '\',\'' + cliente.cep + '\',\'' + cliente.endereco + '\',\'' + cliente.numero + '\',\'' + cliente.cidade + '\', \'' + cliente.bairro + '\')"><i class="material-icons">edit</i></button>&nbsp;&nbsp;<button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="" onClick="deletar(' + cliente.usuario_id + ')"><i class="material-icons">delete</i></button></td></tr>');
        }
        number = 1;
        per_page = 10;
        do_history(number, per_page);
        pagination_history(number, per_page);
    } else {
        $('tbody').append('<tr class="history_content"><td class="text-center" colspan="5">Não há registros</td></tr>');
    }

});

function editar(id, nome, telefone, email, cpf, cep, endereco, numero, cidade, bairro) {
    $("#cpf").mask("999.999.999-99");
    $("#telefone").mask("(99) 99999-9999");
    $("#cep").mask("99999-999");
    $("input#id").val(id);
    $("input#nome").val(nome);
    $("input#telefone").val(telefone);
    $("input#email").val(email);
    $("input#cpf").val(cpf);
    $("input#cep").val(cep);
    $("input#endereco").val(endereco);
    $("input#numero").val(numero);
    $("input#cidade").val(cidade);
    $("input#bairro").val(bairro);
    $('#editar').modal();
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

function getCEP(obj) {
    var cep = $(obj).val();
    $.ajax({
        type: 'GET',
        url: 'https://viacep.com.br/ws/' + cep + '/json/',
        success: function (data) {
            var endereco = data.logradouro;
            var bairro = data.bairro;
            var cidade = data.localidade;

            $("input#endereco").val(endereco);
            $("input#cidade").val(cidade);
            $("input#bairro").val(bairro);
        }
    });
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