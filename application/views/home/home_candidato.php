<!-- tag de teste remover assim que criar pagina !-->
	<strong class="card-title">Meus Processos Seletivos</strong>

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
					<th>Visualizar</th>
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