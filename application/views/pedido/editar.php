<div class="animated fadeIn">
	<div class="row justify-content-center align-items-center">
			<div class="col-lg-8">
	        <div class="card">
	            <div class="card-header">
	                <strong class="card-title">Atualização de Pedido</strong>
	            </div>
	            <form id="form-pedido" action="<?php echo base_url('pedido/editar/'.$pedido->id_pedido); ?>" method="POST">
	                <div class="card-body">
	                    <div class="card-body">
	                    	<div class="row">
	                    			                        	<div class="form-group col-6">
	                    			                        		<label for="tipo" class="control-label mb-1">Tipo de Pedido</label>
	                    			                        		<br>
	                    			                        		<div class="form-check-inline form-check">
	                    			                        		  <label for="tipo1" class="form-check-label mr-2 <?php echo isset($errors['tipo']) ? 'text-danger' : '' ?>">
	                    			                        		    <input type="radio" name="tipo" value="P" class="form-check-input" <?php echo (isset($old_data['tipo']) && strtoupper($old_data['tipo']) == 'P') || strtoupper($pedido->tipo) == 'P' ? 'checked' : ''?>>
	                    			                        		    Produtos
	                    			                        		  </label>
	                    			                        		  <label for="tipo2" class="form-check-label mr-2 <?php echo isset($errors['tipo']) ? 'text-danger' : '' ?>">
	                    			                        		    <input type="radio" name="tipo" value="S" class="form-check-input" <?php echo (isset($old_data['tipo']) && strtoupper($old_data['tipo']) == 'S') || strtoupper($pedido->tipo) == 'S' ? 'checked' : ''?>>
	                    			                        		    Serviços
	                    			                        		  </label>
	                    			                        		  <label for="tipo3" class="form-check-label <?php echo isset($errors['tipo']) ? 'text-danger' : '' ?>">
	                    			                        		    <input type="radio" name="tipo" value="PS" class="form-check-input" <?php echo (isset($old_data['tipo']) && strtoupper($old_data['tipo']) == 'PS') || strtoupper($pedido->tipo) == 'PS' ? 'checked' : ''?>>
	                    			                        		    Ambos
	                    			                        		  </label>

	                    			                        		</div>
	                    			                        		<div class="text-danger">
	                    		                        				<small class="d-none" id="error-tipo"><?php echo isset($errors['tipo']) ? $errors['tipo'] : '' ?></small>
	                    		                        			</div>
	                    			                        	</div>
	                    	</div>
	                        <div class="row">
	                            <div class="form-group col-lg-12">
	                                <label for="id_pessoa" class="control-label mb-1" id="label_pessoa"><?php echo $label ?></label>
	                                <select name="id_pessoa" id="id_pessoa" class="form-control <?php echo isset($errors['id_pessoa']) ? 'is-invalid' : '' ?>">
		                                <option value="">Selecione</option>
		                                <?php foreach ($clientes as $cliente): ?>
		                                	<option value="<?php echo $cliente->id_pessoa ?>" 
		                                		<?php 
		                                			echo isset($old_data['id_pessoa']) && 
		                                			($cliente->id_pessoa == $old_data['id_pessoa']) || 
		                                			!isset($errors['id_pessoa']) && 
		                                			($pedido->id_pessoa == $cliente->id_pessoa) ? 'selected' : '' 
		                                		?> data-id="<?php echo $pedido->transacao == 'C' ? $cliente->id_fornecedor : '' ?>">
		                                		<?php echo $pedido->transacao == 'C' ? $cliente->razao_social : $cliente->nome ?>
		                                	</option>
		                                <?php endforeach; ?>
	                              	</select>
	                             	<span class="invalid-feedback">
	                             		<?php echo isset($errors['id_pessoa']) ? $errors['id_pessoa'] : '' ; ?>
	                             	</span>
	                            </div>
	                        </div>

	                        <div class="row">
	                            <div class="form-group col-lg-12">
	                                <label for="id_produto" class="control-label mb-1">Produtos/Serviços</label>
	                                  <select id="id_produto" class="form-control <?php echo isset($errors['id_produto[]']) ? 'is-invalid' : '' ?>">
	                                    <option value="">Selecione</option>
	                                    <?php 
	                                    	$old_produtos = array();
	                                    	foreach($produtos as $produto): 

	                                    		if(isset($old_data['id_produto'])): 
	                                    			
	                                    			$key = array_search($produto->id_produto, $old_data['id_produto']); 


	                                    			if($key !== false) 
	                                    			{
	                                    				$produto->quantidade = $old_data['qtd_produto'][$key];
	                                    				array_push($old_produtos, $produto);
	                                    			}
	                                    			
	                                    		endif 
	                                    ?>
	                                    	


	                                    	<option value="<?php echo $produto->id_produto ?>" 
	                                    		<?php 
	                                    			echo (isset($old_data['id_produto']) && 
	                                    			in_array($produto->id_produto, $old_data['id_produto']) !== false) ||
	                                    			(array_search($produto->id_produto, array_column($pedido_produtos, 'id_produto')) !== false) ?
	                                    			// in_array($produto->id_produto, $pedido_produtos) !== false ? 
	                                    			'disabled' : '' 
	                                    		?> 
	                                    		data-value="<?php echo $produto->valor; ?>">
	                                    		<?php echo $produto->nome ?>
	                                    	</option>
	                                   	<?php endforeach ?>
	                                </select>
	                                <span class="invalid-feedback">
	                                	<?php echo isset($errors['id_produto[]']) ? $errors['id_produto[]'] : 'Selecione ao menos um Produto/Serviço' ; ?>
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
    		                                    <?php if($pedido->transacao == 'V'): ?>
    		                                    	<th scope="col">Valor</th>
    		                                	<?php endif ?>
    		                                    <th scope="col"></th>
    		                                </tr>
    		                            </thead>
    		                            <tbody>
    		                            	<?php 

    		                            		

    		                            		if(isset($old_data['id_produto']) || isset($pedido_produtos)):
    		                            			
    		                            			$qtd   = 0;
    		                            			$total = 0;

    		                            			$old_produtos = isset($old_data['id_produto']) ? $old_produtos : $pedido_produtos;

	    		                            	 	foreach($old_produtos as $produto):
	    		                       
	    		                            ?>
			    		                            	<tr>
			    		                            		<td width="5%" class="td-id">
			    		                            			<input class="form-control form-control-sm" name="id_produto[]" readonly 
			    		                            			style="background-color: transparent; border: 0px; font-size: 1em;" 
			    		                            			value="<?php echo $produto->id_produto; ?>">
			    		                            		</td>
			    		                            		<td width="50%" class="td-nome" data-id="<?php echo $produto->id_produto; ?>">
			    		                            			<?php echo $produto->nome; ?>
			    		                            		</td>
			    		                            		<td width="15%" class="td-qtd">
			    		                            			<input type="number" class="form-control form-control-sm input-qtd" min="1" 
			    		                            			value="<?php echo $produto->quantidade; ?>" name="qtd_produto[]">
			    		                            		</td>
			    		                            		<?php if($pedido->transacao == 'V'): ?>
				    		                            		<td width="20%" class="td-value" data-default="<?php echo $produto->valor ?>">
				    		                            			<?php 
				    		                            				echo isset($old_data['id_produto']) ? 
				    		                            				'R$ ' . number_format($produto->valor *  $produto->quantidade, 2, ',','') :
				    		                            				'R$ ' . number_format($produto->valor *  $produto->quantidade, 2, ',','');
				    		                            				
				    		                            			?>
				    		                            		</td>
			    		                            		<?php endif ?>
			    		                            		<td width="10%">
			    		                            			<button class="btn btn-danger btn-sm btn-block text-white btn-remove">
			    		                            				<i class="fa fa-close"></i>
			    		                            			</button>
			    		                            		</td>
			    		                            	</tr>

	    		                            <?php 			
		    		                            			$qtd   += $produto->quantidade;
		    		                            			$total += $produto->valor * $produto->quantidade;
	    		                            			
	    		                            		endforeach;
    		                            		endif; 
    		                            	?>
    		                            </tbody>
    		                            <?php if($pedido->transacao == 'V'): ?>
	    		                            <tfoot class="<?php isset($old_data['id_produto']) ? '' : 'd-none' ?>">
	    		                            	<tr>
	    		                            	    <th scope="col"></th>
	    		                            	    <th scope="col"></th>
	    		                            	    <th scope="col" id="total-qtd"><?php echo isset($old_data['id_produto']) || isset($pedido_produtos) ? $qtd : ''; ?></th>
	    		                            	    <th scope="col" id="total"><?php echo isset($old_data['id_produto']) || isset($pedido_produtos) ? 'R$ ' . number_format($total, 2, ',','') : ''; ?></th>
	    		                            	    <th scope="col"></th>
	    		                            	</tr>
	    		                            </tfoot>
    		                        	<?php endif ?>
    		                        </table>
	                        	</div>
	                        </div>

	                        <div class="row">
	                        	<div class="form-group col-lg-12 col-sm-12">
	                                 <label for="situacao" class="control-label mb-1" id="main_label">Situação</label>
	                                <select name="situacao" id="situacao" class="form-control <?php echo isset($errors['situacao']) ? 'is-invalid' : '' ?>">
		                                <option value="">Selecione</option>
		                                <?php foreach ($situacoes as $index => $situacao): ?>
		                                	<option value="<?php echo $index ?>" 
			                                		<?php 
			                                			echo isset($old_data['situacao']) && ($index == $old_data['situacao']) || !isset($errors['situacao']) && 
			                                			($pedido->situacao == $index)? 'selected' : ''
			                                		?>
		                                		>
		                                		<?php echo $situacao ?>
		                                	</option>
		                                <?php endforeach; ?>
	                              	</select>
	                             	<span class="invalid-feedback">
	                             		<?php echo isset($errors['situacao']) ? $errors['situacao'] : '' ; ?>
	                             	</span>
	                            </div>
	                        	
	                        </div>


	                        <div class="row">
	                        	<div class="form-group col-12">
	                        	
	                                <label for="data_oferta" class="control-label mb-1">Descrição</label>
	                                <textarea name="descricao" id="descricao" rows="4" class="form-control <?php echo isset($errors['descricao']) ? 'is-invalid' : '' ?>"><?php echo isset($old_data['descricao']) ? $old_data['descricao'] : $pedido->descricao;?></textarea>
	                                <span class="invalid-feedback">
	                                	<?php echo isset($errors['descricao']) ? $errors['descricao'] : '' ; ?>
	                                </span>
	                           
	                        	</div>
	                        </div>

	                    </div>
	                </div>
	                <div class="card-footer text-right">
	                    <a href="<?php echo base_url('pedido')?>" class="btn bg-danger text-white">
	                        <i class="fa fa-times" aria-hidden="true"></i>
	                        Cancelar
	                    </a>
	                    <button type="submit" class="btn bg-primary text-white btn-submit">
	                        <i class="fa fa-check" aria-hidden="true"></i>
	                        Editar
	                    </button>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
</div>


<!-- Modal atualizar -->

<div class="modal fade" id="modalAtualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atualizar Pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Tem certeza que deseja atualizar esse Pedido ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary btn-edit">Confirmar</button>
      </div>
    </div>
  </div>
</div>