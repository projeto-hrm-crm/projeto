<div class="row justify-content-center align-items-center">
    <div class="col-lg-12">
      <?php $this->session->set_userdata('referred_from', current_url());?>
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
                    <strong class="card-title">Remanejamentos</strong>
                </div>
                <div class="card-body">
                    <a href="<?= site_url('remanejamento/cadastrar')?>" class="btn btn-primary btn-sm" title="Cadastrar produto">
                        <i class="fa fa-check"></i> Novo Remanejamento
                    </a><br><br>
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th>Cargo</th>
                                <th>Setor</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($cargos)): ?>
                                <?php foreach($cargos as $cargo): ?>
                                    <tr>
                                        <td><?= $cargo->nome;?></td>
                                        <td><?= $cargo->setor;?></td>
                                        <td><?= (isset($cargo->deletado)?'Desativado':'Ativo');?></td>

                                        <td>

                                          <a title="Atualizar Remanejamento" href="<?=site_url('remanejamento/editar/'.$cargo->id_cargo_funcionario);?>" class="btn btn-primary">
                                                <span class="fa fa-exchange"></span>
                                          </a>
                                          <button data-href="<?=site_url('remanejamento/excluir/'.$cargo->id_cargo_funcionario);?>" class="btn btn-danger" title="Desativar Cargo" data-toggle="modal" data-target="#modalRemover">
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

<div class="modal fade" id="modalRemover" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir remanejamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esse remenejamento?
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
