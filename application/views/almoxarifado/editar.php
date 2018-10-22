<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Edição de Itens de Almoxarifado</strong>
            </div>
            <form id="form_almoxarifado" action="<?php echo base_url('almoxarifado/editar/'.$almoxarifado[0]->id_almoxarifado); ?>" method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nome" class="control-label mb-1" > <red>*</red>Nome</label>
                                <input id="nome" value="<?= htmlspecialchars($almoxarifado[0]->nome)?>" placeholder="Nome do almoxarifado" name="nome" type="text" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="quantidade" class="control-label mb-1"><red>*</red>Quantidade</label>
                                <input id="quantidade" value="<?= htmlspecialchars($almoxarifado[0]->quantidade)?>" laceholder="Quantidade" name="quantidade" type="number" class="form-control <?php echo isset($errors['quantidade']) ? 'is-invalid' : '' ?>" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="valor" class="control-label mb-1"><red>*</red>Valor</label>
                                <input id="valor" data-thousands="." data-decimal="," value="<?= htmlspecialchars($almoxarifado[0]->valor)?>" placeholder="Valor unitário do almoxarifado" name="valor" type="text" class="form-control <?php echo isset($errors['valor']) ? 'is-invalid' : '' ?>" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="descricao" class="control-label mb-1"><red>*</red>Descriçao</label>
                                <input id="descricao" value="<?= htmlspecialchars($almoxarifado[0]->descricao)?>" placeholder="Descrição" name="descricao" type="text" class="form-control <?php echo isset($errors['descricao']) ? 'is-invalid' : '' ?>" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="recebimento" class="control-label mb-1"><red>*</red>Data de Recebimento</label>
                                <input id="recebimento" value="<?= htmlspecialchars($almoxarifado[0]->recebimento)?>" placeholder="00/00/0000" name="recebimento" type="text" class="form-control data <?php echo isset($errors['recebimento']) ? 'is-invalid' : '' ?>" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="id_unidade_medida" class="control-label mb-1"><red>*</red>Unidade de medida</label>
                                <select name="id_unidade_medida" id="id_unidade_medida" class="form-control <?php echo isset($errors['id_unidade_medida']) ? 'is-invalid' : '' ?>">
		                                <option value="">Selecione uma unidade de medida</option>
		                                <?php foreach ($unidades as $unidade): ?>
		                                	<option value="<?php echo $unidade->id_unidade_medida ?>" <?php echo ($unidade->id_unidade_medida == $almoxarifado[0]->id_unidade_medida) ? 'selected' : '' ?>>
		                                		<?php echo $unidade->medida ?>
		                                	</option>
		                                <?php endforeach; ?>
	                              	</select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a title="Cancelar Cadastro" href="<?php echo site_url('almoxarifado')?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                        Cancelar
                    </a>
                    <button title="Cadastrar almoxarifado" type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
