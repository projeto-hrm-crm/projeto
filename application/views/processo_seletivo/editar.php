<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Atualizar Processo Seletivo <?php echo($processo_seletivo[0]->codigo) ?></strong>
            </div>
            <div class="row" style="margin-top: 5px;">
                <div class="col-md-12">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success">
                            <p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>
                        </div>
                    <?php elseif ($this->session->flashdata('danger')) : ?>
                        <div class="alert alert-danger">
                            <p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <form action="<?php echo site_url('processo_seletivo/editar/'.$processo_seletivo[0]->id_processo_seletivo); ?>" method="POST" id="form_processo_seletivo" >
                <div class="card-body card-block">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>Codigo</label>
                            <input type="text" id="codigo" name="codigo" placeholder="Codigo do Processo" class="form-control" value="<?php echo($processo_seletivo[0]->codigo); ?>" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>Nome</label>
                            <input type="text" id="nome" name="nome" placeholder="Nome" class="form-control" value="<?php echo($processo_seletivo[0]->nome); ?>" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>Data de Inicio</label>
                            <input type="text" id="data_inicio" name="data_inicio" placeholder="Data de Inicio" class="form-control data" value="<?php echo($processo_seletivo[0]->data_inicio); ?>">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class=" form-control-label"><red>*</red>Data de Término</label>
                            <input type="text" id="data_fim" name="data_fim" placeholder="Data de Término" class="form-control data" value="<?php echo($processo_seletivo[0]->data_fim); ?>">
                        </div>
                        <div class="form-group col-12">
                            <label class=" form-control-label"><red>*</red>Vaga</label>
                            <select class="form-control" name="id_vaga">
                                <?php foreach ($vagas as $vaga): ?>
                                    <option value="<?php echo $vaga->id_vaga ?>"><?php echo $vaga->cargo; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="form-control-label"><red>*</red>Responsável</label>
                            <select name="id_usuario" class="form-control" id="usuario">
                                <option  disabled selected>Selecione um Responsável</option>
                                <?php var_dump($vagas);?>
                                <?php foreach ($funcionarios as $funcionario): ?>
                                    <option value="<?php echo $funcionario->id_funcionario ?>" <?php if($processo_seletivo[0]->id_usuario == $funcionario->id_funcionario){echo "selected";} ?>><?php echo $funcionario->nome; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label class=" form-control-label"><red>*</red>Descrição do Processo</label>
                            <textarea auto-resize placeholder="Descrição do Processo Seletivo" id="descricao" name="descricao" class="form-control" required><?php echo($processo_seletivo[0]->descricao); ?></textarea>
                            <span class="invalid-feedback" id="invalid-descricao">
                                Campo obrigatório
                            </span>
                        </div>
                        <?php if(isset($etapas[0])) { ?>
                            <?php foreach ($etapas as $etapa): ?>
                                <div class="form-group col-12 cloned-main" id="template1">
                                    <div class="cloned-div">
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="form-control-label">Nome</label>
                                                <input type="text" name="nome_etapa[]" placeholder="Nome da etapa" class="form-control" value="<?php echo $etapa->nome ?>" required>
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="form-control-label mt-2">Descrição</label>
                                                <textarea auto-resize placeholder="Descrição da etapa"  name="descricao_etapa[]" class="form-control" required><?php print_r($etapa->descricao); ?></textarea>
                                            </div>
                                            
                                            <a title="avançarStatus" class="btn btn-success btn-sm mt-2 mb-3 mr-2 text-white procuraStatus" onclick="getStatus(<?php echo $etapa->id_etapa; ?> , <?php echo $etapa->status; ?>)">
                                                <i class="fa fa-arrow-right"></i>Avançar Status
                                            </a>
                                            
                                            <a name="button" class="btn btn-danger btn-sm remDiv mt-2 mb-3 text-white">
                                                <span class="fa fa-times"></span>
                                                Excluir
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php } ?>
                        <div class="form-group col-12">
                            <div id="newlink">
                                <label class=" form-control-label">Etapas</label>
                                <!-- Aqui vai o template -->
                            </div>
                        </div>
                    </div>
                    <a title="Adicionar Nova Etapa" id="addnew" class="btn btn-primary text-white btn-sm addDiv"  href="javascript:add_etapa()">
                        <i class="fa fa-check"></i> Adicionar Etapa </a>
                    </div>
                    <div class="card-footer text-right">
                        <a title="Cancelar Atualização" href="<?=site_url('processo_seletivo')?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                            Cancelar
                        </a>
                        <button title="Atualizar Processo" type="button" class="btn btn-primary text-white btn-sm" data-toggle="modal" data-target="#editarProcesso">
                            <i class="fa fa-check"></i>
                            Atualizar
                        </button>
                    </div><!-- FIM BOTÕES -->
                    <!-- MODAL -->
                    <div class="modal fade" id="editarProcesso" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Atualizar Processo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente atualizar esse processo?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger text-white" data-dismiss="modal">
                                        Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        Confirmar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Template -->
    <div class="form-group col-12 cloned-main" id="template1" style="display:none;">
        <div class="cloned-div">
            <div class="form-row">
                <div class="form-group col-12">
                    <label class="form-control-label">Nome</label>
                    <input type="text" name="nome_etapa[]" placeholder="Nome da etapa" class="form-control" required>
                </div>
                <div class="form-group col-12">
                    <label class="form-control-label mt-2">Descrição</label>
                    <textarea auto-resize placeholder="Descrição da etapa"  name="descricao_etapa[]" class="form-control" required>
                    </textarea>
                </div>
                <a name="button" class="btn btn-danger btn-sm remDiv mt-2 text-white">
                    <span class="fa fa-times"></span>
                    Excluir
                </a>
            </div>
        </div>
    </div>
</div>
