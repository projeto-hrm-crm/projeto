<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
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
													    <a href="vaga/editar/<?php echo $pedido->id ?>" 
													    	class="btn bg-primary btn-sm text-white">
													        <i class="fa fa-pencil-square-o"></i>
													    </a>

													    <a href="vaga/editar/<?php echo $pedido->id ?>" 
													    	class="btn bg-secondary btn-sm text-white">
													        <i class="fa fa-print"></i>
													    </a>
													    
													    <button  data-href="vaga/excluir/<?php echo $pedido->id ?>" 
													    	class="btn bg-danger btn-sm text-white" data-toggle="modal" data-target="#modalRemover">
													        <i class="fa fa-times"></i>
			  									    	</button>
			  									    	<br>
			  									    	<span class="badge badge-primary"><?php echo $pedido->situacao; ?></span>
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




										<!-- <td class="">
											<div class="row">
												<div class="col-6">
													<strong>Pedido Nº </strong><?php echo $pedido->id; ?>
												</div>
												<div class="col-6 text-right">
												    <a href="vaga/editar/<?php echo $pedido->id ?>" 
												    	class="btn bg-primary btn-sm text-white">
												        <i class="fa fa-pencil-square-o"></i>
												    </a>

												    <a href="vaga/editar/<?php echo $pedido->id ?>" 
												    	class="btn bg-secondary btn-sm text-white">
												        <i class="fa fa-print"></i>
												    </a>
												    
												    <button  data-href="vaga/excluir/<?php echo $pedido->id ?>" 
												    	class="btn bg-danger btn-sm text-white" data-toggle="modal" data-target="#modalRemover">
												        <i class="fa fa-times"></i>
		  									    	</button>
		  									    	<br>
		  									    	<span class="badge badge-primary"><?php echo $pedido->situacao; ?></span>
												</div>
											</div>

										</td>
										<td><strong>Cliente: </strong><?php echo $pedido->cliente; ?></td>
										<td><strong>Tipo: </strong><?php echo $pedido->tipo; ?></td>
										<td class="text-right">
											<strong>
												<?php echo 'R$ '.number_format($pedido->total, 2, ',',''); ?>
											</strong>
										</td>
										<td></td> -->
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