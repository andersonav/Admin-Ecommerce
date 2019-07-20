<input type="hidden" id="pagina_atual" value="gerenciarFuncionario">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">dashboard</i>
                </div>
                <h4 class="card-title">Gerenciamento de Funcionários</h4>
                <!--<h4 class="card-title mt-0">Gerenciar Clientes</h4>-->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Cor</th>
                                <th class="text-center">Imagem</th>
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
        <form class="col s12"  id="formulario" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Funcionários</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="action" value="editar-funcionario">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group bmd-form-group">
                        <input id="nome" name="nome" class="form-control" type="text" placeholder="Digite o nome" data-length="200" maxlength="200">
                        <label for="nome" class="active">Nome do funcionario</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="cor" name="cor" class="form-control" type="text" placeholder="Digite a cor" data-length="200" maxlength="200">
                        <label for="cor" class="active">Cor em inglês ou Hexadecimal</label>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="load/js/paginacao.js"></script>
<script src="load/js/functions.js"></script>
<script src="load/js/gerenciarFuncionario.js"></script>
<script src="load/js/operacao.js"></script>
