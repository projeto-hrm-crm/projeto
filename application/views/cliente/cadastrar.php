<!-- CLIENTE -->
<div class="animated fadeIn">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Cadastrar Cliente</strong>
        </div>

        <form action="<?php echo site_url('cliente/cadastrar'); ?>" method="POST" id="form_cliente" class="form-horizontal" novalidate="novalidate">

          <div class="card-body card-block">
            <div class="row">

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Nome</label>
                <input type="text" id="nome" name="nome" value = "<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" placeholder="Nome completo" class="form-control" required>
              </div>

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">E-mail</label>
                <input type="text" id="email" name="email" value="<?php echo isset($old_data['email']) ? $old_data['email'] : null;?>"  placeholder="email@provedor.com" class="form-control" >
              </div> <!-- FIM EMAIL -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Data de Nascimento</label>
                <input type="text" id="data_nacimento" name="data_nacimento" value="<?php echo isset($old_data['data_nascimento']) ? $old_data['data_nascimento'] : null;?>"  placeholder="Data de nascimento" class="form-control data">
              </div> <!-- FIM DATA DE NASCIMENTO -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Sexo</label><br>
                <input type="radio" name="sexo" id="sexo_masc" value="0" required /><label for="sexo_masc">Masculino</label>
                <input type="radio" name="sexo" id="sexo_fem" value="1" required /><label for="sexo_fem" >Feminino</label>
              </div> <!-- FIM SEXO -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">CPF</label>
                <input type="text" id="cpf" name="cpf" value="<?php echo isset($old_data['cpf']) ? $old_data['cpf'] : null;?>" placeholder="XXX.XXX.XXX-XX" class="form-control cpf">
              </div> <!-- FIM CPF -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Telefone</label>
                <input type="text" id="tel" name="tel"  value="<?php echo isset($old_data['tel']) ? $old_data['tel'] : null;?>" placeholder="(XX)XXXX-XXXX" class="form-control alter_mask" >
              </div> <!-- FIM TELEFONE -->
              <!-- INÍCIO ENDEREÇO -->
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">CEP</label>
                <input type="cep" id="cep" name="cep" value="<?php echo isset($old_data['cep']) ? $old_data['cep'] : null;?>"  placeholder="C.E.P" class="form-control cep" required>
              </div> <!-- FIM CEP -->

              <div class="form-group col-12 col-md-6">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control">
                  <option value="">Selecionar estado</option>
                  <?php foreach($estados as $estado): ?>
                    <option value="<?php echo $estado->id_estado; ?>"><?php echo $estado->nome; ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group col-12 col-md-6">
                <label for="cidade">Cidade</label>
                <select name="cidade" id="cidade" class="form-control">
                  <option value="">Selecionar cidade</option>
                </select>
              </div>

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Bairro</label>
                <input type="bairro" id="bairro" name="bairro" value="<?php echo isset($old_data['bairro']) ? $old_data['bairro'] : null;?>"  placeholder="Bairro" class="form-control" required>
              </div> <!-- FIM BAIRRO -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Endereço</label>
                <input type="logradouro" id="logradouro" name="logradouro"  value="<?php echo isset($old_data['logradouro']) ? $old_data['logradouro'] : null;?>"  placeholder="Rua/Av./Praça/Alameda/Travessa" class="form-control" required>
              </div> <!-- FIM ENDEREÇO -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Número</label>
                <input type="numero" id="numero" name="numero" value="<?php echo isset($old_data['numero']) ? $old_data['numero'] : null;?>"  placeholder="Número da casa" class="form-control" required>
              </div> <!-- FIM NÚMERO -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Complemento</label>
                <input type="complemento" id="complemento" name="complemento" value="<?php echo isset($old_data['complemento']) ? $old_data['complemento'] : null;?>" placeholder="Complemento" class="form-control">
              </div> <!-- FIM COMPLEMENTO -->

            </div>
            <div title="Cancelar Cadastro"class="card-footer text-right">
              <a href="<?=site_url('cliente')?>" class="btn btn-danger btn-sm">
                <i class="fa fa-times"></i> Cancelar
              </a>
              <button title="Cadastrar Cliente" type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Cadastrar
              </button>
            </div>

          </div>
        </div>
      </form>

    </div>
  </div>
</div>
