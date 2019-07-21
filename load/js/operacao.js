$("form").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $('.carregar-dados').css('display', 'block');
    $.ajax({
        url: 'class/request.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        xhr: function () {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function () {
                    $('.carregar-dados').css('display', 'none');
                }, false);
            }
            return myXhr;
        },
        success: function (data) {
            if (data.status == 'success') {
                swal(
                    'Sucesso!',
                    'Operação realizada com sucesso!.',
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
            } else if (data.status == 'error') {
                var pagina_atual = $("input#pagina_atual").val();
                if (pagina_atual == "adicionarAdministrador" || pagina_atual == "gerenciarAdministrador") {
                    swal(
                        'Senhas não coincidem!',
                        'Suas senhas não se correspondem.',
                        'error'
                    )
                }
            }
        },
        error: function (data) {
            $('#error').modal('open');
            var refreshIntervalId = setInterval(function () {
                $('#error').modal('close');
                $('#formulario')[0].reset();
                clearInterval(refreshIntervalId);
            }, 1500);
        }
    });
});
