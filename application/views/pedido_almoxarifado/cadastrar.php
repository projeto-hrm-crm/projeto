<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Cadastrar Entrada</strong>
            </div>
            <form id="form_almoxarifado" action="<?php echo base_url('pedido_almoxarifado/cadastrar'); ?>" method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                           <div class="form-group col-md-6 col-sm-12">
                                <label for="id_almoxarifado" class="control-label mb-1"><red>*</red>Item</label>
                                <select name="id_almoxarifado" id="id_almoxarifado" class="form-control <?php echo isset($errors['id_almoxarifado']) ? 'is-invalid' : '' ?>">
                                     <option value="">Selecione o material necessário</option>
                                     <?php foreach ($almoxarifados as $almoxarifado): ?>
                                         <option value="<?php echo $almoxarifado->id_almoxarifado ?>" <?php echo isset($old_data['id_almoxarifado']) && ($almoxarifado->id_almoxarifado == $old_data['id_almoxarifado']) ? 'selected' : '' ?>>
                                             <?php echo $almoxarifado->nome ?>
                                         </option>
                                     <?php endforeach; ?>
                                 </select>
                            </div>
                           <div class="form-group col-md-6 col-sm-12">
                                <label for="id_setor" class="control-label mb-1"><red>*</red>Setor</label>
                                <select name="id_setor" id="id_setor" class="form-control <?php echo isset($errors['id_setor']) ? 'is-invalid' : '' ?>">
                                     <option value="">Selecione uma unidade de medida</option>
                                     <?php foreach ($setores as $setor): ?>
                                         <option value="<?php echo $setor->id_setor ?>" <?php echo isset($old_data['id_almoxarifado']) && ($setor->id_setor == $old_data['id_almoxarifado']) ? 'selected' : '' ?>>
                                             <?php echo $setor->nome ?>
                                         </option>
                                     <?php endforeach; ?>
                                 </select>
                            </div>
                           <div class="form-group col-md-6 col-sm-12">
                                <label for="quantidade" class="control-label mb-1"><red>*</red>Quantidade</label>
                                <input id="quantidade" value="<?php echo isset($old_data['quantidade']) ? $old_data['quantidade'] : null;?>" placeholder="Quantidade" name="quantidade" type="number" class="form-control <?php echo isset($errors['quantidade']) ? 'is-invalid' : '' ?>" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="id_unidade_medida" class="control-label mb-1"><red>*</red>Unidade de medida</label>
                                <select name="id_unidade_medida" id="id_unidade_medida" class="form-control <?php echo isset($errors['id_unidade_medida']) ? 'is-invalid' : '' ?>">
                                     <option value="">Selecione uma unidade de medida</option>
                                     <?php foreach ($unidades as $unidade): ?>
                                         <option value="<?php echo $unidade->id_unidade_medida ?>" <?php echo isset($old_data['id_unidade_medida']) && ($unidade->id_unidade_medida == $old_data['id_unidade_medida']) ? 'selected' : '' ?>>
                                             <?php echo $unidade->medida ?>
                                         </option>
                                     <?php endforeach; ?>
                                 </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a title="Cancelar Cadastro" href="<?php echo site_url('pedido_almoxarifado')?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                        Cancelar
                    </a>
                    <button title="Cadastrar almoxarifado" type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
