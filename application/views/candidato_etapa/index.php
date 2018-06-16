<div class="row">
  <div class="col-lg-10">
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success mt-4">
        <?php echo $this->session->flashdata('success'); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
<div class="animated fadeIn">
	<div class="row">
		<div class="col-12">
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
					<strong class="card-title">Candidatar-se à Vaga</strong>
				</div>
				<div class="card-body">
					<table class="datatable table table-striped table-bordered">

						<thead>
							<tr>
								<th>Cargo</th>
								<th>Setor</th>
								<th>Quantidade</th>
								<th>Data de Oferta</th>
								<th>Candidatar</th>
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
												<!--
												<input type="checkbox" name="" value="">
											-->
												<a title="Candidatar à Vaga"> href="CandidatoEtapa/createCandidatoEtapa/<?php echo $vaga->id_vaga ?>"
										    	class="btn bg-primary text-white">
										        	<!--<i class="fa fa-pencil-square-o"></i>-->
														<p align="center"style="color:white;height:10px;width:80px">Candidatar</p>
										    </a>

												<a title="Excluir candidatura"> href="CandidatoEtapa/delete/<?php echo $vaga->id_vaga ?>"
													class="btn bg-danger text-white">
															<i class="fa fa-times"></i>
												</a>

										    <!--
												<button  data-href="canditato_etapa/excluir/ < ?php echo $vaga->id_vaga ?>"
										    	class="btn bg-danger text-white" data-toggle="modal" data-target="#modalRemover">
										        <i class="fa fa-times"></i>
  									    	</button>
												-->
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
        <h5 class="modal-title" id="exampleModalLabel">Excluir Candidatura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        Deseja Realmente Excluir Essa Candidatura?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <a href="#" class="btn btn-primary btn-remove-ok">Confirmar</a>
      </div>
    </div>
  </div>
</div>
