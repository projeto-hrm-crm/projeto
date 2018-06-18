<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Cadastrar Produto</strong>
            </div>
            <form id="form_produto"  method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="form-group">
                        <label>Grupos de acesso</label>
                        <select class="form-control"  name="group">
                            <?php foreach ($groups as $group): ?>
                                <option value="<?php echo $group->id_grupo_acesso ?>"><?php echo $group->nome;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lista de acessos</label><br><br>

                        <?php foreach ($permissions as $permission): ?>
                        <div class="access_div">
                            <input type="checkbox" name="access[]" value="<?php echo $permission['id_menu'];?>""><?php echo $permission['nome'];?><br>
                            <div class="alert alert-secondary" role="alert">
                                <ul>
                                    <?php foreach($permission['sub_menus'] as $access): ?>
                                    <li class="ml-3"> <?php echo $access->nome;?> </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                        <?php endforeach;?>


                    </div>
                </div>
                <div class="card-footer text-right">
                    <a title="Cancelar Cadastro" href="http://localhost/projeto" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                        Cancelar
                    </a>
                    <button title="Cadastrar Produto" type="submit" class="btn btn-primary btn-sm" onclick="this.disabled=true;this.form.submit();">
                        <i class="fa fa-plus"></i>
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>