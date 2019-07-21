<input type="hidden" id="pagina_atual" value="gerenciarProduto">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">dashboard</i>
                </div>
                <h4 class="card-title">Gerenciamento de Produtos</h4>
                <!--<h4 class="card-title mt-0">Gerenciar Clientes</h4>-->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Estoque</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Categoria</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Editar Produtos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="action" value="editar-produto">
                    <input type="hidden" name="id" id="id">
                    <img src="" id="imagemProduto" />
                    <div class="form-group bmd-form-group">
                        <input id="nome" name="nome" class="form-control" type="text" required placeholder="-" data-length="200" maxlength="200">
                        <label for="nome" class="active">Nome do Produto</label>
                    </div>
                    <div class="form-group">
                        <label style="float:left;">Selecione uma categoria</label>
                        <select class="form-control" id="categoria" name="categoria" required>
                            <option value="">Selecione uma opção</option>
                        </select>
                    </div>
                    <br />
                    <div class="form-group bmd-form-group">
                        <input id="quantidade" name="quantidade" class="form-control" required type="text" placeholder="-" data-length="200" maxlength="200">
                        <label for="quantidade" class="active">Quantidade em Estoque</label>
                    </div>
                    <br />
                    <div class="form-group bmd-form-group">
                        <input id="valor" name="valor" class="form-control" type="text" required placeholder="-" maxlength="10" pattern="[0-9.]*">
                        <label for="valor" class="active">Valor Unitário</label>
                    </div>
                    <br />
                    <div class="form-group bmd-form-group">
                        <textarea id="descricao" class="md-textarea form-control" rows="3" required name="descricao"></textarea>
                        <label for="descricao" class="active">Descrição do Produto</label>
                    </div>

                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div>
                            <span class="btn btn-primary btn-round btn-file">
                                <input type="hidden"><input type="file" name="arquivo">
                                <div class="ripple-container"></div>
                            </span>
                            <!--<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>-->
                        </div>
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

<script src="load/js/jquery.maskMoney.min.js"></script>
<script src="load/js/operacao.js"></script>
<script src="load/js/paginacao.js"></script>
<script src="load/js/functions.js"></script>
<script src="load/js/gerenciarProduto.js"></script>
