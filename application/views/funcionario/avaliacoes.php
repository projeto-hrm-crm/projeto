<!-- FUNCIONÁRIO -->
<div class="row justify-content-center align-items-center">
    <div class="col-lg-12">
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
            <strong class="card-title">Avaliações de <?=$funcionario[0]->nome;?></strong>
          </div>
          <div class="card-body">
            <a href="<?= site_url('funcionario/avaliar/'.$id_funcionario)?>" class="btn btn-primary btn-sm" title="Adicionar nova avaliação <?=$funcionario[0]->nome;?>">
              <i class="fa fa-check"></i> Nova Avaliação
            </a><br />
            <br />
            <table id="bootstrap-data-table" class="table table-striped table-bordered datatable">
              <thead>
                <tr>
                  <th class="">Funcionario</th>
                  <th class="text-center" width="25%">Data Avaliação</th>
                  <th class="text-center" width="25%">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!is_null($avaliacoes)): ?>
                    <?php foreach ($avaliacoes as $avaliacao): ?>
                      <tr>
                        <td class=""><?= $avaliacao->nome; ?></td>
                        <td class="text-center">
                          <?php echo switchDate(substr($avaliacao->data_avaliacao, 0, 10))." as ".substr($avaliacao->data_avaliacao, 10, 10);?>
                        </td>
                        <td class="text-center">
                          <a title="Atualizar avaliação" href="<?= site_url('funcionario/avaliacao-editar/'.$avaliacao->id_avaliacao)?>" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                          <a title="Visualizar avaliação" href="<?= site_url('funcionario/avaliacao-info/'.$avaliacao->id_avaliacao)?>" class="btn btn-success"><span class="fa fa-eye"></span></a>
                         </td>
                       </tr>
                     <?php endforeach ?>
                    <?php endif;?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
</div>

   