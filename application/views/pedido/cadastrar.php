<div class="animated fadeIn">
	<div class="row justify-content-center align-items-center">
			<div class="col-lg-8">
	        <div class="card">
	            <div class="card-header">
	                <strong class="card-title">Novo Pedido</strong>
	            </div>
	            <form id="form-pedido" action="<?php echo base_url('pedido/cadastrar'); ?>" method="POST">
	                <div class="card-body">
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="form-group col-lg-12">
	                                <label for="id_cliente" class="control-label mb-1">Cliente</label>
	                                <select name="id_cliente" id="id_cliente" class="form-control <?php echo isset($errors['id_cargo']) ? 'is-invalid' : '' ?>">
		                                <option value="">Selecione</option>
		                                <?php foreach ($clientes as $cliente): ?>
		                                	<option value="<?php echo $cliente->id_cliente ?>" <?php echo isset($old_data['id_cliente']) && ($cliente->id_cliente == $old_data['id_cliente']) ? 'selected' : '' ?>>
		                                		<?php echo $cliente->nome ?>
		                                	</option>
		                                <?php endforeach; ?>
	                              	</select>
	                             	<span class="invalid-feedback">
	                             		<?php echo isset($errors['id_cliente']) ? $errors['id_cliente'] : '' ; ?>
	                             	</span>
	                            </div>
	                        </div>


	                        <div class="row">
	                            <div class="form-group col-lg-12">
	                                <label for="quantidade" class="control-label mb-1">Produtos/Serviços</label>
	                                  <select id="id_produto" class="form-control">
	                                    <option value="">Selecione</option>
	                                    <?php foreach($produtos as $produto): ?>
	                                    	<option value="<?php echo $produto->id_produto ?>" <?php echo isset($old_data['id_produto']) && ($produto->id_produto == $old_data['id_produto']) ? 'selected' : '' ?> data-value="<?php echo $produto->valor; ?>">
	                                    		<?php echo $produto->nome ?>
	                                    	</option>
	                                   	<?php endforeach ?>
	                                </select>
	                                <span class="invalid-feedback">
	                                	<?php echo isset($errors['id_produto']) ? $errors['id_produto'] : '' ; ?>
	                                </span>
	                            </div>
	                        </div>

	                        <div class="row">
	                        	<div class="form-group col-lg-12">
	                        		<table id="produtos-table" class="table table-sm">
    		                            <thead>
    		                                <tr>
    		                                    <th scope="col">Cód.</th>
    		                                    <th scope="col">Produto/Serviço</th>
    		                                    <th scope="col">Qtd</th>
    		                                    <th scope="col">Valor</th>
    		                                    <th scope="col"></th>
    		                                </tr>
    		                            </thead>
    		                            <tbody>
    		                            	
    		                            </tbody>
    		                            <tfoot class="d-none">
    		                            	<tr>
    		                            	    <th scope="col"></th>
    		                            	    <th scope="col"></th>
    		                            	    <th scope="col" id="total-qtd">Qtd</th>
    		                            	    <th scope="col" id="total">Valor</th>
    		                            	    <th scope="col"></th>
    		                            	</tr>
    		                            </tfoot>
    		                        </table>
	                        	</div>
	                        </div>

	                        <div class="row">
	                        	<div class="form-group col-lg-6 col-sm-12">
	                                <label for="situacao" class="control-label mb-1">Situação</label>
	                                <input value="<?php echo isset($old_data['situacao']) ? $old_data['situacao'] : null;?>" name="situacao" type="text" class="data form-control <?php echo isset($errors['situacao']) ? 'is-invalid' : '' ?>">
	                                <span class="invalid-feedback">
	                                	<?php echo isset($errors['situacao']) ? $errors['situacao'] : '' ; ?>
	                                </span>
	                            </div>
	                        	<div class="form-group col-6">
	                        		<label for="tipo" class="control-label mb-1">Tipo de Pedido</label>
	                        		<br>
	                        		<div class="form-check-inline form-check">
	                        		  <label for="tipo1" class="form-check-label mr-2">
	                        		    <input type="radio" name="tipo" value="P" class="form-check-input">
	                        		    Produtos
	                        		  </label>
	                        		  <label for="tipo2" class="form-check-label mr-2">
	                        		    <input type="radio" name="tipo" value="S" class="form-check-input">
	                        		    Serviços
	                        		  </label>
	                        		  <label for="tipo3" class="form-check-label ">
	                        		    <input type="radio" name="tipo" value="PS" class="form-check-input">
	                        		    Ambos
	                        		  </label>
	                        		</div>
	                        	</div>
	                        </div>


	                        <div class="row">
	                        	<div class="form-group col-12">
	                        	
	                                <label for="data_oferta" class="control-label mb-1">Descrição</label>
	                                <textarea name="descricao" id="descricao" rows="4" class="form-control <?php echo isset($errors['descricao']) ? 'is-invalid' : '' ?>"><?php echo isset($old_data['descricao']) ? $old_data['descricao'] : null;?></textarea>
	                                <span class="invalid-feedback">
	                                	<?php echo isset($errors['descricao']) ? $errors['descricao'] : '' ; ?>
	                                </span>
	                           
	                        	</div>
	                        </div>

	                    </div>
	                </div>
	                <div class="card-footer text-right">
	                    <button type="reset" class="btn bg-danger text-white">
	                        <i class="fa fa-times" aria-hidden="true"></i>
	                        Cancelar
	                    </button>
	                    <button type="submit" class="btn bg-primary text-white">
	                        <i class="fa fa-plus" aria-hidden="true"></i>
	                        Cadastrar
	                    </button>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
</div>