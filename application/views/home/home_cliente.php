<!-- CRM -->
            <div class="col-md-4">
			    <div class="card">
			        <div class="card-body">
			            <div class="clearfix">
			                <i class="fa fa-users bg-flat-color-2 p-3 font-2xl mr-3 float-left text-light"></i>
			                <div class="h5 text-secondary mb-0 mt-1"><?php echo $admin['clientes']; ?></div>
			                <div class="text-muted text-uppercase font-weight-bold font-xs small">Atendimentos</div>
			            </div>
			            <div class="b-b-1 pt-3"></div>
			            <hr>
			            <div class="more-info pt-2 text-center" style="margin-bottom:10px;">
			                <a href="<?php echo base_url();?>cliente/cadastrar">
			                	<button class="btn btn-sm bg-flat-color-1 text-light"> <i class="fa fa-plus"></i> Cadastrar</button>
			                </a>
			                <a href="<?php echo base_url();?>cliente">
			                	<button class="btn btn-sm bg-flat-color-2 ml-3 text-light"><i class="fa fa-list"></i> Ver</button>
			                </a>
			            </div>
			        </div>
			    </div>
			</div>

			<div class="col-md-4">
			    <div class="card">
			        <div class="card-body">
			            <div class="clearfix">
			                <i class="fa fa-truck bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
			                <div class="h5 text-secondary mb-0 mt-1"><?php echo $admin['fornecedores']; ?></div>
			                <div class="text-muted text-uppercase font-weight-bold font-xs small">Fornecedores</div>
			            </div>
			            <div class="b-b-1 pt-3"></div>
			            <hr>
			            <div class="more-info pt-2 text-center" style="margin-bottom:10px;">
			            	<a href="<?php echo base_url();?>fornecedor/cadastrar">
			            		<button class="btn btn-sm bg-flat-color-5 text-light"> <i class="fa fa-plus"></i> Cadastrar</button>
			            	</a>

			                <a href="<?php echo base_url();?>fornecedor">
			                	<button class="btn btn-sm bg-flat-color-2 ml-3 text-light"><i class="fa fa-list"></i> Ver</button>
			                </a>
			            </div>
			        </div>
			    </div>
			</div>

			<div class="col-md-4">
			    <div class="card">
			        <div class="card-body">
			            <div class="clearfix">
			                <i class="fa fa-product-hunt bg-flat-color-4 p-3 font-2xl mr-3 float-left text-light"></i>
			                <div class="h5 text-secondary mb-0 mt-1"><?php echo $admin['produtos']; ?></div>
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

			<div class="card-block">
				<div class="col-lg-8">
				      <div class="card">
				          <div class="card-body"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
				              <h4 class="mb-3">Clientes Cadastrados</h4>
				              <h1 class="no-data"></h1>
				              <canvas id="client-chart" height="266" width="532" style="display: block; width: 532px; height: 266px;"></canvas>
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
                              <?php if ($admin['last_sac']): ?>
                                <div class="stat-widget-four">
                                    <div class="stat-icon dib">
                                        <i class="ti-user text-muted"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><?php echo $admin['last_sac']->nome;?></div>
                                            <div class="stat-text">Data: <?php echo switchDate($admin['last_sac']->data_criacao);?></div>
                                        </div>
                                    </div>
                                </div>
                              <?php else: ?>
                              <div class="text-center text-muted"> Nenhum contato registrado. </div>
                              <?php endif;?>
						  </div>
						  <div class="card-footer text-center">
						    <?php if ($admin['last_sac']): ?>
                              <a href="<?php echo base_url('sac/iteracao/'.$admin['last_sac']->id_sac); ?>" class="btn bg-flat-color-1 text-light btn-sm">
                                  <i class="fa fa-dot-circle-o"></i> Responder
                              </a>
                            <?php endif;?>
						  </div>
					</div>
				</div>
			</div>
        </div>
        <!-- CRM -->