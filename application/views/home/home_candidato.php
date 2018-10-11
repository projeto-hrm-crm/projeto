<!-- tag de teste remover assim que criar pagina !-->
	<strong class="card-title">Meus Processos Seletivos</strong>

	<div class="card-body">
		<table class="datatable table table-striped table-bordered">

			<thead>
				<tr>
					<th class="text-center">Código</th>
					<th class="text-center">Nome do processo</th>
					<th class="text-center">Cargo</th>
					<th class="text-center">Descrição</th>
					<th class="text-center">Data de Início</th>
					<th class="text-center">Data de Término</th>
					<th class="text-center">Ações</th>
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
	                    	<td class="text-center">
	                    		<a title="Informação" class="btn btn-warning" data-toggle="modal" data-target="#modalinfo">
                                	<span class="fa fa-clipboard"></span>
                                </a>
	                    	</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
				
			</tbody>
		</table>
	</div>


	<div class="modal fade" id="modalinfo" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informações do Processo Seletivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="datatable table table-striped table-bordered">

			<thead>
				<tr>
					<th class="text-center">Descrição da etapa</th>
					
				</tr>
			</thead>

			<tbody>
				<!-- mudar esse get para ser o get referente ao processo selecionado -->
				<?php if(isset($candidato['processo_seletivo'])): ?>
					<?php foreach($candidato['processo_seletivo'] as $ps): ?>
						<tr>
	                    	<td><?php echo $ps->data_inicio; ?></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
				
			</tbody>
		</table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Sair
                </button>
            </div>
        </div>
    </div>
  </div>