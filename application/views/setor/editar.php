<!-- <pre>
  <?php print_r((array)$setor[0]->nome); ?>
</pre> -->
<div class="col-lg-6">
  <div class="card">
    <div class="card-header">
      <strong>Edição de setores</strong>
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
    <div class="card-body card-block">
      <form action="<?php site_url('setor/update'.$id_setor); ?>" method="POST" class="form-horizontal">
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Nome</label></div>
          <div class="col-12 col-md-9"><input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($setor[0]->nome)?>"></div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Enviar
          </button>
          <a href="<?= site_url('setor')?>" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Cancelar
          </a>
        </div>
      </form>
    </div>

  </div>
