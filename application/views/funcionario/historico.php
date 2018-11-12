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
                      <div class="col-sm-6">
                        <a href="<?= site_url('remanejamento/cadastrar')?>" class="btn btn-primary btn-sm" title="Cadastrar produto">
                          <i class="fa fa-check"></i> Novo Remanejamento
                        </a>
                      </div>
                      <div class="col-sm-6 text-right">
                        <a href="<?= site_url('remanejamento/relatorio/'.$cargos[0]->id_funcionario)?>" class="btn btn-info btn-sm" title="Relatório">
                          <i class="fa fa-check"></i> Relatório
                        </a>
                      </div>
                      <br><br>
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
