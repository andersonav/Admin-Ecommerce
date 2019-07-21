<input type="hidden" id="pagina_atual" value="adicionarCategoria">
<div class="row">
    <div class="col-md-12">
        <form class="col s12" id="formulario" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="adicionar-categoria">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">person</i>
                    </div>
                    <h4 class="card-title">Adicionar Categoria</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group">
                        <input id="nome" name="nome" class="form-control" type="text" placeholder="-" data-length="200" maxlength="200" required>
                        <label for="nome" class="active">Nome da categoria</label>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">Cadastrar</button>
                </div>

            </div>
        </form>
    </div>
</div>
<script src="load/js/paginacao.js"></script>
<script src="load/js/functions.js"></script>
<script src="load/js/operacao.js"></script>