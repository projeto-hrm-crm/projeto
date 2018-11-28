<!-- FUNCIONÁRIO -->
<div class="animated fadeIn">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Cadastrar Funcionário</strong>
        </div>
        <form action="<?php echo site_url('funcionario/cadastrar'); ?>" method="POST" id="form_funcionario" novalidate="novalidate">
          <?php print_r($this->session->flashdata('errors')); ?>
          <div class="card-body">
              <?php if(sizeof($cargos) <= 0): ?>
                  <div class="row justify-content-center align-items-center">
                      <div class="col-12">
                          <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                              Não existe nenhum cargo cadastrado no sistema, favor cadastre um cargo!
                          </div>
                          <a title="Novo cargo" href="<?= site_url('cargo/cadastrar')?>" class="btn btn-primary btn-sm float-right">
                              <i class="fa fa-check"></i>
                              Novo cargo
                          </a>
                      </div>
                  </div>
              <?php else: ?>
            <div class="row">

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><red>*</red>Nome</label>
                <input type="text" id="nome" name="nome" value = "<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" placeholder="Nome completo" class="form-control" required>
                <span class="invalid-feedback"></span>
              </div>

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><red>*</red>E-mail</label>
                <input type="text" id="email" name="email" value="<?php echo isset($old_data['email']) ? $old_data['email'] : null;?>"  placeholder="email@provedor.com" class="form-control" >
                <span class="invalid-feedback"></span>
              </div> <!-- FIM EMAIL -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><red>*</red>Data de Nascimento</label>
                <input type="text" id="data_nacimento" name="data_nacimento" value="<?php echo isset($old_data['data_nascimento']) ? $old_data['data_nascimento'] : null;?>"  placeholder="00/00/0000" class="form-control data">
                <span class="invalid-feedback"></span>
              </div> <!-- FIM DATA DE NASCIMENTO -->

              <div class="form-group col-12 col-md-6">
                <label class="form-control-label" for='sexo'><red>*</red>Sexo</label><br>
                <input type="radio" name="sexo" id="sexo_masc" value="0" <?php echo isset($old_data['sexo']) && $old_data['sexo'] == '0' ? 'checked' : ''?> checked/><label for="sexo_masc">Masculino</label>
                <input type="radio" name="sexo" id="sexo_fem" value="1" <?php echo isset($old_data['sexo']) && $old_data['sexo'] == '1' ? 'checked' : ''?> /><label for="sexo_fem" >Feminino</label>
              </div> <!-- FIM SEXO -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><red>*</red>CPF</label>
                <input type="text" id="cpf" name="cpf" value="<?php echo isset($old_data['cpf']) ? $old_data['cpf'] : null;?>" placeholder="000.000.000-00" class="form-control cpf" >
                <span class="invalid-feedback"></span>
              </div> <!-- FIM CPF -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><red>*</red>Telefone</label>
                <input type="text" id="tel" name="tel"  value="<?php echo isset($old_data['tel']) ? $old_data['tel'] : null;?>" placeholder="(00)00000-0000" class="form-control alter_mask" >
                <span class="invalid-feedback"></span>
              </div> <!-- FIM TELEFONE -->

              <!-- INÍCIO ENDEREÇO -->
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><red>*</red>CEP</label>
                <input type="cep" id="cep" name="cep" value="<?php echo isset($old_data['cep']) ? $old_data['cep'] : null;?>"  placeholder="00000-000" class="form-control cep" required>
                <span class="invalid-feedback"></span>
              </div> <!-- FIM CEP -->

              <div class="form-group col-12 col-md-6">
                <label for="estado"><red>*</red>Estado</label>
                <input type="text" placeholder="Estado" name="estado" id="estado" class="form-control">
                <span class="invalid-feedback"></span>
              </div>

              <div class="form-group col-12 col-md-6">
                <label for="cidade"><red>*</red>Cidade</label>
                <input type="text" placeholder="Cidade" name="cidade" id="cidade" class="form-control">
                <span class="invalid-feedback"></span>
              </div>

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><red>*</red>Bairro</label>
                <input type="bairro" id="bairro" name="bairro" value="<?php echo isset($old_data['bairro']) ? $old_data['bairro'] : null;?>"  placeholder="Bairro" class="form-control" required>
                <span class="invalid-feedback"></span>
              </div> <!-- FIM BAIRRO -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><red>*</red>Endereço</label>
                <input type="logradouro" id="logradouro" name="logradouro"  value="<?php echo isset($old_data['logradouro']) ? $old_data['logradouro'] : null;?>"  placeholder="Nome da rua/av./praça/alameda" class="form-control"  required>
                <span class="invalid-feedback"></span>
              </div>

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label"><red>*</red>Número</label>
                <input type="numero" id="numero" name="numero" value="<?php echo isset($old_data['numero']) ? $old_data['numero'] : null;?>"  placeholder="Número da residência" class="form-control" required>
                <span class="invalid-feedback"></span>
              </div> <!-- FIM NÚMERO -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Complemento</label>
                <input type="complemento" id="complemento" name="complemento" value="<?php echo isset($old_data['complemento']) ? $old_data['complemento'] : null;?>" placeholder="Complemento" class="form-control" >
                <span class="invalid-feedback"></span>
              </div> <!-- FIM COMPLEMENTO -->

            <div class="form-group col-md-6 col-sm-12">
              <label for="id_setor" class="control-label mb-1"><red>*</red>Setor</label>
              <select name="id_setor" id="id_setor" class="form-control">
                <option value="">Selecione Setor</option>
                  <?php foreach ($setores as $setor): ?>
                    <option value="<?php echo $setor->id_setor ?>" <?php echo isset($old_data['id_setor']) && ($setor->id_setor == $old_data['id_setor']) ? 'selected' : '' ?>>
                      <?php echo $setor->nome ?>
                    </option>
                  <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group col-md-6 col-sm-12">
              <label for="id_cargo" class="control-label mb-1"><red>*</red>Cargo</label>
              <select name="id_cargo" id="id_cargo" class="form-control">
                <option value="">Selecione Cargo</option>
                  <?php foreach ($cargos as $cargo): ?>
                    <option value="<?php echo $cargo->id_cargo ?>" <?php echo isset($old_data['id_cargo']) && ($cargo->id_cargo == $old_data['id_cargo']) ? 'selected' : '' ?>>
                      <?php echo $cargo->nome ?>
                    </option>
                  <?php endforeach; ?>
              </select>
            </div>

          </div>

          </div>
          <div class="card-footer text-right">
            <a title="Cancelar Cadastro" href="<?=site_url('funcionario')?>" class="btn btn-danger btn-sm">
              <i class="fa fa-times"></i> Cancelar
            </a>
            <button title="Cadastrar Funcionário" type="submit" class="btn btn-primary btn-sm">
              <i class="fa fa-plus"></i> Cadastrar
            </button>
          </div>
      <?php endif; ?>
        </form>

      </div>
    </div>
  </div>
</div>
