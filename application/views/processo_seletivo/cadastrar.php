<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Cadastrar Processo Seletivo</strong>
            </div>
            <?php echo validation_errors(); ?>
            <form id="form_processo_seletivo" action="<?php echo site_url('processo_seletivo/cadastrar'); ?>" method="POST">
                <div class="card-body card-block">
                    <?php if(is_null($funcionarios)): ?>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-12">
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                                    Não existe funcionário cadastrado no sistema, favor cadastre um funcionário!
                                </div>
                                <a title="Nova vaga" href="<?= site_url('funcionario/cadastrar')?>" class="btn btn-primary btn-sm float-right">
                                    <i class="fa fa-check"></i>
                                    Novo funcionário
                                </a>
                            </div>
                        </div>
                    <?php elseif(sizeof($vagas) <= 0): ?>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-12">
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                                    Não existe vaga cadastrada no sistema, favor cadastre uma vaga!
                                </div>
                                <a title="Nova vaga" href="<?= site_url('vaga/cadastrar')?>" class="btn btn-primary btn-sm float-right">
                                    <i class="fa fa-check"></i>
                                    Nova vaga
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
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
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label"><red>*</red>Código</label>
                                <input type="text" id="codigo" name="codigo" placeholder="Código do processo seletivo" class="form-control" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label"><red>*</red>Nome</label>
                                <input type="text" id="nome" name="nome" placeholder="Nome do processo seletivo" class="form-control" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label"><red>*</red>Data de início</label>
                                <input type="text" id="data_inicio" name="data_inicio" placeholder="00/00/0000" class="form-control data">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class=" form-control-label"><red>*</red>Data de término</label>
                                <input type="text" id="data_fim" name="data_fim" placeholder="00/00/0000" class="form-control data">
                            </div>
                            <div class="form-group col-12">
                                <label class=" form-control-label"><red>*</red>Vaga</label>
                                <select class="form-control" name="id_vaga">
                                    <option value="">Selecionar vaga</option>
                                    <?php foreach ($vagas as $vaga): ?>
                                        <option value="<?php echo $vaga->id_vaga ?>"><?php echo $vaga->cargo; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class=" form-control-label"><red>*</red>Responsável</label>
                                <select class="form-control" name="id_usuario">
                                    <option value="">Selecionar um responsável</option>
                                    <?php foreach ($funcionarios as $funcionario): ?>
                                        <option value="<?php echo $funcionario->id_funcionario ?>"><?php echo $funcionario->nome; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class=" form-control-label"><red>*</red>Descrição</label>
                                <textarea auto-resize placeholder="Descrição do processo seletivo" id="descricao" name="descricao" class="form-control" required></textarea>
                                <span class="invalid-feedback" id="invalid-descricao">
                                    Campo obrigatório
                                </span>
                            </div>
                            <div class="form-group col-12">
                                <div id="newlink">
                                    <label class=" form-control-label">Etapas</label>
                                    <!-- Aqui vai o template -->
                                </div>
                            </div>
                        </div>
                        <a title="Adicionar Nova Etapa" id="addnew" class="btn btn-primary text-white btn-sm addDiv">
                            <i class="fa fa-plus"></i> Adicionar Etapa </a>
                        </div>
                        <div class="card-footer text-right">
                            <a title="Cancelar Cadastro" href="<?=site_url('processo_seletivo')?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-times"></i>
                                    Cancelar
                            </a>
                            <button title="Cadastrar Processo" type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i>
                                    Cadastrar
                            </button>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>
