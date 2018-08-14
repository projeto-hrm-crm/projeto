
<div class="animated fadeIn">
	<div class="row justify-content-center align-items-center">
			<div class="col-lg-10">
	        <div class="card">
	            <div class="card-header">
	                <strong class="card-title">Cadastrar Vaga</strong>
	            </div>
	            <form id="form-vaga" action="<?php echo base_url('vaga/cadastrar'); ?>" method="post" novalidate="novalidate">
	                <div class="card-body">
	                    <div class="card-body">
							<?php if(sizeof($cargos) <= 0): ?>
								<div class="row justify-content-center align-items-center">
									<div class="col-12">
										<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
											Não existe nenhum cargo cadastrado no sistema, favor cadastre um cargo!
										</div>
										<a title="Novo cargo" href="<?= site_url('cargo/cadastrar')?>" class="btn btn-primary btn-sm float-right">
											<i class="fa fa-check"></i>
											Novo cargo
										</a>
									</div>
								</div>
							<?php else: ?>
	                        <div class="row">
	                            <div class="form-group col-lg-6 col-sm-12">
	                                <label for="id_cargo" class="control-label mb-1"><red>*</red>Cargo</label>
	                                <select name="id_cargo" id="id_cargo" class="form-control <?php echo isset($errors['id_cargo']) ? 'is-invalid' : '' ?>">
		                                <option value="">Selecione cargo</option>
		                                <?php foreach ($cargos as $cargo): ?>
		                                	<option value="<?php echo $cargo->id_cargo ?>" <?php echo isset($old_data['id_cargo']) && ($cargo->id_cargo == $old_data['id_cargo']) ? 'selected' : '' ?>>
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
	                                <input id="data_oferta" value="<?php echo isset($old_data['data_oferta']) ? $old_data['data_oferta'] : null;?>" placeholder="00/00/0000" name="data_oferta" type="text" class="data form-control <?php echo isset($errors['data_oferta']) ? 'is-invalid' : '' ?>" required>
	                                <span class="invalid-feedback">
	                                	<?php echo isset($errors['data_oferta']) ? $errors['data_oferta'] : '' ; ?>
	                                </span>
	                            </div>
	                        </div>

	                        <div class="row">
	                            <div class="form-group col-lg-6 col-sm-12">
	                                <label for="quantidade" class="control-label mb-1"><red>*</red>Quantidade</label>
	                                <input id="quantidade" value="<?php echo isset($old_data['quantidade']) ? $old_data['quantidade'] : null;?>" name="quantidade" placeholder="Quantidade de vagas disponíveis" type="text" class="form-control <?php echo isset($errors['quantidade']) ? 'is-invalid' : '' ?>" required>
	                                <span class="invalid-feedback">
	                                	<?php echo isset($errors['quantidade']) ? $errors['quantidade'] : '' ; ?>
	                                </span>
	                            </div>
	                        </div>

	                        <div class="row">
	                        	<div class="form-group col-12">
	                                <label for="data_oferta" class="control-label mb-1"><red>*</red>Requisitos</label>
	                                <textarea name="requisitos" id="requisitos" placeholder="Descrição de requisitos para vaga" rows="6" class="form-control <?php echo isset($errors['requisitos']) ? 'is-invalid' : '' ?>"><?php echo isset($old_data['requisitos']) ? $old_data['requisitos'] : null;?></textarea>
	                                <span class="invalid-feedback">
	                                	<?php echo isset($errors['requisitos']) ? $errors['requisitos'] : '' ; ?>
	                                </span>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <div class="card-footer text-right">
						<a title="Cancelar Cadastro" href="<?=site_url('vaga')?>" class="btn btn-danger btn-sm">
							<i class="fa fa-times"></i>
							Cancelar
						  </a>
	                    <button title="Cadastrar Vaga" type="submit" class="btn bg-primary text-white btn-sm" onclick="this.disabled=true;this.form.submit();">
	                        <i class="fa fa-plus" aria-hidden="true"></i>
	                        Cadastrar
	                    </button>
	                </div>
				<?php endif; ?>
	            </form>
	        </div>
	    </div>
	</div>
</div>
