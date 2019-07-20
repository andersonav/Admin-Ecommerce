<input type="hidden" id="pagina_atual" value="gerenciarFolga">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">dashboard</i>
                </div>
                <h4 class="card-title">Gerenciamento de Folga dos Funcionários</h4>
                <!--<h4 class="card-title mt-0">Gerenciar Clientes</h4>-->
            </div>
            <br>
            <div class="row" style="margin: 0 auto; width: 50% !important;">
                <div class="select">
                    <select class="" id="selectFucionarios">
                        <option value="" disabled selected>Escolha sua opção</option>
                    </select>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <tr>
                                <th class="text-center">Dia</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" title="Adicionar" id="adicionarHorarioPerson">
                        Adicionar folga
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddFolga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="col s12"  id="formAddFolga" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Funcionários</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="funIdenticador" id="funIdenticador">
                    <div class="form-group bmd-form-group">
                        <input id="folgadata" name="dataFolga" type="date" required class="form-control datepicker">
                        <label for="folgadata" class="active">Data de folga</label>
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
<script src="load/js/gerenciarFolga.js"></script>
<script src="load/js/operacao.js"></script>
