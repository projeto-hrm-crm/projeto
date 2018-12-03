<?php if ($this->session->flashdata('permissions_ok') != ""): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('permissions_ok');?></div>
<?php endif;?>
<div class="default-tab">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link  active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Gestão empresarial</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Gestão de recursos humanos</a>
        </div>
    </nav>
    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        	<!-- CRM -->
            <div class="col-md-4">
			    <div class="card">
			        <div class="card-body">
			            <div class="clearfix">
			                <i class="fa fa-users bg-flat-color-2 p-3 font-2xl mr-3 float-left text-light"></i>
			                <div class="h5 text-secondary mb-0 mt-1"><?php echo $admin['clientes']; ?></div>
			                <div class="text-muted text-uppercase font-weight-bold font-xs small">Clientes</div>
			            </div>
			            <div class="b-b-1 pt-3"></div>
			            <hr>
			            <div class="more-info pt-2 text-center" style="margin-bottom:10px;">
			                <a href="<?php echo base_url();?>cliente/cadastrar">
							<?php 
								$type = "button";
								$label = "Cadastrar";
								$classes = ['btn', 'btn-sm', 'bg-flat-color-1', 'text-light'];
								$attr = [
									'id' => 'id',
									'aria-hidden' => 'asdasdasd'
								];
								$this->Button->verify('Cliente', 'Cadastrar')->build($type, $label, $classes, $attr);
							?>
			                	
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

        <!-- HRM -->
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="col-md-4">
			    <div class="card">
			        <div class="card-body">
			            <div class="clearfix">
			                <i class="fa fa-address-card bg-flat-color-2 p-3 font-2xl mr-3 float-left text-light"></i>
			                <div class="h5 text-secondary mb-0 mt-1"><?php echo $admin['funcionarios'];?></div>
			                <div class="text-muted text-uppercase font-weight-bold font-xs small">Funcionários</div>
			            </div>
			            <div class="b-b-1 pt-3"></div>
			            <hr>
			            <div class="more-info pt-2 text-center" style="margin-bottom:10px;">
			                <a href="<?php echo base_url('funcionario/cadastrar') ?>" class="btn btn-sm bg-flat-color-1 text-light"> <i class="fa fa-plus"></i> Cadastrar</a>
			                <a href="<?php echo base_url('funcionario') ?>" class="btn btn-sm bg-flat-color-2 ml-3 text-light"><i class="fa fa-list"></i> Ver</a>
			            </div>
			        </div>
			    </div>
			</div>

			<div class="col-md-4">
			    <div class="card">
			        <div class="card-body">
			            <div class="clearfix">
			                <i class="fa fa-briefcase bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
			                <div class="h5 text-secondary mb-0 mt-1"><?php echo $admin['cargos'];?></div>
			                <div class="text-muted text-uppercase font-weight-bold font-xs small">Cargos</div>
			            </div>
			            <div class="b-b-1 pt-3"></div>
			            <hr>
			            <div class="more-info pt-2 text-center" style="margin-bottom:10px;">
			                <a href="<?php echo base_url('cargo/cadastrar') ?>" class="btn btn-sm bg-flat-color-5 text-light"> <i class="fa fa-plus"></i> Cadastrar</a>
			                <a href="<?php echo base_url('cargo') ?>" class="btn btn-sm bg-flat-color-2 ml-3 text-light"><i class="fa fa-list"></i> Ver</a>
			            </div>
			        </div>
			    </div>
			</div>

			<div class="col-md-4">
			    <div class="card">
			        <div class="card-body">
			            <div class="clearfix">
			                <i class="fa fa-newspaper-o bg-flat-color-4 p-3 font-2xl mr-3 float-left text-light"></i>
			                <div class="h5 text-secondary mb-0 mt-1"><?php echo $admin['vagas'];?></div>
			                <div class="text-muted text-uppercase font-weight-bold font-xs small">Vagas abertas</div>
			            </div>
			            <div class="b-b-1 pt-3"></div>
			            <hr>
			            <div class="more-info pt-2 text-center" style="margin-bottom:10px;">
			                <a href="<?php echo base_url('vaga/cadastrar') ?>" class="btn btn-sm bg-flat-color-4 text-light"> <i class="fa fa-plus"></i> Cadastrar</a>
			                <a href="<?php echo base_url('vaga') ?>" class="btn btn-sm bg-flat-color-2 ml-3 text-light"><i class="fa fa-list"></i> Ver</a>
			            </div>
			        </div>
			    </div>
			</div>

			<!-- <div class="card-block">
				<div class="col-lg-6">
				      <div class="card">
						  <div class="card-header">
						    Vagas
						  </div>
						  <div class="card-body card-block">
						    <div class="card-title">
							  	<span class="text-muted">Últimos 3 candidatos</span>
							  	<hr>
						  	</div>

						  	<?php for($i = 0; $i < 3; $i++): ?>
						  	<div class="stat-widget-four">
				                <div class="stat-icon dib">
				                    <i class="ti-user text-muted"></i>
				                </div>
				                <div class="stat-content">
				                    <div class="text-left dib">
				                        <div class="stat-heading">Nome do usuário</div>
				                        <div class="stat-text">Data: 22/03/2018</div>
				                    </div>
				                </div>
				            </div>
				            <hr>
				       		<?php endfor;?>
						  </div>
						  <div class="card-footer text-center">
						    <button type="submit" class="btn bg-flat-color-1 text-light btn-sm">
						      <i class="fa fa-eye"></i> Analisar candidatos
						    </button>
						  </div>
					</div>
				</div>
			</div> -->

			<div class="card-block">
				<div class="col-lg-6">
				      <div class="card">
						  <div class="card-header">
						    Processos seletivos
						  </div>
						  <div class="card-body card-block">
						    <div class="card-title">
							  	<span class="text-muted">Últimos processos seletivos</span>
							  	<hr>
						  	</div>

                <?php for($i = 0; $i < 3; $i++): ?>
                  <?php if (isset($admin['processos_seletivos'][$i])): ?>
                    <div class="stat-widget-four">
                      <div class="stat-icon dib">
                        <i class="ti-book text-muted"></i>
                      </div>
                      <div class="stat-content">
                        <div class="text-left dib">
                          <div class="stat-heading">Nome do processo <?php echo $admin['processos_seletivos'][$i]->nome ?></div>
                          <div class="stat-text">Vaga: <?php echo $admin['processos_seletivos'][$i]->nome_cargo ?></div>
                          <div class="stat-text">Data término: <?php echo $admin['processos_seletivos'][$i]->data_fim ?></div>

                        </div>
                      </div>
                    </div>
                    <hr>
                  <?php endif; ?>
                <?php endfor;?>
						  </div>
						  <div class="card-footer text-center">
						    <a href="<?php echo base_url('processo_seletivo'); ?>" class="btn bg-flat-color-2 text-light btn-sm">
						      <i class="fa fa-eye"></i> Analisar processos
						    </a>
						  </div>
					</div>
				</div>
			</div>
        </div>
        <!-- HRM -->
    </div>
</div>
