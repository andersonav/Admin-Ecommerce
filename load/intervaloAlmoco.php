<input type="hidden" id="pagina_atual" value="intervaloAlmoco">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">room_service</i>
                </div>
                <h4 class="card-title">Intervalo de Almoços</h4>
                <!--<h4 class="card-title mt-0">Gerenciar Clientes</h4>-->
            </div>
            <div class="card-body">
                <div class="row" style="margin: 0 auto; width: 50% !important;">
                    <div class="select">
                        <select id="selectBarbeiro">
                            <option disabled="" selected="">Selecione um barbeiro</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <tr>
                                <th class="text-center">Hora Inicio</th>
                                <th class="text-center">Hora Fim</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary adicionarHorarioIntervalo" title="Adicionar" id="" style="display: none">
                        Adicionar intervalo
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddIntervalo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="col s12"  id="formAddIntervalo" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar intervalos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="funIdenticador" id="funIdenticador">
                        <div class="form-group bmd-form-group">
                            <input id="horaInicio" name="horaInicio" type="time" required class="form-control" min="06:00" max="20:00">
                            <label for="horaInicio" class="active">Hora Inicio</label>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group bmd-form-group">
                            <input id="horaFim" name="horaFim" type="time" required class="form-control" min="06:00" max="20:00">
                            <label for="horaFim" class="active">Hora Fim</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEditIntervalo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="col s12"  id="formEditIntervalo" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar intervalos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="funKey" id="funKey">
                        <div class="form-group bmd-form-group">
                            <input id="horaInicioUp" name="horaInicioUp" type="time" required class="form-control" min="06:00" max="20:00">
                            <label for="horaInicioUp" class="active">Hora Inicio</label>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group bmd-form-group">
                            <input id="horaFimUp" name="horaFimUp" type="time" required class="form-control" min="06:00" max="20:00">
                            <label for="horaFimUp" class="active">Hora Fim</label>
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
    <script src="load/js/intervaloAlmoco.js"></script>
    <script src="load/js/operacao.js"></script>
