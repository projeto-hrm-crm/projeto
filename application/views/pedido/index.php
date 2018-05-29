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



        	    	<div class="default-tab">
        	    	    <nav>
        	    	        <div class="nav nav-tabs" id="nav-tab" role="tablist">
        	    	            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Clientes</a>
        	    	            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Fornecedores</a>
        	    	            
        	    	        </div>
        	    	    </nav>
        	    	    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
        	    	        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
        	    	            													    <a href="<?php echo base_url('pedido/editar/'.$pedido->id) ?>" 
        	    	            													    	class="btn bg-primary btn-sm text-white">
        	    	            													        <i class="fa fa-pencil-square-o"></i>
        	    	            													    </a>

        	    	            													    <a href="<?php echo base_url('pedido/cliente/pdf/'.$pedido->id); ?>" 
        	    	            													    	target="_blank"
        	    	            													    	class="btn bg-secondary btn-sm text-white">
        	    	            													        <i class="fa fa-print"></i>
        	    	            													    </a>
        	    	            													    
        	    	            													    <button data-href="<?php echo base_url('pedido/excluir/'.$pedido->id); ?>" 
        	    	            													    	class="btn bg-danger btn-sm text-white" data-toggle="modal" data-target="#modalRemover">
        	    	            													        <i class="fa fa-times"></i>
        	    	            			  									    	</button>
                                                                                        <br>
                                                                                        <small><?php echo swicthTimestamp($pedido->data) ?></small>
        	    	            			  									    	<br>
        	    	            			  									    	<span class="badge badge-<?php echo getSituationClass($pedido->situacao) ?>"><?php echo getSituationName($pedido->situacao); ?></span>
        	    	            			  									    	
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
                                                                                <br>
                                                                                <div class="row" style="font-weight: bold;">
                                                                                    <div class="col-1">Cod</div>
                                                                                    <div class="col-5">Produto</div>
                                                                                    <div class="col-2 text-right">Vl. Uni</div>
                                                                                    <div class="col-2 text-right">Qtd</div>
                                                                                    <div class="col-2 text-right">Total</div>
                                                                                </div>
                                                                                <?php foreach ($pedido->produtos as $produto): ?>
                                                                                    <div class="row">
                                                                                        <div class="col-1"><?php echo $produto->id_produto ?></div>
                                                                                        <div class="col-5"><?php echo $produto->nome ?></div>
                                                                                        <div class="col-2 text-right"><?php echo 'R$ '.number_format($produto->valor, 2, ',',''); ?></div>
                                                                                        <div class="col-2 text-right"><?php echo $produto->quantidade ?></div>
                                                                                        <div class="col-2 text-right"><?php echo 'R$ '.number_format(($produto->valor * $produto->quantidade), 2, ',',''); ?></div>
                                                                                    </div>
                                                                                <?php endforeach ?>
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
        	    	        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        	    	            



                                                    <!-- COMPRAS -->
                                                    <table class="datatable table">
                                                        <thead class="d-none">
                                                            <tr>
                                                                <th></th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php 
                                                                if(isset($compras)): 
                                                                    $pedidos = $compras;
                                                            ?>
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

                                                                                        <a href="<?php echo base_url('pedido/fornecedor/pdf/'.$pedido->id) ?>" 
                                                                                            target="_blank"
                                                                                            class="btn bg-secondary btn-sm text-white">
                                                                                            <i class="fa fa-print"></i>
                                                                                        </a>
                                                                                        
                                                                                        <button  data-href="pedido/excluir/<?php echo $pedido->id ?>" 
                                                                                            class="btn bg-danger btn-sm text-white" data-toggle="modal" data-target="#modalRemover">
                                                                                            <i class="fa fa-times"></i>
                                                                                        </button>
                                                                                        <br>
                                                                                        <small><?php echo swicthTimestamp($pedido->data) ?></small>
                                                                                        <br>
                                                                                        <span class="badge badge-<?php echo getSituationClass($pedido->situacao) ?>"><?php echo getSituationName($pedido->situacao); ?></span>
                                                                                        
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
                                                                                 <br>
                                                                                <div class="row" style="font-weight: bold;">
                                                                                    <div class="col-1">Cod</div>
                                                                                    <div class="col-5">Produto</div>
                                                                                    <div class="col-2 text-right">Qtd</div>
                                                                                </div>
                                                                                <?php foreach ($pedido->produtos as $produto): ?>
                                                                                    <div class="row">
                                                                                        <div class="col-1"><?php echo $produto->id_produto ?></div>
                                                                                        <div class="col-5"><?php echo $produto->nome ?></div>
                                                                                        <div class="col-2 text-right"><?php echo $produto->quantidade ?></div>
                                                                                    </div>
                                                                                <?php endforeach ?>
                                                                               
                                                                                
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </tbody>

                                                    </table>
                                                    
                                                    <!-- / COMPRAS -->










        	    	        </div>
        	    	    </div>

        	    	</div>







        	    	




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