<div class="row justify-content-center align-items-center">
    <div class="col-12">
        <?php if($this->session->flashdata('success')): ?>
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <?php echo $this->session->flashdata('success'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('danger')): ?>
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    <?php echo $this->session->flashdata('danger'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-body">
                <!-- CARREGA O CALENDARIO -->
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>



<!-- MODAL DE CADASTRAR EVENTOS -->
<div class="modal fade" id="cadastrar" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_agenda_cadastrar" action="<?php echo base_url('agenda/cadastrar'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="col-2 control-label float-left">Titulo</label>
                            <div class="col-10">
                                <input type="text" name="titulo" class="form-control" placeholder="Titulo do evento" required>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label class="col-2 control-label float-left">Cor</label>
                            <div class="col-10">
                                <select name="cor" class=" form-control" id="color" required>
                                    <option value="">Selecione</option>
                                    <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                    <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                    <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                    <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                    <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                    <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                    <option style="color:#228B22;" value="#228B22">Verde</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label class="col-2 control-label float-left">Inicio</label>
                            <div class="col-6">
                                <input id="inicio" name="inicio" type="text" class="form-control data" required>
                            </div>
                            <div class="col-4">
                                <input id="horaInicio" name="horaInicio" type="time" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label class="col-2 control-label float-left">Fim</label>
                            <div class="col-6">
                                <input id="fim" name="fim" type="text" class="form-control data" required>
                            </div>
                            <div class="col-4">
                                <input id="horaFim" name="horaFim" type="time" class="form-control" required>
                            </div>
                        </div>
                        <div id="compartilhar" class="form-group col-12" hidden>
                            <label class="col-12 control-label float-left">Compartilhar com</label>
                            <div class="col-12">
                                <select class="calendar_users" name="id_usuario[]" multiple>
                                  <?php foreach ($usuarios as $usuario): ?>
                                    <option value="<?php echo $usuario->id_usuario; ?>" <?php echo isset($old_data['id_usuario']) && ($usuario->id_usuario == $old_data['id_usuario']) ? 'selected' : '' ?>>
                                      <?php echo $usuario->nome; ?>
                                    </option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="row">
                        <div class="col-4">
                            <button type="button" class="btn btn-warning compartilhar">
                                Compartilhar
                            </button>
                        </div>
                        <div class="col-8 text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Cadastrar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- MODAL DE VISUALIZAR, EDITAR E EXCLUIR EVENTOS-->
<div class="modal fade" id="visualizar" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dados do evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="visualizar">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <div class="col-2">
                                <label><strong>Titulo: </strong></label>
                            </div>
                            <label id="title"></label>
                        </div>
                        <div class="form-group col-12">
                            <div class="col-2">
                                <label><strong>Inicio: </strong></label>
                            </div>
                            <label id="start"></label>
                            <label class="ml-2 mr-2"><strong>às:</strong></label>
                            <label id="startHour"></label>
                        </div>
                        <div class="form-group col-12">
                            <div class="col-2">
                                <label><strong>Fim: </strong></label>
                            </div>
                            <label id="end"></label>
                            <label class="ml-2 mr-2"><strong>às:</strong></label>
                            <label id="endHour"></label>
                        </div>
                        <div class="form-group col-12">
                            <label class="col-12 label_compartilhado"><strong>Compartilhado com</strong></label>
                            <div class="col-12 compartilhado_com"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="row">
                        <div class="col-4">
                            <button type="button" class="btn btn-danger ocultar-btn-delete">
                                Excluir
                            </button>
                        </div>
                        <div class="col-8">
                            <button type="button" class="btn btn-primary ocultar-btn float-right ml-2">
                                Editar
                            </button>
                            <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="editar">
                <form id="form_agenda_editar" action="<?php echo base_url('agenda/editar/'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="col-2 control-label float-left">Titulo</label>
                                <div class="col-10">
                                    <input id="title" type="text" name="titulo" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label class="col-2 control-label float-left">Cor</label>
                                <div class="col-10">
                                    <select id="color" name="cor" class=" form-control" required>
                                        <option value="">Selecione</option>
                                        <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                        <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                        <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                        <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                        <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                        <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                        <option style="color:#228B22;" value="#228B22">Verde</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label class="col-2 control-label float-left">Inicio</label>
                                <div class="col-6">
                                    <input id="start" name="inicio" type="text" class="form-control data" required>
                                </div>
                                <div class="col-4">
                                    <input id="startHour" name="horaInicio" type="time" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label class="col-2 control-label float-left">Fim</label>
                                <div class="col-6">
                                    <input id="end" name="fim" type="text" class="form-control data" required>
                                </div>
                                <div class="col-4">
                                    <input id="endHour" name="horaFim" type="time" class="form-control" required>
                                </div>
                            </div>
                            <input id="id" name="id" type="hidden" class="form-control" required>
                            <div id="shared_edit" class="form-group col-12 shared_edit">
                                <label class="col-12 control-label float-left">Compartilhar com</label>
                                <div class="col-12">
                                    <select id="usuarios" class="calendar_users" name="id_usuario[]" multiple>
                                      <?php foreach ($usuarios as $usuario): ?>
                                        <option value="<?php echo $usuario->id_usuario; ?>" <?php echo isset($old_data['id_usuario']) && ($usuario->id_usuario == $old_data['id_usuario']) ? 'selected' : '' ?>>
                                          <?php echo $usuario->nome; ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row">
                            <div class="col-4">
                                <button type="button" class="btn btn-warning shared_edit">
                                    Compartilhar
                                </button>
                            </div>
                            <div class="col-8 text-right">
                                <button type="button" name="button" class="btn btn-danger edit-btn">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Salver alterações
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="excluir">
                <form action="<?php echo base_url('agenda/excluir/'); ?>" method="POST">
                    <div class="modal-body">
                        Deseja realmente excluir esse evento?
                        <input id="id" name="id" type="hidden" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="button" class="btn btn-danger delete-btn">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Confirmar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- ALTERAR DATA DO EVENTO AO SOLTAR -->
<div class="modal fade" id="drop" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alterar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="get">
                <div class="modal-body">
                    Deseja realmente alterar esse evento?
                    <input id="id" name="id" type="hidden" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button id="cancelar" type="button" name="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                    <button id="confirmar" type="submit" class="btn btn-primary">
                        Confirmar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
