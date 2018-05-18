<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">

			<?php if(isset($success_message)): ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-2">
                    <?php echo $success_message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
			<?php if(isset($error_message)): ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                    <?php echo $error_message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
      		<?php endif; ?>
        	<div class="card">
        	    <div class="card-header">
        	        <strong class="card-title">Pedidos</strong>
        	    </div>
        	    <div class="card-body">
        	    	<!-- PEDIDOS -->
					<table class="datatable table">
						<thead class="d-none">
							<tr>
								<th></th>
							</tr>
						</thead>

						<tbody>
							<?php if(isset($pedidos)): ?>
								<?php foreach($pedidos as $pedido): ?>
									<tr class="col-6">

										<td class="border-0">
											<div class="card card-body">
												<div class="row">
													<div class="col-6">
														<strong>Pedido Nº </strong><?php echo $pedido->id; ?>
													</div>
													<div class="col-6 text-right">
													    <a href="pedido/editar/<?php echo $pedido->id ?>" 
													    	class="btn bg-primary btn-sm text-white">
													        <i class="fa fa-pencil-square-o"></i>
													    </a>

													    <a href="vaga/editar/<?php echo $pedido->id ?>" 
													    	class="btn bg-secondary btn-sm text-white">
													        <i class="fa fa-print"></i>
													    </a>
													    
													    <button  data-href="pedido/excluir/<?php echo $pedido->id ?>" 
													    	class="btn bg-danger btn-sm text-white" data-toggle="modal" data-target="#modalRemover">
													        <i class="fa fa-times"></i>
			  									    	</button>
			  									    	<br>
			  									    	<span class="badge badge-primary"><?php echo $pedido->situacao; ?></span>
			  									    	<br>
			  									    	<?php echo swicthTimestamp($pedido->data) ?>
													</div>
												</div>
												<div class="row">
													<div class="col-12">
														<strong>Cliente: </strong><?php echo $pedido->cliente; ?>
													</div>
												</div>
												<div class="row">
													<div class="col-12">
														<strong>Tipo: </strong>
														<?php 
															switch($pedido->tipo)
															{
																case 'p':
																	echo 'Produtos';
																	break;
																case 's':
																	echo 'Serviços';
																	break;
																default:
																	echo 'Produtos e Serviços';
																	break;
															} 
														?>
													</div>
												</div>
												<div class="row">
													<div class="col-12 text-justify">
														<strong>Descrição: </strong><?php echo $pedido->descricao; ?>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-12 text-right">
														<strong>
															<?php echo 'R$ '.number_format($pedido->total, 2, ',',''); ?>
														</strong>
													</div>
												</div>
											</div>
										</td>

									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</tbody>

					</table>
        	    	
        	    	<!-- / PEDIDOS -->




        	    </div>



        </div>
    </div>
</div>

</div>


 <!-- Modal remover -->

<div class="modal fade" id="modalRemover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir Pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Tem certeza que deseja excluir esse Pedido?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a href="#" class="btn btn-primary btn-remove-ok">Confirmar</a>
      </div>
    </div>
  </div>
</div>