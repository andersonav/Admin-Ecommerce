$(function () {

    getCategoria(function (data) {
        var jsonData = JSON.parse(data);
        if (jsonData.length != 0) {
            for (var i = 0; i < jsonData.length; i++) {
                var categoria = jsonData[i];
                $('tbody').append('<tr class="history_content"><td class="text-center">' + categoria.nome + '</td><td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="" onClick="editar(' + categoria.categoria_id + ',\'' + categoria.nome + '\')"><i class="material-icons">edit</i></button>&nbsp;&nbsp;<button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="" onClick="deletar(' + categoria.categoria_id + ')"><i class="material-icons">delete</i></button></td></tr>');
            }
        } else {
            $('tbody').append('<tr class="history_content"><td class="text-center" colspan="2">Não há registros</td></tr>');
        }

    });

});
function editar(id, nome) {
    $("input#id").val(id);
    $("input#nome").val(nome);
    $('#editar').modal();
}

function deletar(id) {
    swal({
        title: 'Você tem certeza que deseja excluir essa categoria?',
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
                    action: 'deletar-categoria',
                    id: id
                }, success: function (data, textStatus, jqXHR) {
                    swal(
                        'Deletado!',
                        'A categoria foi deletada!.',
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