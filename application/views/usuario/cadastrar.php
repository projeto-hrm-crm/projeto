<div class="row justify-content-center align-items-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">



                <strong class="card-title">Cadastrar Usuário</strong>
            </div>
            <form id="form_usuario" action="<?php echo base_url('usuario/cadastrar'); ?>" method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="login" class="control-label mb-1">Login</label>
                                <input id="login" value="<?php echo isset($old_data['nome']) ? $old_data['login'] : null;?>" name="login" type="text" class="form-control <?php echo isset($errors['login']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Login inválido.</span>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">

                            </div>


                            <div class="form-group col-md-6 col-sm-12">
                                <label for="senha" class="control-label mb-1">Senha</label>
                                <input id="senha" value="<?php echo isset($old_data['senha']) ? $old_data['senha'] : null;?>" name="senha" type="password" class="form-control <?php echo isset($errors['senha']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Senha inválida.</span>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="senha2" class="control-label mb-1">Repetir senha</label>
                                <input id="senha2" value="<?php echo isset($old_data['senha2']) ? $old_data['senha2'] : null;?>" name="senha2" type="password" class="form-control <?php echo isset($errors['senha2']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Nome inválido.</span>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="id_grupo_acesso" class="control-label mb-1">Grupo de Acesso</label>
                                <select id="id_grupo_acesso" name="id_grupo_acesso" value="<?php echo isset($old_data['id_grupo_acesso']) ? $old_data['id_grupo_acesso']: null;?>" name="id_grupo_acesso" type="text" class="form-control <?php echo isset($errors['id_grupo_acesso']) ? 'is-invalid' : '' ?>" required>
                                    <?php foreach($grupo_acesso as $grupo): ?>
                                        <option value="<?php echo $grupo->id_grupo_acesso; ?>"><?php echo $grupo->nome; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="invalid-feedback">Grupo de Acesso inválido.</span>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="id_pessoa_fisica" class="control-label mb-1">Fornecedor</label>
                                <select id="id_pessoa_fisica" name="id_pessoa_fisica" value="<?php echo isset($old_data['id_pessoa_fisica']) ? $old_data['id_pessoa_fisica']: null;?>" name="id_pessoa_fisica" type="text" class="form-control <?php echo isset($errors['id_pessoa_fisica']) ? 'is-invalid' : '' ?>" required>
                                    <?php foreach($pessoa_fisica as $pessoa_f): ?>
                                        <option value="<?php echo $pessoa_f->id_pessoa_fisica; ?>"><?php echo $pessoa_f->id_pessoa." - ".$pessoa_f->nome; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="invalid-feedback">Fornecedor inválido.</span>
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
