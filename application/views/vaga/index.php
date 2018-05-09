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
					<strong class="card-title">Vagas</strong>
				</div>
				<div class="card-body">
					<table id="vagas" class="table table-striped table-bordered">
						
						<thead>
							<tr>
								<th>Cargo</th>
								<th>Setor</th>
								<th>Quantidade</th>
								<th>Data de Oferta</th>
								<th>Opções</th>
							</tr>
						</thead>

						<tbody>
							<?php if(isset($vagas)): ?>
								<?php foreach($vagas as $vaga): ?>
									<tr>
										<td><?php echo $vaga->cargo; ?></td>
										<td><?php echo $vaga->setor; ?></td>
										<td><?php echo $vaga->quantidade; ?></td>
										<td><?php echo switchDate($vaga->data_oferta); ?></td>
										<td >
										    
										    <a  href="remover/vaga/<?php echo $vaga->id_vaga ?>"   class="bg bg-danger text-white col-4 "  >
										        <span class="fa fa-times" </span>
										        	
  									    </a>
  									    
										   
										  
										    <a href="editar/vaga/<?php echo $vaga->id_vaga ?>" class="bg  bg-primary text-white col-2">
										        <span class="fa fa-pencil-square-o" ></span>
										    </a>
										    <!-- Modal editar -->

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Vaga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja editar essa Vaga?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Ok</button>
      </div>
    </div>
  </div>
</div>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</tbody>

					</table>
				</div>
			</div>
			
		</div>


	</div>
</div>