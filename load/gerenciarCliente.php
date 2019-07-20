<input type="hidden" id="pagina_atual" value="gerenciarCliente">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">dashboard</i>
                </div>
                <h4 class="card-title">Gerenciamento de Clientes</h4>
                <!--<h4 class="card-title mt-0">Gerenciar Clientes</h4>-->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Telefone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">CPF</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Editar Clientes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="action" value="editar-cliente">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group bmd-form-group">
                        <input id="nome" name="nome" class="form-control" type="text" placeholder="-" data-length="200" maxlength="200">
                        <label for="nome" class="active">Nome do cliente</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="email" name="email" class="form-control" type="email" placeholder="-" data-length="200" maxlength="200">
                        <label for="email" class="active">Email</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="telefone" name="telefone" class="form-control" type="tel" placeholder="-" data-length="200" maxlength="200">
                        <label for="telefone" class="active">Telefone do cliente</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="cpf" name="cpf" type="text" class="form-control" placeholder="-" data-length="200" maxlength="200">
                        <label for="cpf" class="active">Cpf do cliente</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="cep" name="cep" type="text" class="form-control" placeholder="-" data-length="200" maxlength="200" onkeyup="getCEP(this);">
                        <label for="cep" class="active">CEP</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="endereco" name="endereco" type="text" class="form-control" placeholder="-" data-length="200" maxlength="200">
                        <label for="endereco" class="active">Endereço</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="numero" name="numero" type="text" class="form-control" placeholder="-" data-length="200" maxlength="200">
                        <label for="numero" class="active">Número</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="cidade" name="cidade" type="text" class="form-control" placeholder="-" data-length="200" maxlength="200">
                        <label for="cidade" class="active">Cidade</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="bairro" name="bairro" type="text" class="form-control" placeholder="-" data-length="200" maxlength="200">
                        <label for="bairro" class="active">Bairro</label>
                    </div>
                    <div class="col s12" style="height: 20px;"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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

<script src="load/js/jquery.maskedinput-1.1.4.pack.js"></script>
<script src="load/js/paginacao.js"></script>
<script src="load/js/functions.js"></script>
<script src="load/js/gerenciarCliente.js"></script>
<script src="load/js/operacao.js"></script>