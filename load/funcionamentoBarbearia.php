<input type="hidden" id="pagina_atual" value="funcionamentoBarbearia">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">dashboard</i>
                </div>
                <h4 class="card-title">Funcionamento da barbearia</h4>
                <!--<h4 class="card-title mt-0">Gerenciar Clientes</h4>-->
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" id="cardHorarioPadrao">
                        <!--                        <div class="card card-product" data-count="1">
                                                    <div class="card-header card-header-image" data-header-animation="false">
                                                        <a href="#!">
                                                            <img class="img" src="assets/img/capa.jpg" width="40%">
                                                        </a>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-actions text-center">
                                                                                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                                                                    <i class="material-icons">build</i> Fix Header!
                                                                                </button>
                                                                                <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                                                                    <i class="material-icons">art_track</i>
                                                                                </button>
                        
                                                                                <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="Remove">
                                                                                    <i class="material-icons">close</i>
                                                                                </button>
                                                        </div>
                                                        <h4 class="card-title">
                                                            <a href="#pablo">Horário padrão da barbearia</a>
                                                        </h4>
                                                        <div class="card-description">
                                                            Os dias que não estiverem com horário personalizados irão ser marcados com esse horário padrão.
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="price">
                                                            <h4><i class="material-icons">access_time</i> 09:00 ás 16:00</h4>
                                                        </div>
                                                        <div class="stats">
                                                            <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                                                                <i class="material-icons">edit</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>-->
                    </div>
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-hover" id="horariosPersonalizados">
                                <thead class="">
                                    <tr>
                                        <th class="text-center">Dia</th>
                                        <th class="text-center">Hora Inicio</th>
                                        <th class="text-center">Hora Fim</th>
                                        <th class="text-center">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-primary" title="Adicionar" id="adicionarHorarioPerson">
                            Adicionar dia personalizado
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="col s12"  id="updateIntervalo">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Funcionamento padrão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group bmd-form-group">
                        <input id="horaAbrirUp" name="horaAbrirUp" class="form-control" type="time" placeholder="" min="06:00" max="20:00">
                        <label for="horaAbrirUp" class="active">Hora Inicio</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="horaFecharUp" name="horaFecharUp" class="form-control timepicker" type="time" placeholder=""min="06:00" max="20:00">
                        <label for="horaFecharUp" class="active">Hora Fim</label>
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

<div class="modal fade" id="modalAddIntervalo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="col s12"  id="addIntervalo">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar dia personalizado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group bmd-form-group">
                        <input id="dia" name="dia" class="form-control" type="date" placeholder="" data-length="200" maxlength="200">
                        <label for="dia" class="active">Data</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="horaAbrir" name="horaAbrir" class="form-control" type="time" placeholder=""  min="06:00" max="20:00">
                        <label for="horaAbrir" class="active">Hora Inicio</label>
                    </div>
                    <div class="form-group bmd-form-group">
                        <input id="horaFechar" name="horaFechar" class="form-control timepicker" type="time" placeholder="" min="06:00" max="20:00">
                        <label for="horaFechar" class="active">Hora Fim</label>
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
<script src="load/js/paginacao.js"></script>
<script src="load/js/functions.js"></script>
<script src="load/js/funcionamentoBarbearia.js"></script>
<script src="load/js/operacao.js"></script>
