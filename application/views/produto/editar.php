<div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Atualizar Produto</strong>
            </div>
            <form id="form_produto" action="<?php echo base_url('produto/editar/'.$produto->id_produto);?>" method="post" novalidate="novalidate" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                    <div class="col-lg-3">
                    
                        <img width="100%" src="<?php echo base_url('uploads/produtoImage/'.$produto->imagem);?>">
                    
                  </div>

                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="nome" class="control-label mb-1"><red>*</red>Nome do Produto</label>
                                <input name="nome"  id="nome" value="<?php echo isset($old_data['nome']) ? $old_data['nome'] : $produto->nome;?>" type="text" class="form-control <?php echo isset($errors['nome']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Nome inválido, digite somente letras.</span>
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="lote" class="control-label mb-1"><red>*</red>Lote</label>
                                <input name="lote" id="lote" value="<?php echo isset($old_data['lote']) ? $old_data['lote'] : $produto->lote;?>" type="text" class="form-control <?php echo isset($errors['lote']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Lote inválido.</span>
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="codigo" class="control-label mb-1"><red>*</red>Código</label>
                                <input name="codigo" id="codigo" value="<?php echo isset($old_data['codigo']) ? $old_data['codigo'] : $produto->codigo;?>" type="text" class="form-control <?php echo isset($errors['codigo']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Código inválido, digite somente números.</span>
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="valor_produto" class="control-label mb-1"><red>*</red>Valor</label>
                                <input id="valor_produto" name="valor" data-thousands="." data-decimal="," value="<?php echo isset($old_data['valor']) ? $old_data['valor'] : $produto->valor;?>" type="text" class="form-control <?php echo isset($errors['valor']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Valor inválido.</span>
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="fabricacao" class="control-label mb-1"><red>*</red>Data de Fabricação</label>
                                <input name="fabricacao" id="fabricacao" value="<?php echo isset($old_data['fabricacao']) ? $old_data['fabricacao'] : $produto->fabricacao;?>" type="text" class="form-control data <?php echo isset($errors['fabricacao']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Data de Fabricação inválida.</span>
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="validade" class="control-label mb-1"><red>*</red>Data de Validade</label>
                                <input name="validade" id="validade" value="<?php echo isset($old_data['validade']) ? $old_data['validade'] : $produto->validade;?>" type="text" class="form-control data <?php echo isset($errors['validade']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Data de Validade inválida.</span>
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="recebimento" class="control-label mb-1"><red>*</red>Data de Recebimento</label>
                                <input name="recebimento" id="recebimento" value="<?php echo isset($old_data['recebimento']) ? $old_data['recebimento'] : $produto->recebimento;?>" type="text" class="form-control data <?php echo isset($errors['recebimento']) ? 'is-invalid' : '' ?>" required>
                                <span class="invalid-feedback">Data de Recebimento inválida.</span>
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="id_fornecedor" class="control-label mb-1"><red>*</red>Fornecedor</label>
                                <select id="id_fornecedor" name="id_fornecedor" class="form-control <?php echo isset($errors['id_fornecedor']) ? 'is-invalid' : '' ?>" required>
	                                <option value="">Selecione</option>
	                                <?php foreach ($fornecedores as $fornecedor): ?>
	                                    <option value="<?php echo $fornecedor->id_fornecedor;?>"
                                        <?php echo (isset($old_data['id_fornecedor']) && ($fornecedor->id_fornecedor == $old_data['id_fornecedor'])) || !isset($errors['id_fornecedor']) && ($produto->id_fornecedor == $fornecedor->id_fornecedor) ? 'selected' : '' ?>>
	                               	    <?php echo $fornecedor->razao_social;?>
	                                    </option>
                                    <?php endforeach; ?>
	                            </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="imagemProduto" class="control-label mb-1">Imagem do Produto:</label>
                                <input type="file" name="arquivo">
                            </div>
                            
                            </div>


                        </div>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <a title="Cancelar Edição" href="<?php echo base_url('produto');?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                        Cancelar
                    </a>
                    <button title="Atualizar Produto" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editarProduto">
                        <span class="fa fa-check"></span>
                        Atualizar
                    </button>
                </div>
                <div class="modal fade" id="editarProduto" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Atualizar produto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deseja realmente atualizar esse produto?
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
