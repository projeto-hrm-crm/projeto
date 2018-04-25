<!-- <pre>
  <?php print_r((array)$fornecedor[0]->nome); ?>
</pre> -->
<!-- <div class="col-lg-6">
  <div class="card">
    <div class="card-header">
      <strong>Edição de Fornecedores</strong>
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
      <form action="<?php site_url('fornecedor/edit'.$id); ?>" method="POST" class="form-horizontal">
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Nome</label></div>
          <div class="col-12 col-md-9"><input type="text" id="nome" name="nome" placeholder="Nome" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->nome)?>"></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="email-input" class=" form-control-label">E-mail</label></div>
          <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="e-mail" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->email)?>"></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Razão Social</label></div>
          <div class="col-12 col-md-9"><textarea name="razao_social" id="razao_social" rows="9" placeholder="Conteudo..." class="form-control"></textarea></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">CNPJ</label></div>
          <div class="col-12 col-md-9"><input type="text" id="cnpj" name="cnpj" placeholder="CNPJ" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->cnpj)?>"></div>
        </div>
		<div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Telefone</label></div>
          <div class="col-12 col-md-9"><input type="text" id="telefone" name="telefone" placeholder="(12)3889-9090" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->telefone)?>"></div>
        </div>
		<div class="card-header">
			<strong>Endereço</strong>
		</div><br>
		<div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Estado</label></div>
          <div class="col-12 col-md-9"><input type="text" id="estado" name="estado" placeholder="São Paulo" class="form-control"></div>
        </div>
		<div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Cidade</label></div>
          <div class="col-12 col-md-9"><input type="text" id="cidade" name="cidade" placeholder="Caraguatuba" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->id_cidade)?>"></div>
        </div>
		<div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Bairro</label></div>
          <div class="col-12 col-md-9"><input type="text" id="bairro" name="bairro" placeholder="Bairro" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->bairro)?>"></div>
        </div>
		<div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Número</label></div>
          <div class="col-12 col-md-9"><input type="num" id="numero" name="numero" placeholder="CNPJ" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->numero)?>"></div>
    </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Enviar
          </button>
          <a href="<?= site_url('fornecedor')?>" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Cancelar
          </a>
        </div>
      </form>
    </div>
  </div> -->
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <strong>Cadastro de Fornecedores</strong>
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
        <form action="<?php site_url('fornecedor/edit'.$id); ?>" method="POST" class="form-horizontal">
          <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Nome</label></div>
            <div class="col-12 col-md-9"><input type="text" id="nome" name="nome" placeholder="Nome" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->nome)?>"></div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="email-input" class=" form-control-label">E-mail</label></div>
            <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="e-mail" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->email)?>"></div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Razão Social</label></div>
            <div class="col-12 col-md-9"><textarea name="razao_social" id="razao_social" rows="9" placeholder="Conteudo..." class="form-control"></textarea></div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">CNPJ</label></div>
            <div class="col-12 col-md-9"><input type="text" id="cnpj" name="cnpj" placeholder="CNPJ" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->cnpj)?>"></div>
          </div>
  		<div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Telefone</label></div>
            <div class="col-12 col-md-9"><input type="text" id="telefone" name="telefone" placeholder="(12)3889-9090" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->telefone)?>"></div>
          </div>
  		<div class="card-header">
  			<strong>Endereço</strong>
  		</div><br>
      <div class="row form-group">
        <div class="col col-md-3"><label class=" form-control-label">CEP</label></div>
        <div class="col-12 col-md-9"><input type="num" id="cep" name="cep" placeholder="CEP" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->cep)?>"></div>
      </div>
  		<div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Estado</label></div>
            <div class="col-12 col-md-9"><input type="text" id="estado" name="estado" placeholder="São Paulo" class="form-control"></div>
          </div>
  		<div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Cidade</label></div>
            <div class="col-12 col-md-9"><input type="text" id="cidade" name="cidade" placeholder="Caraguatuba" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->id_cidade)?>"></div>
          </div>
  		<div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Bairro</label></div>
            <div class="col-12 col-md-9"><input type="text" id="bairro" name="bairro" placeholder="Bairro" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->bairro)?>"></div>
      </div>
  		<div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Número</label></div>
            <div class="col-12 col-md-9"><input type="num" id="numero" name="numero" placeholder="CNPJ" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->numero)?>"></div>
      </div>
      <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Logradouro</label></div>
            <div class="col-12 col-md-9"><input type="text" id="logradouro" name="logradouro" placeholder="Logradour" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->logradouro)?>"></div>
      </div>
      <div class="row form-group">
        <div class="col col-md-3"><label class=" form-control-label">Complemento</label></div>
        <div class="col-12 col-md-9"><textarea name="complemento" id="complemento" rows="9" placeholder="Complemento..." class="form-control"></textarea></div>
      </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
              <i class="fa fa-dot-circle-o"></i> Enviar
            </button>
            <a href="<?= site_url('fornecedor')?>" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Cancelar
            </a>
          </div>
        </form>
      </div>

    </div>
