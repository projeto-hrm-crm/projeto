<div class="animated fadeIn">
	<div class="row">
		<div class="col-lg-12">
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
					<a title="Cadastrar vaga" href="<?= site_url('vaga/cadastrar')?>" class="btn btn-primary btn-sm">
					  	<i class="fa fa-check"></i> Novo Cadastro
				  	</a><br><br>
					<table class="datatable table table-striped table-bordered">
						<thead>
							<tr>
								<th>Cargo</th>
								<th>Quantidade</th>
								<th>Data de Oferta</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($vagas)): ?>
								<?php foreach($vagas as $vaga): ?>
									<tr>
										<td><?php echo $vaga->cargo; ?></td>
										<td><?php echo $vaga->quantidade; ?></td>
										<td><?php echo switchDate($vaga->data_oferta); ?></td>
										<td >
										    <a href="vaga/editar/<?php echo $vaga->id_vaga; ?>"
										    	class="btn bg-primary text-white" title="Atualizar Vaga">
										        <i class="fa fa-pencil-square-o"></i>
										    </a>
										    <button title="Excluir Vaga"  data-href="vaga/excluir/<?php echo $vaga->id_vaga; ?>"
										    	class="btn bg-danger text-white" data-toggle="modal" data-target="#modalRemover">
										        <i class="fa fa-times"></i>
  									    	</button>
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

 <!-- Modal remover -->

<div class="modal fade" id="modalRemover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Excluir Vaga</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body ">
				Deseja realmente excluir essa vaga?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					Cancelar
				</button>
				<a href="#" class="btn btn-primary btn-remove-ok">
					Confirmar
				</a>
			</div>
		</div>
	</div>
</div>
