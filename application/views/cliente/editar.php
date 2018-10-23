<!-- CLIENTE -->
<div class="row justify-content-center align-items-center">
  <div class="col-lg-10">
    <div class="card">
      <div class="card-header">
        <strong class="card-title">Atualizar Cliente</strong>
      </div>
      <form action="<?php site_url('cliente/edit'.$id); ?>" method="POST" id_usuario ="<?php echo $cliente[0]->id_usuario; ?>" class="form-horizontal" id="form_cliente">
        <div class="card-body card-block">
          <div class="row">
            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Nome</label>
              <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome Completo" value="<?= htmlspecialchars($cliente[0]->nome)?>" required>
            </div> <!-- FIM NOME -->
            <div class="form-group col-12 col-md-6">
              <label for="email-input" class=" form-control-label"><red>*</red>Email</label>
              <input type="text" id="email" name="email" placeholder="nome@provedor" value="<?= htmlspecialchars($cliente[0]->email)?>" class="form-control" required>
            </div> <!-- FIM EMAIL -->
            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Data de Nascimento</label>
              <input type="text" id="data_nascimento" name="data_nascimento" placeholder="00/00/0000"value="<?= htmlspecialchars(switchDate($cliente[0]->data_nascimento))?>" class="form-control data" required>
            </div> <!-- DATA DE NASCIMENTO -->
            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Sexo</label><br>
              <input type="radio" name="sexo" id="sexo_masc" value="0" <?php echo ($cliente[0]->sexo=='0')?'checked':'' ?> /><label for="sexo_masc">Masculino</label>
              <input type="radio" name="sexo" id="sexo_fem" value="1" <?php echo ($cliente[0]->sexo=='1')?'checked':'' ?> /><label for="sexo_fem">Feminino</label>
            </div> <!-- FIM SEXO -->
            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>CPF</label>
              <input type="text" id="cpf" name="cpf" placeholder="C.P.F."value="<?= htmlspecialchars($cliente[0]->numero_documento)?>" class="form-control cpf"  >
            </div> <!-- FIM CPF -->
            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Telefone</label>
              <input type="text" id="telefone" name="tel" placeholder="Telefone" value="<?= htmlspecialchars($cliente[0]->telefone)?>" class="form-control alter_mask" >
            </div> <!-- FIM TELEFONE -->

            <!-- INÍCIO ENDEREÇO -->
            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>CEP</label>
              <input type="cep" id="cep" name="cep" value="<?= htmlspecialchars($cliente[0]->cep)?>"  placeholder="C.E.P" class="form-control cep" required>
            </div> <!-- FIM CEP -->
            <div class="form-group col-12 col-md-6">

              <label for="estado"><red>*</red>Estado</label>
              <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado" value="<?php echo $cliente[0]->estado; ?>">
            </div>
            <div class="form-group col-12 col-md-6">

              <label for="cidade"><red>*</red>Cidade</label>
              <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" value="<?php echo $cliente[0]->cidade;?>">

            </div>
            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Bairro</label>
              <input type="bairro" id="bairro" name="bairro" value="<?= htmlspecialchars($cliente[0]->bairro)?>"  placeholder="Bairro" class="form-control" required>
            </div> <!-- FIM BAIRRO -->
            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Endereço</label>
              <input type="logradouro" id="logradouro" name="logradouro"  value="<?= htmlspecialchars($cliente[0]->logradouro)?>"  placeholder="Rua/Av./Praça/Alameda/Travessa" class="form-control"  required>
            </div> <!-- FIM ENDEREÇO -->
            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label"><red>*</red>Número</label>
              <input type="numero" id="numero" name="numero" value="<?= htmlspecialchars($cliente[0]->numero_endereco)?>"  placeholder="Número da casa" class="form-control"  required>
            </div> <!-- FIM NÚMERO -->
            <div class="form-group col-12 col-md-6">
              <label class=" form-control-label">Complemento</label>
              <input type="complemento" id="complemento" name="complemento" value="<?= htmlspecialchars($cliente[0]->complemento)?>" placeholder="Complemento" class="form-control" >
            </div> <!-- FIM COMPLEMENTO -->
          </div>
      </div>

          <div class="card-footer text-right">
           <a title="Cancelar Edição" href="<?= site_url('cliente')?>" class="btn btn-danger btn-sm">
             <i class="fa fa-times"></i> Cancelar
           </a>
           <button title="Atualizar Cliente" type="button" class="btn btn-primary text-white btn-sm" data-toggle="modal" data-target="#editarCliente">
             <span class="fa fa-check"></span>
             Atualizar
           </button>

         </div> <!-- FIM BOTÕES -->




          <div class="modal fade" id="editarCliente" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Atualizar Cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Deseja realmente atualizar esse cliente?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger text-white" data-dismiss="modal">
                    Cancelar
                  </button>
                  <button type="submit" class="btn btn-primary">
                    Confirmar
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
 </div>
