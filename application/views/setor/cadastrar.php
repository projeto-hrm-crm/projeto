<div class="row justify-content-center align-items-center">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header">
        <strong>Cadastro de setor</strong>
      </div>
      <div class="row" style="margin-top: 5px;">
        <div class="col-md-12">
          <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?>
          </div>
          <?php elseif ($this->session->flashdata('danger')) : ?>
          <div class="alert alert-danger">
            <span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <form action="<?php echo site_url('setor/cadastrar'); ?>" method="POST" class="form-horizontal">
        <div class="card-body">    
          <div class="row form-group">
            <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Nome</label>
               
              </div>
            <div class="col-8 col-md-9">
               <input type="text" id="nome" name="nome" value = "<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" placeholder="Nome do setor" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          
          <a href="<?= site_url('setor')?>" class="btn btn-danger btn-sm">
            <i class="fa fa-times"></i> Cancelar
          </a>
          <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Enviar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>  