<div class="animated fadeIn">
	<div class="row">
		<div class="col-md-12">
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
										<td>
										    <a href="editar/vaga/<?php echo $vaga->id_vaga ?>" class="btn btn-primary">
										        <span class="fa fa-edit"></span>
										    </a>
										    <a href="remover/vaga/<?php echo $vaga->id_vaga ?>" class="btn btn-danger">
										        <span class="fa fa-close"></span>
										    </a>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</tbody>

					</table>
				</div>
			</div>
			<?php if(isset($success_message)): ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-2">
                        <?php echo $success_message; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
		</div>


	</div>
</div>