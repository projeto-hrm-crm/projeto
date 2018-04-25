<!-- CLIENTE -->

<div class="col-lg-6">
  <div class="card">
    <div class="card-header">
      <strong>Cadastro de Cliente</strong>
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

      <form action="<?php echo site_url('cliente/create'); ?>" method="POST" class="form-horizontal">
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Nome</label></div>
          <div class="col-12 col-md-9"><input type="text" id="nome" name="nome" placeholder="Nome" class="form-control" required></div>
        </div> <!-- FIM NOME -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Email</label></div>
          <div class="col-12 col-md-9"><input type="text" id="email" name="email" placeholder="Email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,6}$"></div>
        </div> <!-- FIM EMAIL -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Data de Nascimento</label></div>
          <div class="col-12 col-md-9"><input type="date" id="data_nacimento" name="data_nacimento" placeholder="Data Nascimento" class="form-control"></div>
        </div> <!-- FIM DATA DE NASCIMENTO -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Sexo</label></div>
          <div class="col-12 col-md-9">
            <input type="radio" name="sexo" id="sexo_masc" value="0" required /><label for="sexo_masc">Masculino</label>
            <input type="radio" name="sexo" id="sexo_fem" value="1" required /><label for="sexo_fem" >Feminino</label></div>
        </div> <!-- FIM SEXO -->
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">CPF</label></div>
          <div class="col-12 col-md-9"><input type="text" id="cpf" name="cpf" placeholder="CPF" class="form-control" pattern="[0-9]{11}" title="O CPF deve conter 11 dígitos decimais"></div>
        </div> <!-- FIM CPF -->
        <div class="card-footer text-left">
          <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Cadastrar
          </button>
          <a href="<?= site_url('cliente')?>" class="btn btn-danger btn-sm">
          <i class="fa fa-ban"></i> Cancelar
          </a>
        </div> <!-- FIM BOTÕES -->
      </form>
    </div>

  </div>
