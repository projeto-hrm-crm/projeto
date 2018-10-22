<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Atualizar Cargo</strong>
        </div>
        <form id="form_cargo" action="" method="post" novalidate="novalidate">
              <div class="card-body card-block">
          <div class="row justify-content-center">
            <div class="col">
               <!--NOME-->
              <div class="form-group">
              <label class=" form-control-label"><red>*</red>Nome</label>
                <input type="text" id="nome" name="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : $cargo->nome;?>" name="nome" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                 <span class="invalid-feedback">
	                <?php echo isset($errors['nome']) ? $errors['nome'] : '' ; ?>
	              </span>
              </div>

              <!-- CARGAR HORÁRIA -->
              <div class="form-group">
                  <label class=" form-control-label"><red>*</red>Carga horária (semanal)</label>
                  <input type="number" id="carga_horaria" name="carga_horaria" value="<?php echo isset($old_data['carga_horaria']) ? $old_data['carga_horaria'] : $cargo->carga_horaria_semanal;?>" placeholder="40" name="nome" class="form-control <?php echo isset($errors['carga_horaria']) ? 'is-invalid' : '' ?>" required>
                  <span class="invalid-feedback">
                      <?php echo isset($errors['carga_horaria']) ? $errors['carga_horaria'] : '' ; ?>
                  </span>
              </div>


               <!--DESCRIÇÃO-->
              <div class="form-group">
              <label class=" form-control-label"><red>*</red>Descrição</label>
                <textarea placeholder="Descrição do cargo" name="descricao" class="form-control <?php echo isset($errors['descricao']) ? 'is-invalid' : '' ?>"><?php echo isset($old_data['descricao']) ? $old_data['descricao'] : $cargo->descricao;?></textarea>
                <span class="invalid-feedback">
	                <?php echo isset($errors['descricao']) ? $errors['descricao'] : '' ; ?>
	              </span>
              </div>
               <!--SALÁRIO-->
              <div class="form-group">
              <label class=" form-control-label"><red>*</red>Salário Mensal</label>
                <input id="salario_cargo" data-thousands="." data-decimal="," type="text" placeholder="Salário" value="<?php echo isset($old_data['salario']) ? $old_data['salario'] : $cargo->salario;?>" name="salario" class="form-control <?php echo isset($errors['salario']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['salario']) ? $errors['salario'] : '' ; ?>
	              </span>
              </div>
              <!--
              <div class="form-group col-md-12">
                <label class=" form-control-label"><red>*</red>Horario de Trabalho</label>
                <input type="time" id="horario_cargo" name="appt-time" class="form-control <?php echo isset($errors['horario']) ? 'is-invalid' : '' ?>"  min="00:00" max="23:59" required />
                <span class="invalid-feedback">
                    <?php echo isset($errors['horario']) ? $errors['horario'] : '' ; ?>
                </span>
              </div>
              <div class="form-group col-md-12">
                <div>
                  <label class=" form-control-label"><red>*</red>Horario de Entrada</label>
                  <input type="time" id="horario_entrada" name="appt-time"
                          min="00:00" max="23:59" required />
                  <span class="invalid-feedback">
                      <?php echo isset($errors['horario']) ? $errors['horario'] : '' ; ?>
                  </span>
                </div>
                <div>
                  <label class=" form-control-label"><red>*</red>Horario de saida</label>
                  <input type="time" id="horario_saida" name="appt-time"
                          min="00:00" max="23:59" required />
                  <span class="invalid-feedback">
                      <?php echo isset($errors['horario']) ? $errors['horario'] : '' ; ?>
                  </span>
                </div>
              </div>
            -->
            </div>
          </div>
      </div>
        <div class="card-footer text-right">
         <!--ACTIONS-->
         <a title="Cancelar Edição" href="<?php echo base_url('cargo');?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                        Cancelar
                    </a>
                    <button title="Atualizar Cargo" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAtualizar">
                        <span class="fa fa-check"></span>
                        Atualizar
                    </button>
                </div>
                <div class="modal fade" id="modalAtualizar" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Atualizar cargo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deseja realmente atualizar esse cargo?
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
    </div>
</div>
