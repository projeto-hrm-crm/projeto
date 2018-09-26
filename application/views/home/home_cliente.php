	<!-- CRM -->
<div class="row">
            <div class="col-md-4">
			    <div class="card">
			        <div class="card-body">
			            <div class="clearfix">
			            	<i class="fa fa-headphones bg-flat-color-2 p-3 font-2xl mr-3 float-left text-light"></i>
			                <div class="h5 text-secondary mb-0 mt-1"><?php echo $cliente['calls']; ?></div>
			                <div class="text-muted text-uppercase font-weight-bold font-xs small">Atendimentos</div>
			            </div>
			            <div class="b-b-1 pt-3"></div>
			            <hr>
			            <div class="more-info pt-2 text-center" style="margin-bottom:10px;">
			                <a href="<?php echo base_url();?>sac">
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
			                <i class="fa fa-truck bg-flat-color-4 p-3 font-2xl mr-3 float-left text-light"></i>
			                <div class="h5 text-secondary mb-0 mt-1"><?php echo $cliente['orders']; ?></div>
			                <div class="text-muted text-uppercase font-weight-bold font-xs small">Pedidos</div>
			            </div>
			            <div class="b-b-1 pt-3"></div>
			            <hr>
			            <div class="more-info pt-2 text-center" style="margin-bottom:10px;">
			                <a href="<?php echo base_url();?>fornecedor">
			                	<button class="btn btn-sm bg-flat-color-2 ml-3 text-light"><i class="fa fa-list"></i> Ver</button>
			                </a>
			            </div>
			        </div>
			    </div>
			</div>

			<div class="col-md-4">
		      <div class="card">
				  <div class="card-header">
				    <?php echo $cliente['last_sac']->titulo; ?>
				  </div>
				  <div class="card-body card-block">

                      <?php if ($cliente['last_sac']): ?>
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="ti-user text-muted"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><?php echo $cliente['last_sac']->nome;?></div>
                                    <div class="stat-text">Data: <?php echo switchDate($cliente['last_sac']->data_criacao);?></div>
                                </div>
                            </div>
                        </div>
                      <?php else: ?>
                      <div class="text-center text-muted"> Nenhum contato registrado. </div>
                      <?php endif;?>
				  </div>
				  <div class="card-footer text-center">
				    <?php if ($cliente['last_sac']): ?>
                      <a href="<?php echo base_url('sac/iteracao/'.$cliente['last_sac']->id_sac); ?>" class="btn bg-flat-color-1 text-light btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Responder
                      </a>
                    <?php endif;?>
				  </div>
			   </div>
			</div>

			<div class="col-md-8">
		      <div class="card">
			  <form method="post" id="cliente_sac_form">
				  <div class="card-header">
				    Novo SAC
				  </div>
				  <div class="card-body card-block">
				  	<div class="alert alert-success sac-ajax-success" style="display:none;">Sac cadastrado com sucesso!</div>
					  <div class="alert alert-danger sac-ajax-error" style="display:none;">Erro ao cadastrar SAC!</div>
				  		<div class="form-group">
							<label>Assunto</label>
							<input type="text" id="sac_subject" name="sac_subject" class="form-control" placeholder="Título da reclamação">
						</div>
						<div class="form-group">
                        <label class="form-control-label">Produto</label>
                        <select name="id_produto" id="sac_product_id" class="form-control" id="produto">
                           <option value="0" disabled selected>Selecione um produto</option>
                           <?php foreach ($cliente['produtos'] as $produto): ?>
                              <option value="<?php echo $produto->id_produto ?>"><?php echo $produto->nome; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
						<div class="form-group">
							<label>Descrição</label>
							<textarea class="form-control" id="sac_description" name="sac_description" placeholder="Relate aqui seu problema"></textarea>
						</div>

				  </div>
				  <div class="card-footer text-right">
				    <?php if ($cliente['last_sac']): ?>
                      <button type="submit" id="create_sac" class="btn bg-flat-color-1 text-light btn-sm">
					  <i class="fa fa-plus"></i> Enviar
					  </button>
                    <?php endif;?>
				  </div>
				  </form>
			   </div>
			</div>

</div>
