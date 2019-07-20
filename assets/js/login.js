/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$("#btnLogin").click(function () {
    var login = $("input[name=login]").val();
    var senha = $("input[name=senha]").val();

    $.ajax({
        url: "login.php",
        type: 'POST',
        data: {
            login: login,
            senha: senha
        }, success: function (data, textStatus, jqXHR) {
            data = $.parseJSON(data);
            if (data.data == 'success') {
                window.location = 'admin.php';
            } else {
                swal(
                        'Ops..',
                        'Login ou senha inválidos!',
                        'error'
                        )
            }
        }
    });

});


$("input[name=login], input[name=senha]").keyup(function (e) {
    if (e.keyCode == 13) {
        $("#btnLogin").trigger("click");
    }
});