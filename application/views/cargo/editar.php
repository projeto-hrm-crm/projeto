<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Atualizar Produto</strong>
            </div>
            <form id="form_cargo" action="<?php echo base_url('cargo/editar/'.$cargo->id_cargo);?>" method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="nome" class="control-label mb-1">Nome do Produto</label>
                                <input name="nome"  id="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : $cargo->nome;?>" type="text" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Nome inválido, digite somente letras.</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Descrição</label>
                                <textarea placeholder="Descrição do cargo" name="descricao" id="descricao" class="form-control <?php echo isset($errors['descricao']) ? 'is-invalid' : '' ?>" required><?php echo isset($old_data['descricao']) ? $old_data['descricao'] : $cargo->descricao;?></textarea>
                                <span class="invalid-feedback">Descrição inválida.</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="salario" class="control-label mb-1">Salário por hora</label>
                                <input name="salario" id="salario_cargo" data-thousands="." data-decimal="," placeholder="Salário por hora" value="<?php echo isset($old_data['salario']) ? $old_data['salario'] : $cargo->salario;?>" type="text" class="form-control <?php echo isset($errors['salario']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Salário inválido, digite somente números.</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="id_setor" class="control-label mb-1">Setor</label>
                                <select id="id_setor" name="id_setor" class="form-control <?php echo isset($errors['id_setor']) ? 'is-invalid' : '' ?>" required>
	                                <option value="">Selecione</option>
	                                <?php foreach ($setores as $setor): ?>
	                                    <option value="<?php echo $setor->id_setor;?>"
                                        <?php echo (isset($old_data['id_setor']) && ($setor->id_setor == $old_data['id_setor'])) || !isset($errors['id_setor']) && ($cargo->id_setor == $setor->id_setor) ? 'selected' : '' ?>>
	                               	    <?php echo $setor->nome;?>
	                                    </option>
                                    <?php endforeach; ?>
	                            </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a title="Cancelar edição" href="<?php echo base_url('cargo');?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                        Cancelar
                    </a>
                    <button title="Atualizar Cargo" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAtualizar">
                        <span class="fa fa-check"></span>
                        Editar
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
