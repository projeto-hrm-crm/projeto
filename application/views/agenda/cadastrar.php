<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Novo evento</strong>
            </div>
            <form id="form_agenda" action="<?php echo base_url('agenda/cadastrar'); ?>" method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="form-group col-md-10 col-sm-12">
                            <label for="titulo" class="control-label mb-1" > <red>*</red>Titulo</label>
                            <input id="titulo" value="<?php echo isset($old_data['titulo']) ? $old_data['titulo'] : null;?>" placeholder="Titulo do evento" name="titulo" type="text" class="form-control <?php echo isset($errors['titulo']) ? 'is-invalid' : '' ?>" required>
                            <span class="invalid-feedback">Titulo inválido, digite somente letras e números.</span>
                        </div>
                        <div class="form-group col-md-10 col-sm-12">
                            <label class="control-label float-left"><red>*</red>Cor</label>
                            <select id="color" name="cor" class=" form-control <?php echo isset($errors['cor']) ? 'is-invalid' : '' ?>" required>
                                <option value="">Selecione</option>
                                <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                <option style="color:#228B22;" value="#228B22">Verde</option>
                            </select>
                            <span class="invalid-feedback">Cor inválida.</span>
                        </div>
                        <div class="form-group col-md-5 col-sm-6">
                            <label class="control-label mb-1"><red>*</red>Inicio</label>
                            <input id="start" value="<?php echo isset($old_data['inicio']) ? $old_data['inicio'] : null;?>" name="inicio" type="text" class="form-control data <?php echo isset($errors['inicio']) ? 'is-invalid' : '' ?>" required>
                            <span class="invalid-feedback">Data de inicio inválida.</span>
                        </div>
                        <div class="form-group col-md-5 col-sm-6">
                            <label class="control-label mb-1"><red>*</red>Hora Inicio</label>
                            <input id="startHour" name="horaInicio" value="<?php echo isset($old_data['horaInicio']) ? $old_data['horaInicio'] : null;?>" type="time" class="form-control <?php echo isset($errors['horaInicio']) ? 'is-invalid' : '' ?>" required>
                            <span class="invalid-feedback">Hora de inicio inválida.</span>
                        </div>
                        <div class="form-group col-md-5 col-sm-6">
                            <label for="fim" class="control-label mb-1"><red>*</red>Término</label>
                            <input id="end" value="<?php echo isset($old_data['fim']) ? $old_data['fim'] : null;?>" name="fim" type="text" class="form-control data <?php echo isset($errors['fim']) ? 'is-invalid' : '' ?>" required>
                            <span class="invalid-feedback">Data de término inválida.</span>
                        </div>
                        <div class="form-group col-md-5 col-sm-6">
                            <label class="control-label mb-1"><red>*</red>Hora término</label>
                            <input id="endHour" name="horaFim" value="<?php echo isset($old_data['horaFim']) ? $old_data['horaFim'] : null;?>" type="time" class="form-control  <?php echo isset($errors['horaFim']) ? 'is-invalid' : '' ?>" required>
                            <span class="invalid-feedback">Hora de término inválida.</span>
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
