<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Novo evento</strong>
            </div>
            <form action="<?php echo base_url('agenda/cadastrar'); ?>" method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="form-group col-md-8 col-sm-12">
                                <label for="titulo" class="control-label mb-1" > <red>*</red>Titulo</label>
                                <input id="titulo" value="<?php echo isset($old_data['titulo']) ? $old_data['titulo'] : null;?>" placeholder="Titulo do evento" name="titulo" type="text" class="form-control <?php echo isset($errors['titulo']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Titulo inválido, digite somente letras.</span>
                            </div>
                            <div class="form-group col-md-8 col-sm-12">
                                <label for="inicio" class="control-label mb-1"><red>*</red>Inicio</label>
                                <input id="inicio" value="<?php echo isset($old_data['inicio']) ? $old_data['inicio'] : null;?>"  placeholder="Data de inicio do evento" name="inicio" type="date" class="form-control <?php echo isset($errors['inicio']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Data de inicio inválido.</span>
                            </div>
                            <div class="form-group col-md-8 col-sm-12">
                                <label for="fim" class="control-label mb-1"><red>*</red>Término</label>
                                <input id="fim" value="<?php echo isset($old_data['fim']) ? $old_data['fim'] : null;?>" placeholder="Data de término do evento" name="fim" type="date" class="form-control <?php echo isset($errors['fim']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Data de término inválido, digite somente números.</span>
                            </div>
                            <div class="form-group col-md-8 col-sm-12">
                                <label for="cor" class="control-label mb-1"><red>*</red>Cor</label>
                                <input id="cor" value="<?php echo isset($old_data['cor']) ? $old_data['cor'] : null;?>" name="cor" type="color" class="mt-2 <?php echo isset($errors['cor']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Cor inválida.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a title="Cancelar Cadastro" href="<?php echo site_url('agenda')?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                        Cancelar
                    </a>
                    <button title="Cadastrar Produto" type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
