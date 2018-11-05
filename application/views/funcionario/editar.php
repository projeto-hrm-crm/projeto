<!-- FUNCIONÁRIO -->
<div class="row justify-content-center align-items-center">
  <div class="col-lg-10">
    <div class="card">
      <div class="card-header">
        <strong class="card-title">Atualizar Funcionário</strong>
      </div>
      <form action="<?php site_url('funcionario/edit/'.$id); ?>" id_usuario ="<?=$id;?>" method="POST" id="form_funcionario"  class="form-horizontal">
        <div class="card-body card-block">
          <div class="row">
            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Nome</label>
              <input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($funcionario[0]->nome)?>"  required>
            </div> <!-- FIM NOME -->

            <div class="form-group col-12 col-md-6">
              <label for="email-input" class=" form-control-label"><red>*</red>Email</label>
              <input type="text" id="email" name="email" value="<?= htmlspecialchars($funcionario[0]->email)?>" class="form-control" required>
            </div> <!-- FIM EMAIL -->

            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Data de Nascimento</label>
              <input type="text" id="data_nascimento" name="data_nascimento" value="<?= htmlspecialchars(switchDate($funcionario[0]->data_nascimento))?>" class="form-control data" required>
            </div> <!-- DATA DE NASCIMENTO -->

            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Sexo</label><br>
              <input type="radio" name="sexo" id="sexo_masc" value="0" <?php echo ($funcionario[0]->sexo=='0')?'checked':'' ?> /><label for="sexo_masc">Masculino</label>
              <input type="radio" name="sexo" id="sexo_fem" value="1" <?php echo ($funcionario[0]->sexo=='1')?'checked':'' ?> /><label for="sexo_fem">Feminino</label>
            </div> <!-- FIM SEXO -->

            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>CPF</label>
              <input type="text" id="cpf" name="cpf" value="<?= htmlspecialchars($funcionario[0]->numero_documento)?>" class="form-control cpf" >
            </div> <!-- FIM CPF -->

            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Telefone</label>
              <input type="text" id="telefone" name="tel" value="<?= htmlspecialchars($funcionario[0]->telefone)?>" class="form-control alter_mask" >
            </div> <!-- FIM TELEFONE -->

            <!-- INÍCIO ENDEREÇO -->
            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>CEP</label>
              <input type="cep" id="cep" name="cep" value="<?= htmlspecialchars($funcionario[0]->cep)?>"  placeholder="C.E.P" class="form-control cep"  required>
            </div> <!-- FIM CEP -->

            <div class="form-group col-12 col-md-6">
              <label for="estado"><red>*</red>Estado</label>
              <input type="text" name="estado" id="estado" class="form-control" value="<?php echo $funcionario[0]->estado;?>">
            </div>

            <div class="form-group col-12 col-md-6">
              <label for="cidade"><red>*</red>Cidade</label>
              <input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo $funcionario[0]->cidade;?>">
            </div>

            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Bairro</label>
              <input type="bairro" id="bairro" name="bairro" value="<?= htmlspecialchars($funcionario[0]->bairro)?>"  placeholder="Bairro" class="form-control"  required>
            </div> <!-- FIM BAIRRO -->

            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Endereço</label>
              <input type="logradouro" id="logradouro" name="logradouro"  value="<?= htmlspecialchars($funcionario[0]->logradouro)?>"  placeholder="Rua/Av./Praça/Alameda/Travessa" class="form-control"  required>
            </div> <!-- FIM ENDEREÇO -->

            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Número</label>
              <input type="numero" id="numero" name="numero" value="<?= htmlspecialchars($funcionario[0]->numero_endereco)?>"  placeholder="Número da casa" class="form-control"  required>
            </div> <!-- FIM NÚMERO -->

            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label">Complemento</label>
              <input type="complemento" id="complemento" name="complemento" value="<?= htmlspecialchars($funcionario[0]->complemento)?>" placeholder="Complemento" class="form-control" >
            </div> <!-- FIM COMPLEMENTO -->
          <div class="form-group col-lg-6 col-sm-12">
            <label for="id_cargo" class="control-label mb-1"><red>*</red>Cargo</label>
            <select id="id_cargo" name="id_cargo" class="form-control <?php echo isset($errors['id_cargo']) ? 'is-invalid' : '' ?>" required>
              <option value="">Selecione</option>
              <?php foreach ($cargos as $cargo): ?>
                <option value="<?php echo $cargo->id_cargo;?>"
                  <?php echo (isset($old_data['id_cargo']) && ($cargo->id_cargo == $old_data['id_cargo'])) || !isset($errors['id_cargo']) && ($funcionario[0]->id_cargo == $cargo->id_cargo) ? 'selected' : '' ?>>
                  <?php echo $cargo->nome;?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <a title="Cancelar Edição" href="<?= site_url('funcionario')?>" class="btn btn-danger btn-sm">
          <i class="fa fa-times"></i> Cancelar
        </a>
        <button title="Atualizar Funcionário" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editarFuncionario">
          <span class="fa fa-check"></span>
          Atualizar
        </button>
      </div> <!-- FIM BOTÕES -->
      <div class="modal fade" id="editarFuncionario" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Atualizar Funcionário</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <div class="modal-body">
            Deseja Realmente Atualizar Esse Funcionário?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Cancelar
            </button>
            <button type="submit" class="btn btn-primary">
              Confirmar
            </button>
          </div>
        </div>
      </div>
    </div>
</form>
</div>