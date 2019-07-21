$(function () {

    getAdministrador(function (data) {
        var jsonData = JSON.parse(data);
        if (jsonData.length != 0) {
            for (var i = 0; i < jsonData.length; i++) {
                var administrador = jsonData[i];
                $('tbody').append('<tr class="history_content"><td class="text-center">' + administrador.nome + '</td><td class="text-center">' + administrador.email + '</td><td class="td-actions text-center"><button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="" onClick="editar(' + administrador.admin_id + ',\'' + administrador.nome + '\',\'' + administrador.email + '\')"><i class="material-icons">edit</i></button>&nbsp;&nbsp;<button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="" onClick="deletar(' + administrador.admin_id + ')"><i class="material-icons">delete</i></button></td></tr>');
            }
        } else {
            $('tbody').append('<tr class="history_content"><td class="text-center" colspan="3">Não há registros</td></tr>');
        }

    });

});

$("#alterarSenha").click(function () {
    var valorId = $("input#id").val();
    var nome = $("input#nome").val();
    $("#idToPass").val(valorId);
    $("#titlePasswordAdmin").html("Editar Senha - " + nome);
    $("#editarSenha").modal();

    $("#fecharModal, #fecharModal2").click(function () {
        $("#editarSenha").modal('hide');
    });
});


function editar(id, nome, email) {
    $("input#id").val(id);
    $("input#nome").val(nome);
    $("input#email").val(email);
    $('#editar').modal();
}

function deletar(id) {
    swal({
        title: 'Você tem certeza que deseja excluir esse administrador?',
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
                    action: 'deletar-administrador',
                    id: id
                }, success: function (data, textStatus, jqXHR) {
                    swal(
                        'Deletado!',
                        'O administrador foi deletado!.',
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