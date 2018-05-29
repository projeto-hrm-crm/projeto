<div class="animated fadeIn">
	<div class="row justify-content-center align-items-center">
			<div class="col-lg-8">
	        <div class="card">
	            <div class="card-header">
	                <strong class="card-title">Atualização de Pedido</strong>
	            </div>
	            <form id="form-pedido" action="<?php echo base_url('pedido/fornecedor/editar/'.$pedido->id_pedido); ?>" method="POST">
	               
	                    <div class="card-body">
	                        

	                        
	                        
	                        <div class="row">
	                        	<div class="form-group col-lg-12">
	                        		<table id="produtos-table" class="table table-sm">
    		                            <thead>
    		                                <tr>
    		                                    <th scope="col">Cód.</th>
    		                                    <th scope="col">Produto/Serviço</th>
    		                                    <th scope="col">Qtd</th>
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
			    		                            			<?php echo $produto->quantidade; ?>
			    		                            		</td>

			    		                            		
			    		                            	</tr>

	    		                            <?php 			
		    		                            			
	    		                            			
	    		                            		endforeach;
    		                            		endif; 
    		                            	?>
    		                            </tbody>

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
	                
	                <div class="card-footer text-right">
	                    <a href="<?php echo base_url('pedido/fornecedor')?>" class="btn bg-danger text-white">
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