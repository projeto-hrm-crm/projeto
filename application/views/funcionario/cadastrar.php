<!-- FUNCIONÁRIO -->
<div class="animated fadeIn">
  <div class="row justify-content-center align-items-center">
     <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Cadastrar Funcionário</strong>
        </div>
        <div class="card-body">

          <form action="<?php echo site_url('funcionario/create'); ?>" method="POST" class="form-horizontal" novalidate="novalidate">
            <div class="row form-group">
              <div class="col col-md-3"><label class=" form-control-label">Nome</label></div>
              <div class="col-12 col-md-9"><input type="text" id="nome" name="nome" value = "<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" placeholder="Nome completo" class="form-control" title="Campo obrigatório" required></div>
            </div> <!-- FIM NOME -->
            <div class="row form-group">
              <div class="col col-md-3"><label class=" form-control-label">E-mail</label></div>
              <div class="col-12 col-md-9"><input type="text" id="email" name="email" value="<?php echo isset($old_data['email']) ? $old_data['email'] : null;?>"  placeholder="email@provedor.com" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,6}$" title="Digite um e-mail válido"></div>
            </div> <!-- FIM EMAIL -->
            <div class="row form-group">
              <div class="col col-md-3"><label class=" form-control-label">Data de Nascimento</label></div>
              <div class="col-12 col-md-9"><input type="text" id="data_nacimento" name="data_nacimento" value="<?php echo isset($old_data['data_nascimento']) ? $old_data['data_nascimento'] : null;?>"  placeholder="Data de nascimento" class="form-control data"></div>
            </div> <!-- FIM DATA DE NASCIMENTO -->
            <div class="row form-group">
              <div class="col col-md-3"><label class=" form-control-label">Sexo</label></div>
              <div class="col-12 col-md-9">
                <input type="radio" name="sexo" id="sexo_masc" value="0" required /><label for="sexo_masc">Masculino</label>
                <input type="radio" name="sexo" id="sexo_fem" value="1" required /><label for="sexo_fem" >Feminino</label></div>
              </div> <!-- FIM SEXO -->
              <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">CPF</label></div>
                <div class="col-12 col-md-9"><input type="text" id="cpf" name="cpf" value="<?php echo isset($old_data['cpf']) ? $old_data['cpf'] : null;?>" placeholder="XXX.XXX.XXX-XX" class="form-control cpf" title="O CPF deve conter 11 dígitos decimais"></div>
              </div> <!-- FIM CPF -->
              <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Telefone</label></div>
                <div class="col-12 col-md-9"><input type="text" id="tel" name="tel"  value="<?php echo isset($old_data['tel']) ? $old_data['tel'] : null;?>" placeholder="(XX)XXXX-XXXX" class="form-control telefone" pattern="[0-9]{11}" title="Residencial ou celular" ></div>
              </div> <!-- FIM TELEFONE -->
              <!-- INÍCIO ENDEREÇO -->

              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="estado">Estado</label></div>
                  <div class="col-12 col-md-9">
                    <select name="estado" id="estado" class="form-control">
                      <option value="">Selecionar estado</option>
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
                        <option value="">Selecionar cidade</option>
                        <?php foreach($cidades as $cidade): ?>
                          <option value="<?php echo $cidade->id_cidade; ?>"><?php echo $cidade->nome; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div> <!-- FIM CIDADE -->
                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Endereço</label></div>
                    <div class="col-12 col-md-9"><input type="logradouro" id="logradouro" name="logradouro"  value="<?php echo isset($old_data['logradouro']) ? $old_data['logradouro'] : null;?>"  placeholder="Rua/Av./Praça/Alameda/Travessa" class="form-control" pattern="[A-Za-z]" title="Campo obrigatório" required></div>
                  </div> <!-- FIM ENDEREÇO -->
                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Número</label></div>
                    <div class="col-12 col-md-9"><input type="numero" id="numero" name="numero" value="<?php echo isset($old_data['numero']) ? $old_data['numero'] : null;?>"  placeholder="Número da casa" class="form-control" pattern="[0-9]" title="Campo obrigatório" required></div>
                  </div> <!-- FIM NÚMERO -->
                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Complemento</label></div>
                    <div class="col-12 col-md-9"><input type="complemento" id="complemento" name="complemento" value="<?php echo isset($old_data['complemento']) ? $old_data['complemento'] : null;?>" placeholder="Complemento" class="form-control" title="Campo opcional" ></div>
                  </div> <!-- FIM COMPLEMENTO -->
                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Bairro</label></div>
                    <div class="col-12 col-md-9"><input type="bairro" id="bairro" name="bairro" value="<?php echo isset($old_data['bairro']) ? $old_data['bairro'] : null;?>"  placeholder="Bairro" class="form-control" title="Campo obrigatório" required></div>
                  </div> <!-- FIM BAIRRO -->
                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">CEP</label></div>
                    <div class="col-12 col-md-9"><input type="cep" id="cep" name="cep" value="<?php echo isset($old_data['cep']) ? $old_data['cep'] : null;?>"  placeholder="C.E.P" class="form-control cep" title="Campo obrigatório" required></div>
                    <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank" style="padding-left: 15px;">Não sabe o CEP?</a>
                  </div> <!-- FIM CEP -->

                  <div class="row form-group">
                    <div class="col col-md-3">
                      <label for="cargo">cargos disponíveis</label></div>
                      <div class="col-12 col-md-9">
                        <select name="cargo" id="cargo" class="form-control">
                          <option value="">Selecionar cargo</option>
                          <?php foreach($cargos as $cargo): ?>
                            <option value="<?php echo $cargo->id_cargo; ?>"><?php echo $cargo->nome; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div> <!-- FIM CARGOS -->

                    <div class="card-footer text-left">
                      <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Cadastrar
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
