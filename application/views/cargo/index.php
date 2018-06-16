    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php if($this->session->flashdata('success')): ?>
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-2">
                            <?php echo $this->session->flashdata('success'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('danger')): ?>
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                            <?php echo $this->session->flashdata('danger'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Cargos</strong>
                    </div>
                    <div class="card-body">
                        <a title="Cadastrar Novo Cargo" href="<?= site_url('cargo/cadastrar')?>" class="btn btn-primary btn-sm">
                            <i class="fa fa-check"></i>
                            Novo Cadastro
                        </a><br/><br/>
                        <table class="table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Descrição</th>
                                    <th class="text-center">Salário por hora</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($cargos)): ?>
                                    <?php foreach($cargos as $cargo): ?>
                                        <tr>
                                            <td><?= $cargo->nome;?></td>
                                            <td><?= $cargo->descricao;?></td>
                                            <td><?= $cargo->salario;?></td>
                                            <td class="text-center">
                                                <a title="Editar Cargo" href="<?php echo base_url() ?>cargo/editar/<?php echo $cargo->id_cargo?>" class="btn btn-primary">
                                                    <span class="fa fa-pencil-square-o "></span>
                                                </a>
                                                <button data-href="cargo/excluir/<?php echo $cargo->id_cargo?>" class="btn btn-danger" title="Excluir Cargo" data-toggle="modal" data-target="#modalRemover">
                                                    <span class="fa fa-times"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRemover" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Cargo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja Realmente Excluir Esse Cargo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Cancelar
                </button>
                <a href="#" class="btn btn-primary btn-remove-ok">
                    Confirmar
                </a>
            </div>
        </div>
    </div>
</div>
