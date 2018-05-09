<!-- FUNCIONÁRIO -->
<div class="animated fadeIn">
  <div class="row" >
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Editar informações de funcionário</strong>
        </div>
        <div class="card-body">

          <form action="<?php site_url('funcionario/edit'.$id); ?>" method="POST" class="form-horizontal">
            <div class="row form-group">
              <div class="col col-md-3"><label class=" form-control-label">Nome</label></div>
              <div class="col-12 col-md-9"><input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($funcionario[0]->nome)?>" title="Campo obrigatório" required></div>
            </div> <!-- FIM NOME -->
            <div class="row form-group">
              <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
              <div class="col-12 col-md-9"><input type="text" id="email" name="email" value="<?= htmlspecialchars($funcionario[0]->email)?>" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,6}$" title="Digite um e-mail válido" required></div>
            </div> <!-- FIM EMAIL -->
            <div class="row form-group">
              <div class="col col-md-3"><label class=" form-control-label">Data de Nascimento</label></div>
              <div class="col-12 col-md-9"><input type="date" id="data_nascimento" name="data_nascimento" value="<?= htmlspecialchars($funcionario[0]->data_nascimento)?>" class="form-control" required></div>
            </div> <!-- DATA DE NASCIMENTO -->
            <div class="row form-group">
              <div class="col col-md-3"><label class=" form-control-label">Sexo</label></div>
              <div class="col-12 col-md-9">
                <input type="radio" name="sexo" id="sexo_masc" value="0" <?php echo ($funcionario[0]->sexo=='0')?'checked':'' ?> /><label for="sexo_masc">Masculino</label>
                <input type="radio" name="sexo" id="sexo_fem" value="1" <?php echo ($funcionario[0]->sexo=='1')?'checked':'' ?> /><label for="sexo_fem">Feminino</label></div>
              </div> <!-- FIM SEXO -->
              <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">CPF</label></div>
                <div class="col-12 col-md-9"><input type="text" id="cpf" name="cpf" value="<?= htmlspecialchars($funcionario[0]->numero_documento)?>" class="form-control" pattern="[0-9]{11}" title="O CPF deve conter 11 dígitos decimais" ></div>
              </div> <!-- FIM CPF -->
              <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Telefone</label></div>
                <div class="col-12 col-md-9"><input type="text" id="telefone" name="tel" value="<?= htmlspecialchars($funcionario[0]->telefone)?>" class="form-control" pattern="[0-9]{11}" title="Insira um número válido de telefone" ></div>
              </div> <!-- FIM TELEFONE -->

              <!-- INÍCIO ENDEREÇO -->

              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="estado">Estado</label></div>
                  <div class="col-12 col-md-9">
                    <select name="estado" id="estado" class="form-control">
                      <?php foreach($estados as $estado): ?>
                        <option value="<?php echo $estado->id_estado; ?>"><?php echo $estado->nome; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div> <!-- FIM ESTADO -->
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="cidade">Cidade</label></div>
                    <div class="col-12 col-md-9">
                      <select name="cidade" id="cidade" class="form-control">
                        <?php foreach($cidades as $cidade): ?>
                          <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->nome; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div> <!-- FIM CIDADE -->
                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Endereço</label></div>
                    <div class="col-12 col-md-9"><input type="logradouro" id="logradouro" name="logradouro"  value="<?= htmlspecialchars($funcionario[0]->logradouro)?>"  placeholder="Rua/Av./Praça/Alameda/Travessa" class="form-control" pattern="[A-Za-z]" title="Campo obrigatório" required></div>
                  </div> <!-- FIM ENDEREÇO -->
                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Número</label></div>
                    <div class="col-12 col-md-9"><input type="numero" id="numero" name="numero" value="<?= htmlspecialchars($funcionario[0]->numero_endereco)?>"  placeholder="Número da casa" class="form-control" pattern="[0-9]" title="Campo obrigatório" required></div>
                  </div> <!-- FIM NÚMERO -->
                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Complemento</label></div>
                    <div class="col-12 col-md-9"><input type="complemento" id="complemento" name="complemento" value="<?= htmlspecialchars($funcionario[0]->complemento)?>" placeholder="Complemento" class="form-control" title="Campo opcional" ></div>
                  </div> <!-- FIM COMPLEMENTO -->
                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Bairro</label></div>
                    <div class="col-12 col-md-9"><input type="bairro" id="bairro" name="bairro" value="<?= htmlspecialchars($funcionario[0]->bairro)?>"  placeholder="Bairro" class="form-control" title="Campo obrigatório" required></div>
                  </div> <!-- FIM BAIRRO -->
                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">CEP</label></div>
                    <div class="col-12 col-md-9"><input type="cep" id="cep" name="cep" value="<?= htmlspecialchars($funcionario[0]->cep)?>"  placeholder="C.E.P" class="form-control" title="Campo obrigatório" data-mask="00000-000" required></div>
                    <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank" style="padding-left: 15px;">Não sabe o CEP?</a>
                  </div> <!-- FIM CEP -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                      <i class="fa fa-dot-circle-o"></i> Editar
                    </button>
                    <a href="<?= site_url('funcionario')?>" class="btn btn-danger btn-sm">
                      <i class="fa fa-ban"></i> Cancelar
                    </a>
                  </div> <!-- FIM BOTÕES -->
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

      <script src="<?= base_url('assets/js/lib/data-table/datatables.min.js');?>"></script>
      <script src="<?= base_url('assets/js/lib/data-table/dataTables.bootstrap.min.js');?>"></script>
      <script src="<?= base_url('assets/js/lib/data-table/dataTables.buttons.min.js');?>"></script>
      <script src="<?= base_url('assets/js/lib/data-table/buttons.bootstrap.min.js');?>"></script>
      <script src="<?= base_url('assets/js/lib/data-table/jszip.min.js');?>"></script>
      <script src="<?= base_url('assets/js/lib/data-table/pdfmake.min.js');?>"></script>
      <script src="<?= base_url('assets/js/lib/data-table/vfs_fonts.js');?>"></script>
      <script src="<?= base_url('assets/js/lib/data-table/buttons.html5.min.js');?>"></script>
      <script src="<?= base_url('assets/js/lib/data-table/buttons.print.min.js');?>"></script>
      <script src="<?= base_url('assets/js/lib/data-table/buttons.colVis.min.js');?>"></script>
      <script src="<?= base_url('assets/js/lib/data-table/datatables-init.js');?>"></script>

      <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
      </script>
