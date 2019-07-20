<input type="hidden" id="pagina_atual" value="adicionarFuncionario">
<div class="row">
    <div class="col-md-12">
        <form class="col s12"  id="formulario" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="adicionar-funcionario">
            <div class="card ">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">person</i>
                    </div>
                    <h4 class="card-title">Adicionar Funcionário</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group">
                        <input id="nome" name="nome" class="form-control" type="text" placeholder="-" data-length="200" maxlength="200">
                        <label for="nome" class="active">Nome do funcionario</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="cor" name="cor" class="form-control" type="text" placeholder="-" data-length="200" maxlength="200">
                        <label for="cor" class="active">Cor em Inglês ou Hexadecimal</label>
                    </div>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div>
                            <span class="btn btn-primary btn-round btn-file">
                                <input type="hidden"><input type="file" name="arquivo">
                                <div class="ripple-container"></div></span>
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
<script src="load/js/paginacao.js"></script>
<script src="load/js/functions.js"></script>
<script src="load/js/adicionarFuncionario.js"></script>
<script src="load/js/operacao.js"></script>
