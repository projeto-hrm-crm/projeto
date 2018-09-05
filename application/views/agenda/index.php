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
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL DE VISUALIZAR EVENTOS-->

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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="button" class="btn btn-primary ocultar-btn">
                        Editar
                    </button>
                </div>
            </div>
            <div class="form">
                <form action="<?php echo base_url('agenda/editar/'); ?>" method="POST">
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="button" class="btn btn-danger edit-btn">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Salver alterações
                        </button>
                    </div>
                </form>

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
            <form action="<?php echo base_url('agenda/cadastrar'); ?>" method="POST">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
