<div class="row justify-content-center align-items-center">
   <div class="col-lg-8">
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
        <form action="<?php site_url('fornecedor/edit'.$id); ?>" method="POST" class="form-horizontal">
      <div class="card-body card-block">
      <div class="row">
       
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Nome" value="<?= htmlspecialchars($fornecedor[0]->nome)?>" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                 <span class="invalid-feedback">Nome inválido.</span>
              </div>

             <div class="form-group col-12 col-md-6">
                <label for="email-input" class=" form-control-label">E-mail</label>
                <input type="email" id="email" name="email" placeholder="e-mail" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->email)?>" required>
              </div>

             <div class="form-group col-12 col-md-4">
                <label class=" form-control-label">Razão Social</label>
                <input type="text" id="razao_social" name="razao_social" placeholder="Razão Social" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->razao_social)?>" required>
              </div>

              <div class="form-group col col-md-4">
                 <label class=" form-control-label">CNPJ</label>
                  <input type="text" id="cnpj" name="cnpj" placeholder="CNPJ" class="form-control" value="<?= htmlspecialchars($fornecedor[0]->cnpj)?>" required>
              </div>

             <div class="col-12 col-md-4">
                <label class=" form-control-label">Telefone</label>
                <input type="text" id="telefone" name="telefone" placeholder="(12)3889-9090" class="form-control telefone" maxlength="15"  value="<?= htmlspecialchars($fornecedor[0]->telefone)?>" required>
            </div>

         <div class="col-12 col-md-12 ">
            <br />
            <strong>Endereço</strong><br />
            <br />
         </div>


         <div class="form-group col-12 col-md-3"><label class=" form-control-label">CEP</label><input type="num" id="cep" name="cep" placeholder="CEP" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->cep)?>" required></div>

          <div class="form-group col-12 col-md-3"><label class=" form-control-label">Estado</label><input type="text" id="estado" name="estado" placeholder="São Paulo" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->id_cidade)?>" required></div>

          <div class="form-group col-12 col-md-3"><label class=" form-control-label">Cidade</label><input type="text" id="cidade" name="cidade" placeholder="Caraguatuba" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->id_cidade)?>" required></div>

         <div class="form-group col-12 col-md-3"><label class=" form-control-label">Bairro</label><input type="text" id="bairro" name="bairro" placeholder="Bairro" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->bairro)?>" required></div>

         <div class="form-group col-12 col-md-4"><label class=" form-control-label">Número</label><input type="num" id="numero" name="numero" placeholder="" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->numero)?>" required></div>

         <div class="form-group col-12 col-md-4"><label class=" form-control-label">Logradouro</label><input type="text" id="logradouro" name="logradouro" placeholder="Logradour" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->logradouro)?>" required></div>

         <div class="form-group col-12 col-md-4"><label class=" form-control-label">Complemento</label><input type="text" id="complemento" name="complemento" placeholder="complemento" class="form-control"  value="<?= htmlspecialchars($fornecedor[0]->complemento)?>" required></div>
           
           
           
           
       
          
        
      </div>
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

