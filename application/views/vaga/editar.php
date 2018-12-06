<!-- <div class="animated fadeIn"> -->
<div class="row justify-content-center align-items-center">
	<div class="col-lg-10">
		<div class="card">
			<div class="card-header">
				<strong class="card-title">Atualizar Vaga</strong>
			</div>
			<form id="form-vaga" action="<?php echo base_url('vaga/editar/'.$vaga->id_vaga); ?>" method="POST" novalidate="novalidate">
				<div class="card-body">
					<div class="card-body">
						<div class="row">
							<div class="form-group col-lg-6 col-sm-12">
								<label for="id_cargo" class="control-label mb-1"><red>*</red>Cargo</label>
								<select name="id_cargo" id="id_cargo" class="form-control <?php echo isset($errors['id_cargo']) ? 'is-invalid' : '' ?>">
									<option value="">Selecione</option>
									<?php foreach ($cargos as $cargo): ?>
										<option value="<?php echo $cargo->id_cargo ?>"
											<?php
											echo (isset($old_data['id_cargo']) &&
											($cargo->id_cargo == $old_data['id_cargo'])) ||
											!isset($errors['id_cargo']) &&
											($vaga->id_cargo == $cargo->id_cargo) ?
											'selected' : ''
											?>
											>
											<?php echo $cargo->nome ?>
										</option>
									<?php endforeach; ?>
								</select>
								<span class="invalid-feedback">
									<?php echo isset($errors['id_cargo']) ? $errors['id_cargo'] : '' ; ?>
								</span>
							</div>
							<div class="form-group col-lg-6 col-sm-12">
								<label for="data_oferta" class="control-label mb-1"><red>*</red>Data da Oferta</label>
								<input id="data_oferta" value="<?php echo isset($old_data['data_oferta']) ? $old_data['data_oferta'] : $vaga->data_oferta;?>" name="data_oferta" type="text" class="data form-control <?php echo isset($errors['data_oferta']) ? 'is-invalid' : '' ?>" required>
								<span class="invalid-feedback">
									<?php echo isset($errors['data_oferta']) ? $errors['data_oferta'] : '' ; ?>
								</span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-6 col-sm-12">
								<label for="quantidade" class="control-label mb-1"><red>*</red>Quantidade</label>
								<input id="quantidade" value="<?php echo isset($old_data['quantidade']) ? $old_data['quantidade'] : $vaga->quantidade;?>" name="quantidade" type="text" class="form-control <?php echo isset($errors['quantidade']) ? 'is-invalid' : '' ?>" required>
								<span class="invalid-feedback">
									<?php echo isset($errors['quantidade']) ? $errors['quantidade'] : '' ; ?>
								</span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12">
								<label for="data_oferta" class="control-label mb-1"><red>*</red>Requisitos</label>
								<textarea name="requisitos" id="requisitos" rows="6" class="form-control <?php echo isset($errors['requisitos']) ? 'is-invalid' : '' ?>"><?php echo isset($old_data['requisitos']) ? $old_data['requisitos'] : $vaga->requisitos;?></textarea>
								<span class="invalid-feedback">
									<?php echo isset($errors['requisitos']) ? $errors['requisitos'] : '' ; ?>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer text-right">
					<a href="<?=site_url('vaga')?>" title="Cancelar Edição" class="btn btn-danger btn-sm">
						<i class="fa fa-times"></i>
						Cancelar
					</a>

					<?php
					$type           = "button";
					$label          = "<span class='fa fa-check'></span> Atualizar Vaga";
					$classes        = ['btn', 'bg-primary', 'text-white','btn-sm'];
					$attr           = [
						'type'        => 'submit',
						'title'       => 'Atualizar Vaga'
					];
					if (!is_null($edit_button))
					$edit_button->build($type, $label, $classes, $attr);
					?>
				</div>

				<!-- Modal atualizar -->

				<div class="modal fade" id="modalAtualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Atualizar Vaga</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body ">
								Deseja realmente atualizar essa vaga?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">
									Cancelar
								</button>
								<button type="button" class="btn btn-primary btn-edit">
									Confirmar
								</button>
							</div>
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
</div>
<!-- Modal atualizar -->

<div class="modal fade" id="modalAtualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Vaga</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				Deseja realmente editar essa vaga?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					Cancelar
				</button>
				<button type="button" class="btn btn-primary btn-edit" data-dismiss="modal">
					Confirmar
				</button>
			</div>
		</div>
	</div>
</div>
