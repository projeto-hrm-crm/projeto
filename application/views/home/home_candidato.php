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
				</tr>
			</thead>

			<tbody>
				<?php if(isset($candidato['processo_seletivo'])): ?>
					<?php foreach($candidato['processo_seletivo'] as $ps): ?>
						<tr>
							<td><?php echo $ps->codigo; ?></td>
							<td><?php echo $ps->nome; ?></td>
	                    	<td><?php echo $ps->nome_cargo; ?></td>
	                    	<td><?php echo $ps->descricao; ?></td>
	                    	<td><?php echo $ps->data_inicio; ?></td>
	                    	<td><?php echo $ps->data_fim; ?></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
				
			</tbody>
		</table>
	</div>