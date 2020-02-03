<main class="login-form" id="listaEventos">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Eventos Cadastrados
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4 col-lg-4">
                                <select class="form-control" id="selectEvento">
                                    <option selected disabled>Pesquisar Eventos</option>
                                    <option value="0">Hoje</option>
                                    <option value="1">Próximos 5 Dias</option>
                                    <option value="2">Todos</option>
                                </select>
                            </div>

                            <div class="col-md-8 col-lg-8">
                                <div class="btn btn-primary float-right" onclick="mostrarCadastro()"><i class="fas fa-plus"></i> Adicionar Evento</div>
                            </div>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Evento</th>
                                    <th scope="col">Horário Início</th>
                                    <th scope="col">Horário Término</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody class="tabelaEvento">

                            </tbody>
                        </table>
                        <div class="paginacao"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<main class="login-form" id="cadastroEventos">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Cadastro de Eventos
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 col-lg-12">
                                <div class="btn btn-primary float-right" onclick="mostrarLista()"><i class="fas fa-clipboard-list"></i> Mostrar Lista</div>
                            </div>

                        </div>

                        <hr>

                        <div class="row">

                            <div class="form-group col-md-12 col-lg-12">
                                <label>Título</label>
                                <input type="text" class="form-control" id="txtTitulo" placeholder="Título do evento">
                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                <label>Data de Início</label>
                                <input type="text" class="form-control calendario" id="txtDataInicio" placeholder="<?php echo date('Y/m/d'); ?>">
                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                <label>Data de Término</label>
                                <input type="text" class="form-control calendario" id="txtDataTermino" placeholder="<?php echo date('Y/m/d'); ?>">
                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                <label>Hora de Início</label>
                                <input type="text" name="timepicker" class="form-control timepicker" id="txtHoraInicio" placeholder="<?php echo date('H:m:s'); ?>" />
                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                <label>Hora de Término</label>
                                <input type="text" name="timepicker" class="form-control timepicker" id="txtHoraTermino" placeholder="<?php echo date('H:m:s'); ?>" />
                            </div>

                            <div class="form-group col-md-12 col-lg-12">
                                <textarea class="form-control" id="txtDescricao" rows="6" style="resize: none" placeholder="Descrição"></textarea>
                            </div>

                            <div class="form-group col-md-12 col-lg-12">
                                <div class="btn btn-sm btn-primary" onclick="cadastrarEvento()" id="btn_cadastrar_evento">Cadastrar</div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>

<div class="modal fade" id="alterarSenha" tabindex="-1" role="dialog" aria-labelledby="alterarSenha" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recuperar senha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="txt_email_rec" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="txt_email_rec">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn_recuperar_senha">Enviar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="convidarAmigo" tabindex="-1" role="dialog" aria-labelledby="convidarAmigo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Convidar Amigos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 style="font-size:15px;">Digite um email válido para enviar o convite.</h4>
                <div class="form-group">
                    <input type="text" class="form-control" id="txt_email_convidar" placeholder="Ex. murilo@gmail.com">
                    <span id="evento_id" style="display:none;"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn_convidar_amigos">Enviar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detalhesEventos" tabindex="-1" role="dialog" aria-labelledby="detalhesEventos" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="titulo" style="font-size:15px;"></h4>
                <p class="descricao"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alterarEvento" tabindex="-1" role="dialog" aria-labelledby="alterarEvento" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="form-group col-md-12">
                        <label>Título do evento</label>
                        <input type="text" class="form-control" id="txtTitulo_update">
                        <span class="evento_id" style="display:none;"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Data Início</label>
                        <input type="text" class="form-control calendario" id="txtDataInicio_update">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Data Término</label>
                        <input type="text" class="form-control calendario" id="txtDataTermino_update">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Horário de Início</label>
                        <input type="text" class="form-control timepicker" id="txtHoraInicio_update">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Horário de Término</label>
                        <input type="text" class="form-control timepicker" id="txtHoraTermino_update">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Descrição do Evento</label>
                        <textarea class="form-control" id="txtDescricao_update" rows="6" style="resize: none"></textarea>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="btn_alterar_evento()">Enviar</button>
            </div>
        </div>
    </div>
</div>