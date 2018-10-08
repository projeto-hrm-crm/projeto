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
				<?php if(isset($processo_seletivo['processo_seletivo'])): ?>
					<?php foreach($processo_seletivo): ?>
						<tr>
							<td><?php echo $processo_seletivo['processo_seletivo']->codigo; ?></td>
							<td><?php echo $processo_seletivo['processo_seletivo']->nome; ?></td>
                			<td><?php echo $processo_seletivo['processo_seletivo']->nome_cargo; ?></td>
                			<td><?php echo $processo_seletivo['processo_seletivo']->descricao; ?></td>
                			<td><?php echo $processo_seletivo['processo_seletivo']->data_inicio; ?></td>
                			<td><?php echo $processo_seletivo['processo_seletivo']->data_fim; ?></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>