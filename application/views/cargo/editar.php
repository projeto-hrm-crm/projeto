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
              <label class=" form-control-label">Nome</label>
                <input type="text" id="nome" name="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : $cargo->nome;?>" name="nome" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                 <span class="invalid-feedback">
	                <?php echo isset($errors['nome']) ? $errors['nome'] : '' ; ?>
	              </span>
              </div>
               <!--DESCRIÇÃO-->
              <div class="form-group">
              <label class=" form-control-label">Descrição</label>
                <textarea placeholder="Descrição do cargo" name="descricao" class="form-control <?php echo isset($errors['descricao']) ? 'is-invalid' : '' ?>"><?php echo isset($old_data['descricao']) ? $old_data['descricao'] : $cargo->descricao;?></textarea>
                <span class="invalid-feedback">
	                <?php echo isset($errors['descricao']) ? $errors['descricao'] : '' ; ?>
	              </span>
              </div>
               <!--SALÁRIO-->
              <div class="form-group">
              <label class=" form-control-label">Salário por hora</label>
                <input id="salario_cargo" type="text" placeholder="Salário por hora" value="<?php echo isset($old_data['salario']) ? $old_data['salario'] : $cargo->salario;?>" name="salario" class="form-control <?php echo isset($errors['salario']) ? 'is-invalid' : '' ?>" required>
                <span class="invalid-feedback">
	                <?php echo isset($errors['salario']) ? $errors['salario'] : '' ; ?>
	              </span>
              </div>
               <!--SETOR-->
              <div class="form-group">
              <label class=" form-control-label">Setor</label>
              <select name="id_setor" id="id_setor" class="form-control <?php echo isset($errors['id_setor']) ? 'is-invalid' : '' ?>">
                  <option value="">Selecionar</option>
                    <?php foreach ($setores as $setor): ?>
                    <option value="<?php echo $setor->id_setor ?>" <?php echo isset($old_data['id_setor']) && ($setor->id_setor == $old_data['id_setor']) || $cargo->id_setor == $setor->id_setor ? 'selected' : '' ?>>
		                  <?php echo $setor->nome ?>
		                </option>
                  <?php endforeach; ?>
                </select>
                <span class="invalid-feedback">
	               <?php echo isset($errors['id_setor']) ? $errors['id_setor'] : '' ; ?>
	             </span>
              </div>
            </div>
          </div>

        <div class="card-footer text-right">
         <!--ACTIONS-->
         <a href="<?php echo base_url('cargo');?>" class="btn btn-danger btn-sm">
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
                                Deseja Realmente Atualizar Esse Cargo?
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
