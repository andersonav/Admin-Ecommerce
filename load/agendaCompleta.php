<input type="hidden" id="pagina_atual" value="agendaCompleta">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">dashboard</i>
                </div>
                <h4 class="card-title">Agenda Completa</h4>
                <!--<h4 class="card-title mt-0">Gerenciar Clientes</h4>-->
            </div>
            <div class="card-body">
                <div class="row" id="coresFuncionarios">
                    
                </div>
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">
                        <div class="card card-calendar">
                            <div class="card-body ">
                                <div id="fullCalendar"></div>
                            </div>
                        </div>
                    </div>
                    <!--                <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="">
                                                <tr>
                                                    <th class="text-center">Nome</th>
                                                    <th class="text-center">Imagem</th>
                                                    <th class="text-center">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
    <script src="load/js/paginacao.js"></script>
    <script src="load/js/functions.js"></script>
    <script src="load/js/agendaCompleta.js"></script>
    <script src="load/js/operacao.js"></script>


    <style>
        .fc-time-grid-event{
            cursor: pointer !important;
        }
        .fc-view-container .fc-content .fc-time, .fc-view-container .fc-content .fc-time:after, .fc-view-container .fc-content .fc-time:before{
            color:white !important;
            font-weight: bold !important;
        }
    </style>
