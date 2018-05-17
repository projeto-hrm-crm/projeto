<!-- CANDIDATO -->
<div class="animated fadeIn">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Editar informações de candidato</strong>
        </div>
        <form action="<?php site_url('candidato/edit'.$id); ?>" method="POST" class="form-horizontal">
          <div class="card-body card-block">
            <div class="row">
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($candidato[0]->nome)?>" title="Campo obrigatório" required>
              </div> <!-- FIM NOME -->
              <div class="form-group col-12 col-md-6">
                <label for="email-input" class=" form-control-label">Email</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($candidato[0]->email)?>" class="form-control" title="Digite um e-mail válido" required>
              </div> <!-- FIM EMAIL -->
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Data de Nascimento</label>
                <input type="text" id="data_nascimento" name="data_nascimento" value="<?= htmlspecialchars($candidato[0]->data_nascimento)?>" class="form-control data" required>
              </div> <!-- DATA DE NASCIMENTO -->
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Sexo</label><br>

                <input type="radio" name="sexo" id="sexo_masc" value="0" <?php echo ($candidato[0]->sexo=='0')?'checked':'' ?> /><label for="sexo_masc">Masculino</label>
                <input type="radio" name="sexo" id="sexo_fem" value="1" <?php echo ($candidato[0]->sexo=='1')?'checked':'' ?> /><label for="sexo_fem">Feminino</label>
              </div> <!-- FIM SEXO -->
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control cpf" value="<?php echo htmlspecialchars($candidato[0]->numero_documento)?>" title="O CPF deve conter 11 dígitos decimais">
              </div> <!-- FIM CPF -->
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Telefone</label>
                <input type="text" id="telefone" name="tel" class="form-control telefone"  value="<?php echo htmlspecialchars($candidato[0]->telefone)?>" title="Insira um número válido de telefone" >
              </div> <!-- FIM TELEFONE -->

              <!-- INÍCIO ENDEREÇO -->

              <div class="form-group col-12 col-md-6">

                <label for="estado">Estado</label>

                <select name="estado" id="estado" class="form-control">
                  <?php foreach ($estados as $estado): ?>
                    <option value="<?php echo $estado->id_estado ?>" <?php if($candidato[0]->id_estado == $estado->id_estado){echo "selected";} ?>><?php echo $estado->nome; ?></option>
                  <?php endforeach; ?>
                </select>
              </div> <!-- FIM ESTADO -->
              <div class="form-group col-12 col-md-6">
                <label for="cidade">Cidade</label>
                <select name="cidade" id="cidade" class="form-control">
                  <?php foreach ($cidades as $cidade): ?>
                    <option value="<?php echo $cidade->id_cidade; ?>" <?php if($candidato[0]->id_cidade == $cidade->id_cidade){echo "selected";} ?>><?php echo $cidade->nome; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Bairro</label>
                <input type="bairro" id="bairro" name="bairro" value="<?= htmlspecialchars($candidato[0]->bairro)?>"  placeholder="Bairro" class="form-control" title="Campo obrigatório" required>
              </div> <!-- FIM BAIRRO -->
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Endereço</label>
                <input type="logradouro" id="logradouro" name="logradouro"  value="<?= htmlspecialchars($candidato[0]->logradouro)?>"  placeholder="Rua/Av./Praça/Alameda/Travessa" class="form-control" title="Campo obrigatório" required>
              </div> <!-- FIM ENDEREÇO -->
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Número</label>
                <input type="numero" id="numero" name="numero" value="<?= htmlspecialchars($candidato[0]->numero_endereco)?>"  placeholder="Número da casa" class="form-control" title="Campo obrigatório" required>
              </div> <!-- FIM NÚMERO -->
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Complemento</label>
                <input type="complemento" id="complemento" name="complemento" value="<?= htmlspecialchars($candidato[0]->complemento)?>" placeholder="Complemento" class="form-control" title="Campo opcional" >
              </div> <!-- FIM COMPLEMENTO -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">CEP</label>
                <input type="cep" id="cep" name="cep" value="<?= htmlspecialchars($candidato[0]->cep)?>"  placeholder="C.E.P" class="form-control cep" title="Campo obrigatório" data-mask="00000-000" required>
              </div> <!-- FIM CEP -->
              <div class="form-group col-12 col-md-6">
                <label for="vaga">Vagas disponíveis</label>
                <select name="vaga" id="vaga" class="form-control">
                  <?php foreach($vagas as $vaga): ?>
                    <option value="<?php echo $vaga->id_vaga; ?>"><?php echo $vaga->nome; ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div> <!-- FIM VAGAS -->

            <div class="card-footer text-right">
              <a href="<?= site_url('candidato')?>" class="btn btn-danger btn-sm">
                <i class="fa fa-times"></i> Cancelar
              </a>
              <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-pencil-square-o"></i> Editar
              </button>

            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#bootstrap-data-table-export').DataTable();
  } );
</script>
