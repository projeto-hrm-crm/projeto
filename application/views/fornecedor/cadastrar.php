<div class="col-lg-6">
  <div class="card">
    <div class="card-header">
      <strong>Cadastro de Fornecedores</strong>
    </div>
    <div class="card-body card-block">
      <form action="<?php echo site_url('fornecedor/create'); ?>" method="POST" class="form-horizontal">
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Nome</label></div>
          <div class="col-12 col-md-9"><input type="text" id="nome" name="nome" placeholder="Nome" class="form-control"></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="email-input" class=" form-control-label">Pessoa Juridica</label></div>
          <div class="col-12 col-md-9"><input type="text" id="id_pessoa_juridica" name="id_pessoa_juridica" placeholder="Pessoa 01" class="form-control"></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">Razão Social</label></div>
          <div class="col-12 col-md-9"><textarea name="razao_social" id="razao_social" rows="9" placeholder="Conteudo..." class="form-control"></textarea></div>
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label class=" form-control-label">CNPJ</label></div>
          <div class="col-12 col-md-9"><input type="text" id="cnpj" name="cnpj" placeholder="CNPJ" class="form-control"></div>
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
