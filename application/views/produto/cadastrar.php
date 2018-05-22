<div class="row justify-content-center align-items-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Novo Produto</strong>
            </div>
            <form id="form_produto" action="<?php echo base_url('produto/cadastrar'); ?>" method="post" novalidate="novalidate">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nome" class="control-label mb-1">Nome do Produto</label>
                                <input id="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : null;?>" name="nome" type="text" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Nome inválido, digite somente letras.</span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="lote" class="control-label mb-1">Lote</label>
                                <input id="lote" value="<?php echo isset($old_data['lote']) ? $old_data['lote'] : null;?>" name="lote" type="text" class="form-control <?php echo isset($errors['lote']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Lote inválido.</span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="codigo" class="control-label mb-1">Código</label>
                                <input id="codigo" value="<?php echo isset($old_data['codigo']) ? $old_data['codigo'] : null;?>" name="codigo" type="text" class="form-control <?php echo isset($errors['codigo']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Código inválido, digite somente números.</span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="valor_produto" class="control-label mb-1">Valor</label>
                                <input id="valor_produto" value="<?php echo isset($old_data['valor']) ? $old_data['valor'] : null;?>" name="valor" type="text" class="form-control <?php echo isset($errors['valor']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Valor inválido.</span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="recebimento" class="control-label mb-1">Data de Recebimento</label>
                                <input id="recebimento" value="<?php echo isset($old_data['recebimento']) ? $old_data['recebimento'] : null;?>" name="recebimento" type="text" class="form-control data <?php echo isset($errors['recebimento']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Data de Recebimento inválida.</span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="fabricacao" class="control-label mb-1">Data de Fabricação</label>
                                <input id="fabricacao" value="<?php echo isset($old_data['fabricacao']) ?  $old_data['fabricacao'] : null;?>" name="fabricacao" type="text" class="form-control data <?php echo isset($errors['fabricacao']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Data de Fabricação inválida.</span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="validade" class="control-label mb-1">Data de Validade</label>
                                <input id="validade" value="<?php echo isset($old_data['validade']) ? $old_data['validade']: null;?>" name="validade" type="text" class="form-control data <?php echo isset($errors['validade']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Data de Validade inválida.</span>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="id_fornecedor" class="control-label mb-1">Fornecedor</label>
                                <select id="id_fornecedor" name="id_fornecedor" value="<?php echo isset($old_data['id_fornecedor']) ? $old_data['id_fornecedor']: null;?>" name="id_fornecedor" type="text" class="form-control <?php echo isset($errors['id_fornecedor']) ? 'is-invalid' : '' ?>" required>
                                    <option value="">Selecione</option>
                                    <?php foreach($fornecedores as $fornecedor): ?>
                                        <option value="<?php echo $fornecedor->id_fornecedor; ?>"><?php echo $fornecedor->razao_social; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="invalid-feedback">Fornecedor inválido.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?php echo site_url('produto')?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
