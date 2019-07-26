<input type="hidden" id="pagina_atual" value="gerenciarVenda">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">dashboard</i>
                </div>
                <h4 class="card-title">Gerenciamento de Vendas</h4>
                <!--<h4 class="card-title mt-0">Gerenciar Clientes</h4>-->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Valor Total</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody id="pedidos">
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
                    <h5 class="modal-title" id="exampleModalLabel">Visualização do pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="">
                                <tr>
                                    <th class="text-center">Produto</th>
                                    <th class="text-center">Quantidade</th>
                                    <th class="text-center">Valor</th>
                                </tr>
                            </thead>
                            <tbody id="produtos">
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col s12" style="height: 20px;"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="load/js/paginacao.js"></script>
<script src="load/js/functions.js"></script>
<script src="load/js/gerenciarVenda.js"></script>
<script src="load/js/operacao.js"></script>