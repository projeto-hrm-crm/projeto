<div class="row justify-content-center align-items-center">
    <div class="col-lg-12">
        <?php if($this->session->flashdata('success')): ?>
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-2">
                    <?php echo $this->session->flashdata('success'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('danger')): ?>
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                    <?php echo $this->session->flashdata('danger'); ?>
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
								<th>Código</th>
								<th>Nome do processo</th>
                <th>Cargo</th>
                <th>Descrição</th>
								<th>Data de Início</th>
								<th>Data de Término</th>
                <th>Candidatar</th>
							</tr>
						</thead>

						<tbody>
							<?php if(isset($processo_seletivo)): ?>
								<?php foreach($processo_seletivo as $ps): ?>
									<tr>
										<td><?php echo $ps->codigo; ?></td>
										<td><?php echo $ps->nome; ?></td>
                    <td><?php echo $ps->nome_cargo; ?></td>
                    <td><?php echo $ps->descricao; ?></td>
                    <td><?php echo $ps->data_inicio; ?></td>
                    <td><?php echo $ps->data_fim; ?></td>
                    <td>
                          <?php 
                            $data['id_candidato']=$this->candidato_etapa->selectCandidatoByIdUsuario($this->session->userdata('user_login'))[0]->id_candidato;
                              $cadastrado=$this->candidato_etapa->find($data['id_candidato'],$this->candidato_etapa->getIdEtapaByProcessoID($ps->id_processo_seletivo)->id_etapa);
                            if($cadastrado!=null)
                            {
                                echo "<p>Concorrendo</p>";
                            }
                            else
                            {
                                echo "<a class='btn bg-primary text-white' href=".site_url('candidato_etapa/cadastrar/'.$ps->id_processo_seletivo).">
                                    <p align='center' style='color: white; height: 10px; width: 80px'> Candidatar </p>
                                  </a>";
                            }
                          ?>    
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
        Deseja realmente excluir essa candidatura?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <a href="#" class="btn btn-primary btn-remove-ok">Confirmar</a>
      </div>
    </div>
  </div>
</div>
