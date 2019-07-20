<input type="hidden" id="pagina_atual" value="adicionarProduto">
<div class="row">
    <div class="col-md-12">
        <form class="col s12" id="formulario" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="adicionar-produto">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">add_circle</i>
                    </div>
                    <h4 class="card-title">Adicionar Produtos</h4>
                </div>
                <div class="card-body ">
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
                        <textarea id="form7" class="md-textarea form-control" rows="3" required name="descricao"></textarea>
                        <label for="form7" class="active">Descrição do Produto</label>
                    </div>

                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div>
                            <span class="btn btn-primary btn-round btn-file">
                                <input type="hidden"><input type="file" name="arquivo" required>
                                <div class="ripple-container"></div>
                            </span>
                            <!--<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>-->
                        </div>
                    </div>

                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-fill btn-primary">Cadastrar</button>
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
<script src="load/js/paginacao.js"></script>
<script src="load/js/functions.js"></script>
<script src="load/js/adicionarProduto.js"></script>
<script src="load/js/operacao.js"></script>