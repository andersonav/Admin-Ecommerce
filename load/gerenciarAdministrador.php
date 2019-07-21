<input type="hidden" id="pagina_atual" value="gerenciarAdministrador">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">dashboard</i>
                </div>
                <h4 class="card-title">Gerenciamento de Administradores</h4>
                <!--<h4 class="card-title mt-0">Gerenciar Clientes</h4>-->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="col s12" id="formulario" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Administradores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="action" value="editar-administrador">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group bmd-form-group">
                        <input id="nome" name="nome" class="form-control" type="text" placeholder="-" data-length="200" maxlength="200" required>
                        <label for="nome" class="active">Nome do Administrador</label>
                    </div>
                    <br />
                    <div class="form-group bmd-form-group">
                        <input id="email" name="email" class="form-control" type="email" placeholder="-" data-length="200" maxlength="200" required>
                        <label for="email" class="active">Email</label>
                    </div>
                    <br />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" id="alterarSenha">Alterar Senha</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </div>
        </form>
    </div>
</div>

<div class="modal" id="editarSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="col s12" id="formulario" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titlePasswordAdmin"></h5>
                    <button type="button" class="close" id="fecharModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="action" value="editar-administrador-senha">
                    <input type="hidden" name="idToPass" id="idToPass">
                    <div class="form-group bmd-form-group">
                        <input id="senha" name="senha" class="form-control" type="password" placeholder="-" data-length="200" maxlength="200" required>
                        <label for="senha" class="active">Senha</label>
                    </div>
                    <br />
                    <div class="form-group bmd-form-group">
                        <input id="confirmSenha" name="confirmSenha" class="form-control" type="password" placeholder="-" data-length="200" maxlength="200" required>
                        <label for="confirmSenha" class="active">Confirmação de Senha</label>
                    </div>
                    <br />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="fecharModal2">Fechar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </div>
        </form>
    </div>
</div>
<script>
    jQuery.browser = {};
    (function() {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
</script>

<script src="load/js/jquery.maskMoney.min.js"></script>
<script src="load/js/operacao.js"></script>
<script src="load/js/paginacao.js"></script>
<script src="load/js/functions.js"></script>
<script src="load/js/gerenciarAdministrador.js"></script>