<div class="row" >
  <div class="col-md-12">
    <?php if ($this->session->flashdata('success')) : ?>
      <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?>
      </div>
    <?php elseif ($this->session->flashdata('danger')) : ?>
      <div class="alert alert-danger">
        <span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger');?>
      </div>
    <?php endif; ?>

    <div class="card">
      <div class="card-header">
        <strong class="card-title">Setores</strong>
      </div>

      <div class="card-body">

        <a href="<?= site_url('setor/cadastrar')?>" class="btn btn-primary btn-sm" title="Cadastrar setor">
          <i class="fa fa-check"></i> Cadastrar
        </a><br />
        <br />

        <table id="setorTable" class="table table-striped table-bordered datatable">
          <thead>
            <tr>
              <!-- <th class="text-center">ID</th> -->
              <th class="text-center">Nome</th>
              <th class="text-center">Opções</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($setores as $setor): ?>
            <tr>
              <!-- <td class="text-center"><?= $setor->id_setor; ?></td> -->
              <td class="text-center"><?= $setor->nome; ?></td>
              <td class="text-center">
                <a title="Editar setor" href="<?= site_url('setor/editar/'.$setor->id_setor)?>" class="btn btn-primary">
                  <span class="fa fa-edit"></span>
                </a>
                <button data-href="<?= site_url('setor/excluir/'.$setor->id_setor)?>"  class="btn bg-danger text-white" data-toggle="modal" data-target="#modalRemover" title="Excluir setor">
                  <i class="fa fa-times"></i>
                </button>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade" id="modalRemover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Excluir Setor</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              Deseja realmente excluir esse Setor?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secundary" data-dismiss="modal">
                  Cancelar
              </button>
              <a href="#" class="btn btn-primary btn-remove-ok">
                  Confirmar
              </a>
          </div>
      </div>
  </div>
</div>
