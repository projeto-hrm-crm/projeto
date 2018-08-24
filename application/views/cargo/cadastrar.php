<div class="animated fadeIn">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Cadastrar Cargo</strong>
                </div>
                <form action="<?php echo base_url() ?>cargo/cadastrar" method="post" id="form_cargo" novalidate="novalidate">
                    <div class="card-body card-block">
                        <?php if(sizeof($setores) <= 0): ?>
                            <div class="row justify-content-center align-items-center">
                                <div class="col-12">
                                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                                        Não existe nenhum setor cadastrado no sistema, favor cadastre um setor!
                                    </div>
                                    <a title="Novo setor" href="<?= site_url('setor/cadastrar')?>" class="btn btn-primary btn-sm float-right">
                                        <i class="fa fa-check"></i>
                                        Novo setor
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class=" form-control-label"><red>*</red>Nome</label>
                                <input type="text" id="nome" name="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" placeholder="Nome do Cargo" name="nome" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">
                                    <?php echo isset($errors['nome']) ? $errors['nome'] : '' ; ?>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class=" form-control-label"><red>*</red>Descrição</label>
                                <textarea placeholder="Descrição do cargo" name="descricao" class="form-control <?php echo isset($errors['descricao']) ? 'is-invalid' : '' ?>" required><?php echo isset($old_data['descricao']) ? $old_data['descricao'] : null;?></textarea>
                                <span class="invalid-feedback">
                                    <?php echo isset($errors['descricao']) ? $errors['descricao'] : '' ; ?>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class=" form-control-label"><red>*</red>Salário Mensal</label>
                                <input id="salario_cargo" type="text" data-thousands="." data-decimal="," placeholder="00,00" value="<?php echo isset($old_data['salario']) ? $old_data['salario'] : null;?>" name="salario" class="form-control <?php echo isset($errors['salario']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">
                                    <?php echo isset($errors['salario']) ? $errors['salario'] : '' ; ?>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class=" form-control-label"><red>*</red>Setor</label>
                                <select name="id_setor" id="id_setor" class="form-control <?php echo isset($errors['id_setor']) ? 'is-invalid' : '' ?>">
                                    <option value="">Selecionar setor</option>
                                    <?php foreach ($setores as $setor): ?>
                                        <option value="<?php echo $setor->id_setor ?>" <?php echo isset($old_data['id_setor']) && ($setor->id_setor == $old_data['id_setor']) ? 'selected' : '' ?>>
                                            <?php echo $setor->nome ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="invalid-feedback">
                                    <?php echo isset($errors['id_setor']) ? $errors['id_setor'] : '' ; ?>
                                </span>
                            </div>
                            <!--
                            <div class="form-group col-md-12">
                                <label class=" form-control-label"><red>*</red>Horario de Trabalho</label>
                                <input type="time" id="horario_cargo" name="appt-time" 
                                        min="00:00" max="23:59" class="form-control <?php echo isset($errors['horario']) ? 'is-invalid' : '' ?>" required />
                                <span class="invalid-feedback">
                                    <?php echo isset($errors['horario']) ? $errors['horario'] : '' ; ?>
                                </span>
                            </div>

                            <div class="form-group col-md-12">
                                <label class=" form-control-label"><red>*</red>Horario de Entrada</label>
                                <input type="time" id="horario_entrada" name="appt-time"
                                        min="00:00" max="23:59" required />
                                <span class="invalid-feedback">
                                    <?php echo isset($errors['horario']) ? $errors['horario'] : '' ; ?>
                                </span>
                            </div>

                            <div class="form-group col-md-12">
                                <label class=" form-control-label"><red>*</red>Horario de Saida</label>
                                <input type="time" id="horario_saida" name="appt-time"
                                        min="00:00" max="23:59" required />
                                <span class="invalid-feedback">
                                    <?php echo isset($errors['horario']) ? $errors['horario'] : '' ; ?>
                                </span>
                            </div>

                        </div>
                        -->
                    </div>
                    <div class="card-footer text-right">
                        <a title="Cancelar Cadastro" href="<?=site_url('cargo')?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                            Cancelar
                        </a>
                        <button title="Cadastrar Cargo" type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            Cadastrar
                        </button>
                    </div>
                <?php endif;?>
                </form>
            </div>
        </div>
    </div>
</div>
