  <!-- <pre>
  <?php print_r((array)$setor[0]->nome); ?>
  </pre> -->
<div class="row justify-content-center align-items-center">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header">
        <strong>Edição de setores</strong>
      </div>
      <div class="col-md-8">
        <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success">
          <span class="glyphicon glyphicon-ok-sign"></span><?= $this->session->flashdata('success');?>
        </div>
        <?php elseif ($this->session->flashdata('danger')) : ?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-remove-sign"></span><?= $this->session->flashdata('danger');?>
        </div>
        <?php endif;?>
      </div>
      <form action="<?php site_url('setor/editar'.$id_setor); ?>" method="POST" class="form-horizontal">
        <div class="card-body">    
          <div class="row justify-content-center">
            <div class="form-group col-8">
              <label class="control-label">Nome do Setor</label>
              <input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($setor[0]->nome)?>" value = "<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" required>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <a href="<?= site_url('setor')?>" class="btn btn-danger">
            <i class="fa fa-times"></i> Cancelar
          </a>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarSetor">
            <i class="fa fa-pencil-square-o"></i> Editar
          </button>
                </div>
                <div class="modal fade" id="editarSetor" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Setor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deseja realmente alterar esse Setor?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secundary" data-dismiss="modal">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Editar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>