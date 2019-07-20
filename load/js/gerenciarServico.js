getServico(function (data) {
    var jsonData = JSON.parse(data);
    //console.log(jsonData);
    for (var i = 0; i < jsonData.length; i++) {
        var servicos = jsonData[i];
        $('tbody').append('<tr class="history_content"> <td class="text-center">' + servicos.descricao + '</td><td class="text-center" width="15%">' + servicos.tempo_estimado + '</td><td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title=""  onClick="editarServico(' + servicos.id_servico + ',\'' + servicos.descricao + '\',' + servicos.tempo_estimado + ',' + servicos.preco + ')"><i class="material-icons">edit</i></button>&nbsp;&nbsp;<button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="" onClick="deletar(' + servicos.id_servico + ')"><i class="material-icons">delete</i></button></td></tr>');
    }// end loop for
});

function editarServico(id, nome, tempo, preco) {
    $("input#id").val(id);
    $("input#nome").val(nome);
    $("input#servico").val(tempo);
    $("input#preco").val(preco);
    $('#editar').modal();
}

function deletar(id) {
    swal({
        title: 'Você tem certeza que deseja excluir esse funcionário?',
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
                    action: 'drop-servico',
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