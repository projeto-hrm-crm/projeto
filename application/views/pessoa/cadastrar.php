<div class="card">
  <div class="card-header">
    <strong>Cadastro</strong> Pessoa
  </div>
  <form action="<?php echo base_url() ?>cadastrar/pessoa" method="post">
    <div class="card-body card-block">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="form-group">
              <div class="form-check">
                <div class="radio">
                  <label for="ck-pf" class="form-check-label ">
                    <input type="radio" id="ck-pf" name="tipo_pessoa" value="pf" class="form-check-input" checked> Pessoa Fisica
                  </label>
                </div>
                <div class="radio">
                  <label for="ck-pj" class="form-check-label ">
                    <input type="radio" id="ck-pj" name="tipo_pessoa" value="pj" class="form-check-input"> Pessoa Juridica
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="form-group">
              <input type="text" name="nome" placeholder="Nome" class="form-control">
            </div>
            <div class="form-group">
              <input type="email" name="email" placeholder="email@exemplo.com" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="telefone" placeholder="Telefone" class="form-control">
            </div>
            <div class="form-group pf-form">
              <input type="text" name="cpf" placeholder="CPF" class="form-control">
            </div>
            <div class="form-group pj-form hide">
              <input type="text" name="cnpj" placeholder="CNPJ" class="form-control">
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form-group">
              <input type="text" name="cep" placeholder="CEP" class="form-control">
            </div>
            <div class="form-group">
              <label class="form-control-label">Estado</label>
              <select name="estado" class="form-control">
                <option value="" checked>----</option>
                <?php foreach ($estados as $i => $estado): ?>
                  <option value="<?php echo $estado->id_estado ?>"><?php echo $estado->nome; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Cidade</label>
              <select name="cidade" class="form-control">
              </select>
            </div>
            <div class="form-group">
              <input type="text" name="bairro" placeholder="Bairro" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="logradouro" placeholder="Logradouro" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="numero" placeholder="Numero" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" name="complemento" placeholder="Complemento" class="form-control">
            </div>
          </div>
        </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa fa-dot-circle-o"></i> Submit
      </button>
      <button type="reset" class="btn btn-danger btn-sm">
        <i class="fa fa-ban"></i> Reset
      </button>
    </div>
  </form>
</div>
