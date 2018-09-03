<!-- tag de teste remover assim que criar pagina !-->
<h1>fornecedor</h1>

<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="clearfix">
                <i class="fa fa-product-hunt bg-flat-color-4 p-3 font-2xl mr-3 float-left text-light"></i>
                <div class="h5 text-secondary mb-0 mt-1"><?php echo $fornecedor['produtos']; ?></div>
                <div class="text-muted text-uppercase font-weight-bold font-xs small">Produtos</div>
            </div>
            <div class="b-b-1 pt-3"></div>
            <hr>
            <div class="more-info pt-2 text-center" style="margin-bottom:10px;">
            	<a href="<?php echo base_url();?>produto/cadastrar">
            		<button class="btn btn-sm bg-flat-color-4 text-light"> <i class="fa fa-plus"></i> Cadastrar</button>
            	</a>

                <a href="<?php echo base_url();?>produto">
                	<button class="btn btn-sm bg-flat-color-2 ml-3 text-light"><i class="fa fa-list"></i> Ver</button>
                </a>
            </div>
        </div>
    </div>
</div>

	<div class="col-lg-4">
	      <div class="card">
			  <div class="card-header">
			    SAC
			  </div>
			  <div class="card-body card-block">
			    <div class="card-title">
				  	<span class="text-center text-muted">Último contato registrado</span>
				  	<hr>
			  	</div>
                  <?php if ($fornecedor['last_sac']): ?>
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="ti-user text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><?php echo $fornecedor['last_sac']->nome;?></div>
                                <div class="stat-text">Data: <?php echo switchDate($fornecedor['last_sac']->data_criacao);?></div>
                            </div>
                        </div>
                    </div>
                  <?php else: ?>
                  <div class="text-center text-muted"> Nenhum contato registrado. </div>
                  <?php endif;?>
			  </div>
			  <div class="card-footer text-center">
			    <?php if ($fornecedor['last_sac']): ?>
                  <a href="<?php echo base_url('sac/iteracao/'.$fornecedor['last_sac']->id_sac); ?>" class="btn bg-flat-color-1 text-light btn-sm">
                      <i class="fa fa-dot-circle-o"></i> Responder
                  </a>
                <?php endif;?>
			  </div>
		</div>
	</div>
</div>
       