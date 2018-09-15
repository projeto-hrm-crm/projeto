<!-- Ponto de horas trabalhadas -->
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Horario de Trabalho</strong>
        </div>

        <form action="<?php site_url('ponto/edit'.$id); ?>" method="POST" id="form_funcionario" data-id_usuario ="<?php echo $funcionario[0]->id_usuario; ?>" class="form-horizontal">
          <div class="card-body card-block">
            <div class="row">
              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($funcionario[0]->nome)?>"  required>
              </div> <!-- FIM NOME -->

              <div class="form-group col-12 col-md-6">
                <label for="email-input" class=" form-control-label">Email</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($funcionario[0]->email)?>" class="form-control" required>
              </div> <!-- FIM EMAIL -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">CPF</label>
                <input type="text" id="cpf" name="cpf" value="<?= htmlspecialchars($funcionario[0]->numero_documento)?>" class="form-control cpf" >
              </div> <!-- FIM CPF -->

              <div class="form-group col-12 col-md-6">
                <label class=" form-control-label">Telefone</label>
                <input type="text" id="telefone" name="tel" value="<?= htmlspecialchars($funcionario[0]->telefone)?>" class="form-control alter_mask" >
              </div> <!-- FIM TELEFONE -->

              <fieldset>
                <div class="form-group col-12 col-md-6">
                  <label class=" form-control-label">Data</label>
                  <input type="text" id="telefone" >
                </div> <!-- data -->

                <div class="form-group col-12 col-md-6">
                  <label class=" form-control-label">Entrada</label>
                  <input type="text" id="telefone" >
                </div> <!-- horario de entrada -->

                <div class="form-group col-12 col-md-6">
                  <label class=" form-control-label">Saida</label>
                  <input type="text" id="telefone">
                </div> <!-- Horario de saida -->
              </fieldset>
            
             </div><!-- FIM -->

            </div>

            <div class="card-footer">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarFuncionario">
                <span class="fa fa-check"></span>
                Editar
              </button>
              <a href="<?= site_url('funcionario')?>" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Cancelar
              </a>
            </div> <!-- FIM BOTÕES -->
            <div class="modal fade" id="editarFuncionario" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Editar Funcionario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Deseja realmente editar esse funcionario?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                      Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                      Editar
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
