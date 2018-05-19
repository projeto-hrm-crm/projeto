<div class="row justify-content-center align-items-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Cadastrar Usuário</strong>
            </div>
            <form id="form_produto" action="<?php echo base_url('produto/cadastrar'); ?>" method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nome" class="control-label mb-1">Login</label>
                                <input id="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" name="nome" type="text" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Nome inválido.</span>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">

                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nome" class="control-label mb-1">Email</label>
                                <input id="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" name="nome" type="email" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Nome inválido.</span>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nome" class="control-label mb-1">Repetir email</label>
                                <input id="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" name="nome" type="email" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Nome inválido.</span>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nome" class="control-label mb-1">Senha</label>
                                <input id="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" name="nome" type="password" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Nome inválido.</span>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nome" class="control-label mb-1">Repetir senha</label>
                                <input id="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" name="nome" type="password" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Nome inválido.</span>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="id_fornecedor" class="control-label mb-1">Grupo de Acesso</label>
                                <select id="id_fornecedor" name="id_fornecedor" value="<?php echo isset($old_data['id_fornecedor']) ? $old_data['id_fornecedor']: null;?>" name="id_fornecedor" type="text" class="form-control <?php echo isset($errors['id_fornecedor']) ? 'is-invalid' : '' ?>" required>
                                    <?php foreach($grupo_acesso as $grupo): ?>
                                        <option value="<?php echo $grupo->nome; ?>"><?php echo $grupo->nome; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="invalid-feedback">Usuário inválido.</span>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="id_fornecedor" class="control-label mb-1">Pessoa</label>
                                <select id="id_fornecedor" name="id_fornecedor" value="<?php echo isset($old_data['id_fornecedor']) ? $old_data['id_fornecedor']: null;?>" name="id_fornecedor" type="text" class="form-control <?php echo isset($errors['id_fornecedor']) ? 'is-invalid' : '' ?>" required>
                                    <?php foreach($pessoa_fisica as $pessoa_f): ?>
                                        <option value="<?php echo $pessoa_f->nome; ?>"><?php echo $pessoa_f->id_pessoa." - ".$pessoa_f->nome; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="invalid-feedback">Usuário inválido.</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="reset" class="btn btn-danger">
                        <i class="fa fa-ban"></i>
                        Apagar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
